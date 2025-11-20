<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Pesapal;
use App\Models\POrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class POrderController extends Controller
{
    public function generate_token()
    {
        $data = json_encode([
            'consumer_key' => env('PESAPAL_CONSUMER_KEY'),
            'consumer_secret' => env('PESAPAL_CONSUMER_SECRET')
        ]);
        $url = 'https://pay.pesapal.com/v3/api/Auth/RequestToken';
        $response = Http::withBody($data, 'application/json')->withHeaders(['Content-Type : application/json'])->post($url);
        $access_token = json_decode($response);
        return $access_token->token;
    }
    public function generate_ipn()
    {
        $data = json_encode([
            'ipn_notification_type' => 'POST',
            'url' => 'https://snkwellnesscenter.com/payment'
        ]);
        $url = 'https://pay.pesapal.com/v3/api/URLSetup/RegisterIPN';
        $response = Http::withToken($this->generate_token())->withBody($data, 'application/json')->withHeaders(['Content-Type : application/json'])->post($url);
        return json_decode($response)->ipn_id;
    }
    public function pay($amount, $reference, $id)
    {
        $user = User::findOrFail($id);
        $client = Pesapal::where('TransactionId', $reference)->first();
        if (!$client) {
            $tid = strtoupper(uniqid());
            $data = json_encode([
                "id" => $reference,
                "currency" => "KES",
                "amount" => $amount,
                "description" => "Payment description goes here",
                "callback_url" => "https://snkwellnesscenter.com/v1/payment/update/" . $tid,
                "redirect_mode" => "",
                "notification_id" => $this->generate_ipn(),
                "branch" => "Main Store",
                "billing_address" => [
                    "email_address" => $user->email,
                    "phone_number" => $user->phone,
                    "country_code" => "KE",
                    "first_name" => explode(' ', $user->name)[0] ?? '',
                    "last_name" => explode(' ', $user->name)[1] ?? '',
                ]
            ]);
            $res = Http::withToken($this->generate_token())->withBody($data, 'application/json')->withHeaders(['Content-Type : application/json'])->post('https://pay.pesapal.com/v3/api/Transactions/SubmitOrderRequest');
            $response = json_decode($res);
            $order_tracking_id = $response->order_tracking_id;
            $merchant_reference = $response->merchant_reference;
            $redirect_url = $response->redirect_url;
            Pesapal::create([
                'user_id' => $id,
                'TransactionId' => $reference,
                'amount' => $amount,
                'merchant_reference' => $merchant_reference,
                'tracking_id' => $order_tracking_id,
                'redirect_url' => $redirect_url,
            ]);
            return view('dashboard.pay', compact('redirect_url'));
        } else {
            $redirect_url = $client->redirect_url;
            return redirect()->route('orders.index')->with('info', 'You have a pending payment. Please complete it.');
        }
    }
    public function payupdate()
    {
        $pay = Pesapal::where([["tracking_id", request('OrderTrackingId')], ['merchant_reference', request('OrderMerchantReference')]])->first();

        $url = 'https://pay.pesapal.com/v3/api/Transactions/GetTransactionStatus?orderTrackingId=' . $pay->tracking_id;
        $res = Http::withToken($this->generate_token())->withHeaders(['Content-Type : application/json'])->get($url);
        $response = json_decode($res);
        if ($response->status == '200') {
            $pay->payment_account = $response->payment_account;
            $pay->amount = $response->amount;
            $pay->payment_method = $response->payment_method;
            $pay->confirmation_code = $response->confirmation_code;
            $pay->payment_status_description = $response->payment_status_description;
            $pay->update();
            return redirect('/dashboard')->with('success', 'Payment made successfully.');
        }
        return $response;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (Auth::user()->isAdmin) {
            $orders = POrder::all();
        } else {
            $orders = POrder::where('user_id', Auth::id())->get();
        }
        return view('dashboard.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('checkout');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        // dd(request()->all());
        try {
            $cart = Cart::where('user_id', Auth::user()->id)->get();
            $receipt = strtoupper((uniqid()));
            foreach ($cart as $item) {
                POrder::create([
                    'user_id' => Auth::user()->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'receipt_no' => $receipt,
                    'type' => $item->type,
                ]);
                Cart::destroy($item->id);
            }
            Order::create([
                'receipt_no' => $receipt,
                'address' => request('address'),
                'phone' => request('phone'),
                'name' => request('fname'),
                'note' => request('note'),
                'email' => request('email'),
                'payment_mode' => request('payment_mode')
            ]);
            if(request('payment_mode') == 'online'){
                $total = 0;
                foreach (POrder::where('receipt_no', $receipt)->get() as $order) {
                    if($order->type=='juice'){
                        $total += $order->quantity * $order->juice->price;
                    }else{
                        $total += $order->product->price * $order->quantity;
                    }
                }
                return $this->pay($total+250, $receipt, Auth::user()->id);
            }
            else{
                return redirect()->route('orders.index',)->with('success', 'Order placed successfully!');
            }
        } catch (\Throwable $th) {
            return redirect()->route('orders.index')->with('error', 'An error occurred while placing the order! Error: ' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($receipt)
    {
        $orders = POrder::where('receipt_no', $receipt)->get();
        return view('dashboard.orders.index', compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(POrder $pOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        $order = POrder::find($id);
        if (request("isDelivered") != '') {
            $order->isDelivered = request("isDelivered");
        }
        if (request("delivery_date") != '') {
            $order->delivery_date = request("delivery_date");
        }
        if (request("isPaid") != '') {
            $order->isPaid = request("isPaid");
        }
        $order->update();
        return redirect()->route('orders.index')->with('success', 'Order status updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        POrder::destroy($id);
        return redirect()->route('orders.index')->with('error', 'Order deleted successfully!');
    }
}
