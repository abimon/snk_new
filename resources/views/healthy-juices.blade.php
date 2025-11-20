@extends('layouts.service',['title'=>'Healthy Juices','page_title'=>'Healthy Juices','page'=>'Healthy Juices'])
@section('service')
<div class="containe-fluid">
    <div class="row g-4 justify-content-center mt-2 p-2">
        @foreach ($juices as $item)
        <div class="col-md-6 col-lg-6 col-xl-4">
            <div class="rounded position-relative fruite-item border border-secondary border-top-0 rounded-bottom">
                <div class="fruite-img">
                    <img src="/storage/{{$item->image_path}}" class="img-fluid w-100 rounded-top" alt="" style="height:40vh;object-fit:cover;">
                </div>
                <div class="p-2">
                    <h4 class="text-center">{{$item->flavour->name}} {{ $item->size }}ml</h4>
                    <p class="text-dark fw-bold text-center mb-2">Ksh. {{$item->price}}</p>
                </div>
                <div class="text-center mb-3">
                    <form action="{{route('carts.store',['product_id'=>$item->id,'quantity'=>1,'type'=>'juice'])}}" method="post">
                        @csrf
                        <button type="submit" class="btn border border-secondary rounded-pill px-3 text-primary">
                            <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="">
        <p>Refresh and revitalize with our selection of Healthy Juices at SNK Wellness Center. Whether you’re looking to detoxify, boost your immune system, manage chronic disease, or simply enjoy a delicious and nutritious drink, our healthy juices provide a convenient way to support your wellness journey.</p>
        <p>We offer a juice for every chronic condition, including diabetes, hypertension, and arthritis, specifically formulated to support your unique health needs.</p>
        <p>Try our variety of flavors and discover the benefits of natural, wholesome beverages.</p>
    </div>
</div>
@endsection