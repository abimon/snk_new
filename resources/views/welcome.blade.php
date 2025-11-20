@extends('layouts.app',['title'=>'Home'])
@section('content')
<div class="container-fluid">

    <!-- Hero Start -->
    <div class="container-fluid hero-header">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-md-7">
                    <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active rounded">
                                <img src="/storage/front/img/hero-img-1.png" class="img-fluid w-100 h-100 bg-secondary rounded" alt="First slide">
                            </div>
                            <div class="carousel-item rounded">
                                <img src="/storage/front/img/hero-img-2.jpg" class="img-fluid w-100 h-100 rounded" alt="Second slide">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-md-5">
                    <h1>Discover</h1>
                    <h3>Your Path to Holistic Health at SNK Wellness Center!</h3>
                    Welcome to SNK Wellness Center, where your journey to optimal health begins! Our comprehensive services are designed to help you identify, manage, and overcome health challenges naturally. Join us and experience the difference
                </div>

            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!-- Featurs Section Start -->
    <div class="container-fluid featurs py-5">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="featurs-item text-start rounded bg-light p-4">
                    <div class="row">
                        <div class="col-6">
                            <div class="featurs-icon btn-square rounded-circle bg-primary mb-5 mx-auto">
                                <i class="fas fa-utensils fa-3x text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="featurs-content text-start">
                                <h5>Wellness Workshops & Cooking Classes</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="featurs-item text-start rounded bg-light p-4">
                    <div class="row">
                        <div class="col-6">
                            <div class="featurs-icon btn-square rounded-circle bg-primary mb-5 mx-auto">
                                <i class="fas fa-clipboard-list fa-3x text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="featurs-content text-start">
                                <h5>Tailored Mealplans & Healthy Juices</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="featurs-item text-start rounded bg-light p-4">
                    <div class="row">
                        <div class="col-6">
                            <div class="featurs-icon btn-square rounded-circle bg-primary mb-5 mx-auto">
                                <i class="fas fa-heartbeat fa-3x text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="featurs-content text-start">
                                <h5>Expert-Led Exercise Programs & Personalized Health Assessments</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Featurs Section End -->

    <!-- Fruits Shop Start--
    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <div class="tab-class text-center">
                <div class="d-flex justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h1 class="display-3 mb-4">Our Organic Products</h1>
                        <ul class="nav nav-pills d-inline-flex text-center mb-5">
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-1">
                                    <span class="text-dark" style="width: 130px;">All Products</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex py-2 m-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-2">
                                    <span class="text-dark" style="width: 130px;">Vegetables</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-3">
                                    <span class="text-dark" style="width: 130px;">Fruits</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-4">
                                    <span class="text-dark" style="width: 130px;">Cereals</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    @foreach ($products as $product)
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item border border-secondary border-top-0 rounded-bottom">
                                            <div class="fruite-img">
                                                <img src="/{{$product->cover}}" class="img-fluid w-100 rounded-top" alt="" style="height:40vh; object-fit:cover;">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div>
                                            <div class="p-2">
                                                <h4 class="text-center">{{$product->name}}</h4>
                                                <p class="text-dark fw-bold text-center mb-2">Ksh. {{$product->price}} / {{$product->units}}</p>
                                                <div class="d-flex justify-content-between">
                                                    <a href="/product/{{$product->id}}" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-eye text-primary"></i> View</a>
                                                    <form action="{{route('carts.store',['product_id'=>$product->id])}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="quantity" value="1">
                                                        <button type="submit" class="btn border border-secondary rounded-pill px-3 text-primary">
                                                            <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="col-12">
                                    {{$products->links('custom')}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab-2" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="/storage/front/img/fruite-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>Grapes</h4>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">Ksh. 120.00 / Kg</p>
                                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="/storage/front/img/fruite-item-2.jpg" class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>Raspberries</h4>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">Ksh. 120.00 / Kg</p>
                                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab-3" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="/storage/front/img/fruite-item-1.jpg" class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>Oranges</h4>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">Ksh. 120.00 / Kg</p>
                                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="/storage/front/img/fruite-item-6.jpg" class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>Apple</h4>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">Ksh. 120.00 / Kg</p>
                                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab-4" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="/storage/front/img/fruite-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>Grapes</h4>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">Ksh. 120.00 / Kg</p>
                                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="/storage/front/img/fruite-item-4.jpg" class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <h4>Apricots</h4>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">Ksh. 120.00 / Kg</p>
                                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    -- Fruits Shop End-->

    <!-- Featurs Start -->
    <div class="container-fluid service py-5">
        <div class="container py-5">
            <div class="d-flex justify-content-center">
                <div class="col-md-8 text-center">
                    <h1 class="display-3">Why Us?</h1>
                    <p class="mt-2 mb-2">
                        At SNK Wellness Center, we believe in a holistic approach to health. We strive to empower our clients with the knowledge and tools they need to lead healthier, more fulfilling lives.
                    </p>
                </div>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-md-4 p-3">
                    <div class="card shadow p-4 h-100">
                        <h5 class='text-center'>Qualified Professionals</h5>
                        <p>Our team of experts includes nutritionists, fitness trainers, and health coaches dedicated to your well-being.</p>
                    </div>
                </div>
                <div class="col-md-4 p-3">
                    <div class="card shadow p-4 h-100">
                        <h5 class="text-center">Comprehensive Care</h5>
                        <p>From health assessments to personalized nutrition and fitness plans, we cover all aspects of wellness.</p>
                    </div>
                </div>
                <div class="col-md-4 p-3">
                    <div class="card shadow p-4 h-100">
                        <h5 class="text-center">Supportive Community</h5>
                        <p>Join a community of like-minded individuals committed to a healthier lifestyle.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Featurs End -->
</div>
@endsection