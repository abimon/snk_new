@extends("layouts.dashboard",['title'=>'Orders'])
@section('dashboard')
<div class="container mt-3" style="min-height:80vh;">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between">
                <h4>Orders</h4>
            </div>
            <div class="table-responsive">
                <table class="table text-start" style="color:black;">
                    <thead>
                        <tr style="color:black;">
                            <th>#</th>
                            <th>Order No.</th>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Customer</th>
                            <th>Payment</th>
                            <th>Delivery</th>
                            <th colspan="3" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $key => $order)
                        <tr class="">
                            <td>{{ $key+1 }}</td>
                            <td>{{ $order->receipt_no }}-{{ $order->id }}</td>
                            <td>{{ $order->type=='juice'?($order->juice->flavour->name).' juice':$order->product->name }}</td>
                            <td>{{ $order->quantity }} {{ $order->type=='juice'?'x '.($order->juice->size).'ml':$order->product->units }}</td>
                            <td>
                                {{ $order->user->name }}
                                <div class="small">{{ $order->user->phone }}</div>
                            </td>
                            <td>
                                @if($order->user_id==auth()->user()->id)
                                <a href="/pay?redirect_url={{ $order->pesapal->redirect_url }}">
                                    <button class="btn btn-primary text-white">Pay</button>
                                </a>
                                @else
                                <input type="checkbox" {{ $order->isPaid?'checked':''}} readonly>
                                @endif
                            </td>
                            <td>
                                <input type="checkbox" {{ $order->isDelivered?'checked':''}} readonly>
                            </td>
                            <td>
                                <!-- dropdown -->
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdown{{$order->id}}" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdown{{$order->id}}">
                                        <li>
                                            <form action="{{ route('orders.update', $order->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="isPaid" value="{{$order->isPaid?'0':'1'}}">
                                                <button type="submit" class="dropdown-item">{{ $order->isPaid?'Mark Unpaid':'Mark Paid' }}</button>
                                            </form>
                                        </li>
                                        <li>
                                            <form action="{{ route('orders.update', $order->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="isDelivered" value="{{$order->isDelivered?'0':'1'}}">
                                                <button type="submit" class="dropdown-item">{{ $order->isDelivered?'Mark Undelivered':'Mark Delivered' }}</button>
                                            </form>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('orders.show', $order->id) }}">View Details</a></li>
                                        <li>
                                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this order?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger">Delete Order</button>
                                            </form>
                                        </li>

                                    </ul>
                                </div>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection