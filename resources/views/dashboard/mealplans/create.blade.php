@extends('layouts.dashboard',['title'=>'Meal Plan Generation'])

@section('dashboard')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Meal Plan Generation</h4>
                </div>
                <form action="{{ route('mealplans.store',['request_id'=>$request_id]) }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-md-12">
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
                                                <!-- dropdown -->
                                                <div class="nav-item dropdown mb-2 w-100">
                                                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Select Meals</a>
                                                    <div class="dropdown-menu rounded-0 m-0">
                                                        @foreach($_meals as $_meal)
                                                        <a class="dropdown-item" href="#" onclick="addIngredient('{{$_meal->title}}', '{{$day}}','{{ $meal}}')">{{$_meal->title}}</a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="" id="in{{$day.'_'. $meal }}"></div>
                                                <input hidden type="text" name='{{$day.'_'. $meal }}' class="form-control" id="{{$day.'_'. $meal }}" readonly>

                                            </td>
                                            @endforeach
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Generate</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function addIngredient(value, day, meal) {
        var el = document.getElementById(day + '_' + meal).value;
        if (el.includes(value)) {
            alert("Ingredient already added!");
        } else {
            if (el != '') {
                document.getElementById(day + '_' + meal).value = el + ', ' + value;
                document.getElementById('in' + day + '_' + meal).innerHTML = el + ', ' + value;
            } else {
                document.getElementById(day + '_' + meal).value = value;
                document.getElementById('in' + day + '_' + meal).innerHTML = value;
            }
        }

    }
</script>
@endsection