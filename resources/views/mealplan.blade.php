@extends('layouts.service',['page'=>'Meal plans','page_title'=>'Tailored Meal Plans'])
@section('service')
<div class="container-fluid h-100 w-100">
    <div class="w-100">
        <div class="card rounded mb-4">
            <img src="/storage/front/img/Tailored-Meal-Plans.webp" alt="" style="width:100%; object-fit: cover;">
        </div>

        <h3 class="text-primary">Tailored Meal Plan</h3>
        <p>Good nutrition is the foundation of good health. At SNK Wellness Center, our Tailored Meal Plans are designed to meet your individual dietary needs and preferences. Whether you’re looking to lose weight, manage a health condition, or simply eat healthier, our expert nutritionists will work with you to create a personalized meal plan that fits your lifestyle.</p>
        <p>We are committed to sustainability and reducing food waste. To achieve this, we have included grocery shopping list ensuring you only buy what you really need to minimize wastage.</p>
        <p>Enjoy the benefits of eating well and feeling your best with our customized meal planning service.</p>
    </div>
    <div class="text-center">
        <a href="/mealplan-request">
            <button class="btn-secondary btn-lg w-50">Request Meal Plan</button>
        </a>
        <!-- <button class="btn-secondary btn-lg w-50" data-bs-toggle="modal" data-bs-target="#mealplan">Request Meal Plan</button> -->

    </div>
    </div>
@endsection