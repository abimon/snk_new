@extends('layouts.app',['title'=>'Meal Plans'])

@section('content')
<div class="container-fluid">
    <!-- Hero Start -->
    <!-- style="background-image:url('/storage/front/img/hero-img-1.png');opacity:.4 ;" -->
    <div class="container-fluid hero-header" style="background-position:top;">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-md-8">
                    <h1 class="display-5">{{ $page_title }}</h1>
                    <div class="breadcrumbs">
                        <span><a href="/">Home</a></span> <span><i class="fa fa-chevron-right"></i></span> <span>{{ $page }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 d-none d-md-block p-3">
                <div class=" p-2">
                    <div class="alert mb-2  {{ request()->path()=='meal-plans'?'alert-primary ':'alert-light' }}">
                        <a href="/meal-plans" class='d-flex justify-content-between'>Meal Plans
                            <span><i class="fa fa-chevron-right"></i></span>
                        </a>
                    </div>
                    <div class="alert mb-2  {{ request()->path()=='wellness-workshop'?'alert-primary ':'alert-light ' }}">
                        <a href="/wellness-workshop" class='d-flex justify-content-between'>Wellness Workshop
                            <span><i class="fa fa-chevron-right"></i></span>
                        </a>
                    </div>
                    <div class="alert mb-2  {{ request()->path()=='health-talks'?'alert-primary ':'alert-light ' }}">
                        <a href="/health-talks" class='d-flex justify-content-between'>Health Talks
                            <span><i class="fa fa-chevron-right"></i></span>
                        </a>
                    </div>
                    <div class="alert mb-2  {{ request()->path()=='cooking-class'?'alert-primary ':'alert-light ' }}">
                        <a href="/cooking-class" class='d-flex justify-content-between'>Cooking Classes
                            <span><i class="fa fa-chevron-right"></i></span>
                        </a>
                    </div>
                    <div class="alert mb-2  {{ request()->path()=='healthy-juices'?'alert-primary ':'alert-light ' }}">
                        <a href="/healthy-juices" class='d-flex justify-content-between'>Healthy Juices <span><i class="fa fa-chevron-right"></i></span>
                        </a>
                    </div>
                    <img src="/storage/front/img/Call-SNK-Wellness-Center.jpg" alt="" style="width: 100%;">
                </div>
                <a href="/storage/front/img/Snk-wellness-center-2024-flyer.pdf">
                    <button class="btn-primary btn-lg w-100" style="font-size: 1.5rem; font-weight: 600;">Download Bronchure</button></a>
            </div>
            <div class="col-md-8 p-3">
                @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show d-flex justify-content-between"
                    role="alert">
                    <div>{{ Session::get('success') }}</div>
                    <button type="button" class="btn btn-secondary" data-dismiss="alert" aria-label="Close"><i
                            class="fa fa-close"></i></button>
                </div>
                @endif
                @if (Session::has(key: 'error'))
                <div class="alert alert-danger alert-dismissible fade show d-flex justify-content-between"
                    role="alert">
                    <div>{{ Session::get('error') }}</div>
                    <button type="button" class="btn btn-secondary" data-dismiss="alert" aria-label="Close"><i
                            class="fa fa-close"></i></button>
                </div>
                @endif
                @yield('service')
            </div>
        </div>
    </div>
</div>
@endsection