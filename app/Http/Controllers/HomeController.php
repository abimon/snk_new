<?php

namespace App\Http\Controllers;

use App\Models\Juice;
use App\Models\JuiceFlavour;
use App\Models\Message;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $products = Product::paginate(25);
        return view('welcome', compact('products'));
    }
    public function shop(){
        $flavours = JuiceFlavour::orderBy('name', 'asc')->get();
        $juices = Juice::whereIn('flavour_id', $flavours->where('status', true)->pluck('id')->toArray())->with('flavour')->orderBy('created_at', 'desc')->get();
        $products = Product::paginate(25);
        return view('shop',compact('products','juices'));
    }

    public function contact(){
        return view('contact');
    }
    public function about(){
        return view('about');
    }
    public function product($id){
        $product = Product::findorFail($id);
        return view('product', compact('product'));
    }
    public function message(){
        Message::create([
            "name"=>request('name'),
            "message"=>request('message'),
            "email"=>request('email'),
            "phone_number"=>request('phone_number'),
            "status"=>"pending"
        ]);
        return back()->with('success', 'Message sent successfully');
    }
    public function mealplan(){
        return view('mealplan');
    }
    public function mealplan_request(){
        return view('dashboard.mealplans.request-form');
    }
    public function juices(){
        $flavours = JuiceFlavour::orderBy('name', 'asc')->get();
        $juices = Juice::whereIn('flavour_id', $flavours->where('status', true)->pluck('id')->toArray())->with('flavour')->orderBy('created_at', 'desc')->get();
        return view('healthy-juices', compact('juices', 'flavours'));
    }
}
