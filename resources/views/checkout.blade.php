@extends('layouts.app',['title'=>'Checkout'])
@section('content')
<!-- Checkout Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">

        <form action="{{route('orders.store')}}" method="post">
            @csrf
            <div class="row g-5">
                <div class="col-md-12 col-lg-6 col-xl-7">
                    <h1 class="mb-4">Billing details</h1>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-item">
                                <label class="form-label my-3">Full Name<sup>*</sup></label>
                                <input type="text" name="fname" class="form-control" value="{{Auth()->user()->name}}" required>
                            </div>
                        </div>
                        <div class="col-md-6 form-item">
                            <label class="form-label my-3">Address <sup>*</sup></label>
                            <input type="text" name="address" class="form-control" placeholder="Town & Pickup Point" value="{{Auth()->user()->address}}" required>
                        </div>
                        <div class="col-md-6 form-item">
                            <label class="form-label my-3">Mobile Number<sup>*</sup></label>
                            <input type="tel" name="phone" class="form-control" value="{{Auth()->user()->phone}}" required>
                        </div>
                        <div class="col-md-6 form-item">
                            <label class="form-label my-3">Email Address<sup>*</sup></label>
                            <input type="email" name="email" class="form-control" value="{{Auth()->user()->email}}" required>
                        </div>
                        <div class="col-md--6 form-check my-3">
                            <input type="checkbox" class="form-check-input" id="Account-1" name="saveAddress" value="1">
                            <label class="form-check-label" for="Account-1">Save Address?</label>
                        </div>
                        <hr>
                        <div class="col-md-12form-item">
                            <textarea class="form-control" name="note" spellcheck="false" cols="5" rows="11" placeholder="Order Notes (Optional)"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-5">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Products</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (App\Models\Cart::where('user_id',Auth()->user()->id)->get() as $item)
                                <tr>
                                    <th scope="row">
                                        <img src="/{{$item->type=='juice'?'storage/'.$item->juice->image_path:$item->product->cover}}" class="img-fluid me-5 rounded" style="width: 80px; height: 80px;" alt="">
                                    </th>
                                    <td class="py-5">{{$item->type=='juice'?$item->juice->flavour->name:$item->product->name}}</td>
                                    <td class="py-5">{{$item->type=='juice'?$item->juice->price:$item->product->price}}</td>
                                    <td class="py-5">{{$item->quantity.' X '.($item->type=='juice'?($item->juice->size).'ml':$item->product->units)}}</td>
                                    <td class="py-5">{{($item->quantity)*($item->type=='juice'?$item->juice->price:$item->product->price)}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <p class="text-start text-dark">Please use your Order ID(<b></b>) as the payment reference. Your order will not be shipped until the payment has been cleared in our account.</p>
                    <div class="">
                        <input type="radio" name="payment_mode" value='cash'> Cash
                    </div>
                    <div class="">
                        <input type="radio" name="payment_mode" value='online'> Online(MPESA, Card, Paypal, etc)
                    </div>
                    @if (App\Models\Cart::where('user_id',Auth()->user()->id)->count()>0)

                    <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                        <button type="submit" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Place Order</button>
                    </div>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Checkout Page End -->
@endsection