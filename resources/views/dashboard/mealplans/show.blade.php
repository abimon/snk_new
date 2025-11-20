@extends('layouts.dashboard',['title'=>'Meal Plan Details'])
@section('dashboard')

<div class="container p-4">
    <div class="row">
        <div class="col-md-7 p-2">
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
@endsection