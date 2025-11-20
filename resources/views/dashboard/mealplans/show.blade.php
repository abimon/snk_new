@extends('layouts.dashboard',['title'=>'Meal Plan Details'])
@section('dashboard')

<div class="container p-4">
    <div class="d-md-flex justify-content-between mt-2 mb-2">
        <h4 class="card-title">Meal Plan</h4>
        <button class="btn btn-primary" onclick="printDiv('printable')">Print Meal Plan & Shopping List</button>
    </div>

    <div class="d-none">
        <div id='printable' style="display: flex;justify-content: center; align-items: center;">
            <div>
                <div class="">
                    <img src="/storage/front/img/logo.png" style="width:90%;" alt="">
                </div>
                <div style="page-break-after: always;padding:20px;">
                    <h5>Breakfast</h5>
                    <p>
                        Eating breakfast will help you start your day with plenty of energy. Don't ruin your breakfast with high-fat and high-calorie foods. Choose some protein and fiber for your breakfast, and it's a good time to eat some fresh fruit.
                    </p>

                    <h5>Mid Morning Snack</h5>
                    <p>
                        A mid-morning snack is totally optional. If you eat a larger breakfast, you may not feel hungry until lunchtime. However, if you're feeling a bit hungry and lunch is still two or three hours away, a light mid-morning snack will tide you over without adding a lot of calories.
                    </p>
                    <h5>Lunch</h5>
                    <p>
                        Lunch is often something you eat at work or school, so it's a great time to pack a sandwich or leftovers that you can heat and eat. Or, if you buy your lunch, choose a healthy clear soup or fresh veggie salad.
                    </p>
                    <h5>Mid afternoon Snack</h5>
                    <p>
                        A mid-afternoon snack is also optional. Keep it low in calories and eat just enough to keep you from feeling too hungry because dinner is just a couple of hours away.
                    </p>
                    <h5>Dinner</h5>
                    <p>
                        Dinner is a time when it's easy to over-eat, especially if you haven't eaten much during the day, so watch your portion sizes. Mentally divide your plate into four quarters. One-quarter is for your protein source, one-quarter is for a starch, and the last two-quarters are for green and colorful vegetables or a green salad.
                        A light complex carbohydrate-rich evening snack may help you sleep but avoid heavy, greasy foods or foods high in refined sugars.
                    </p>
                </div>
                <div style="padding:40px;">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Day/Meal</th>
                                @foreach($meals as $meal)
                                <th>{{$meal}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($days as $day)
                            <tr>
                                <td>{{$day}}</td>
                                @foreach($meals as $meal)
                                <td>
                                    {{ $mealplan->{$day . '_' . $meal} }}
                                </td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div cstyle="padding:40px;">
                    <div class="card p-2">
                        <h4 class="card-title">Shopping List</h4>
                        <ul class="list-group">
                            @foreach($shoppinglist as $item)
                            <li class="list-group-item">{{ $item['qty'] }} {{ $item['item'] }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7 p-2">
            <!-- <h4 class="card-title">Meal Plan</h4> -->
            <div class="card p-2">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Day/Meal</th>
                            @foreach($meals as $meal)
                            <th>{{$meal}}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($days as $day)
                        <tr>
                            <td>{{$day}}</td>
                            @foreach($meals as $meal)
                            <td>
                                {{ $mealplan->{$day . '_' . $meal} }}
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-5 p-2">
            <div class="card p-2">
                <h4 class="card-title">Shopping List</h4>
                <ul class="list-group">
                    @foreach($shoppinglist as $item)
                    <li class="list-group-item">{{ $item['qty'] }} {{ $item['item'] }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
@endsection