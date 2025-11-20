@extends('layouts.service',['page'=>'Mealplan Request','page_title'=>'Meal Plan Request Form'])
@section('service')
<div class="container-fluid p1">
    <form action="{{route('mealplanrequest.store')}}" method="post" class='card p-3'>
        @csrf
        <div class="row">
            <div class="col-md-6 form-group mb-3">
                <label for="" class='mb-2 fw-bold' style="color:black;">Full Name</label>
                <input type="text" class="form-control" placeholder="eg. Joe Doe" name="name">
            </div>
            <div class="col-md-6 form-group mb-3">
                <label for="" class='mb-2 fw-bold' style="color:black;">Email</label>
                <input type="text" class="form-control" placeholder="eg. example@gmail.com" name='email'>
            </div>
            <div class="col-md-6 form-group mb-3">
                <label for="" class='mb-2 fw-bold' style="color:black;">Phone Number</label>
                <input type="text" class="form-control" placeholder="eg. +254XX XXX XXX" name="phone">
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="" class='mb-2 fw-bold' style="color:black;">Are there any foods you are restricted to take? If yes, list them here below</label>
            <textarea name="restrictions" id="" class="form-control" rows="3"></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="" class='mb-2 fw-bold' style="color:black;">Are there any foods you don't like? If yes, list them here below</label>
            <textarea name="dislikes" id="" class="form-control" rows="3"></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="" class='mb-2 fw-bold' style="color:black;">What is your primary health goal?</label>
            <textarea name="primary_health_goal" id="" class="form-control" rows="3"></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="" class='mb-2 fw-bold' style="color:black;">Do you have any medical condition? If yes, please state it.</label>
            <textarea name="medical_condition" id="" class="form-control" rows="3"></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="" class='mb-2 fw-bold' style="color:black;">Check all meals that apply and fill the number of people expected per meal.</label>
            <div class="">
                <div class="d-flex justify-content-between">
                    <div class=""><input type="checkbox" name="breakfast" value='1' onchange="showMeal('breko')"> Breakfast</div>
                    <div class="col-md-4 d-none mb-2" id='breko'>
                        <input type="number" name='breakfast_no' class="form-control">
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class=""><input type="checkbox" name="lunch" value='1' onchange="showMeal('lunch')"> Lunch</div>
                    <div class="col-md-4 d-none mb-2" id='lunch'>
                        <input type="number" name='lunch_no' class="form-control">
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class=""><input type="checkbox" name="supper" value='1' onchange="showMeal('supper')"> Supper</div>
                    <div class="col-md-4 d-none mb-2" id='supper'>
                        <input type="number" name='supper_no' class="form-control">
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class=""><input type="checkbox" name="snacks" value='1' onchange="showMeal('snacks')"> Snacks</div>
                    <div class="col-md-4 d-none mb-2" id='snacks'>
                        <input type="number" name='snacks_no' class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="" class='mb-2 fw-bold' style="color:black;">Select the most prefered mode of communication.</label>
            <div class="form-check">
                <div class="">
                    <input type="radio" name="mode" value='sms'> SMS
                </div>
                <div class="">
                    <input type="radio" name="mode" value='call'> Call
                </div>
                <div class="">
                    <input type="radio" name="mode" value='whatsapp'> WhatsApp
                </div>
                <div class="">
                    <input type="radio" name="mode" value='email'> Email
                </div>
            </div>
        </div>
        <div class="modal-footer mb-3">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit Request</button>
        </div>
    </form>
</div>
<script>
    function showMeal(meal) {
        var mealfield = document.getElementById(meal)
        console.log(mealfield)
        if (mealfield.classList.contains('d-none')) {
            mealfield.classList.remove('d-none')
        } else {
            mealfield.classList.add('d-none')
        }
    }
</script>
@endsection