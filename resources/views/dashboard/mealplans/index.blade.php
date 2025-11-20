@extends('layouts.dashboard',['title'=>'Meal Plans'])
@section('dashboard')

<div class="container mt-3" style="min-height:80vh;">
    <div class="row">
        <div class="col-md-4 p-2" id="mealplanreqcard">
            <div class="card p-2">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="text-start">Meal Plan Requests</h5>
                    <i class="fa fa-times" onclick="closeCard('mealplanreqcard')" type='button'></i>
                </div>
                <hr>
                <div class="">
                    @foreach ($requests as $request)
                    <div class="card mb-2 p-2 shadow" style="color: black;">
                        <div class="d-flex justify-content-between">
                            <h7>{{ $request->name }}'s meal plan to {{$request->primary_health_goal}}</h7>
                        </div>
                        <span class="text-muted mb-2">Requested on {{ $request->created_at->format('jS M, Y') }}</span>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('mealplans.create',['request_id'=>$request->id]) }}"><button type="button" class="btn btn-warning btn-sm text-dark"> Prepare Mealplan</button></a>
                            <a data-bs-toggle="modal" data-bs-target="#modal{{$request->id }}">
                                <button class="btn btn-primary btn-sm text-white">View Details</button>
                            </a>
                            <div class="modal fade" id="modal{{$request->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mealplanLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-capitalized" id="mealplanLabel">Meal Plan to {{$request->primary_health_goal}}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row mb-1">
                                                <div class="fw-bold col-6">Client Name:</div>
                                                <div class="col-6">{{ $request->name }}</div>

                                                <div class="fw-bold col-6">Client Email:</div>
                                                <div class="col-6">{{ $request->email }}</div>
                                            </div>
                                            <div class="row mb-1">
                                                <div class="fw-bold col-6">Client Phone Number:</div>
                                                <div class="col-6">{{ $request->phone }}</div>
                                            </div>
                                            <div class=" mb-1">
                                                <div class="fw-bold">Health Restrictions</div>
                                                <div class="">{{ $request->restrictions }}</div>
                                            </div>
                                            <div class=" mb-1">
                                                <div class="fw-bold">Food Dislikes</div>
                                                <div class="">{{$request->food_dislikes }}</div>
                                            </div>
                                            <div class="mb-1">
                                                <div class="fw-bold">Medical condition</div>
                                                <div class="">{{ $request->medical_condition }}</div>
                                            </div>
                                            <div class="mb-1">
                                                <div class="row mb-2">
                                                    <div class="col-6">
                                                        <div class="fw-bold">Meals</div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="fw-bold">People per Meal</div>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-6">Breakfast</div>
                                                    <div class="col-6">{{ json_decode($request->meal_included)->breakfast==1?json_decode($request->available_people)->Breakfast:0 }}</div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-6">Lunch</div>
                                                    <div class="col-6">{{ json_decode($request->meal_included)->lunch==1?json_decode($request->available_people)->Lunch:0 }}</div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-6">Supper</div>
                                                    <div class="col-6">{{ json_decode($request->meal_included)->supper==1?json_decode($request->available_people)->Supper:0 }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-info text-white" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-4 p-2 h-100" id="mealplancard">
            <div class="card p-2">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="text-start">Completed Meal Plans</h5>
                    <i class="fa fa-times" onclick="closeCard('mealplancard')" type='button'></i>
                </div>
                <hr>
                <div class="">
                    @foreach ($mealplans as $mealplan)
                    <div class="card mb-2 p-2 shadow" style="color: black;">
                        <div class="d-flex justify-content-between">
                            <h7>{{ $mealplan->mrequest->name }}'s meal plan to {{$mealplan->mrequest->primary_health_goal}}</h7>
                        </div>
                        <span class="text-muted mb-2">
                            <!-- duration taken to create from request date -->
                            @php
                            $duration = ceil($mealplan->mrequest->created_at->diffInDays($mealplan->updated_at));
                            @endphp
                            Delivery Duration: {{ $duration }} days
                        </span>
                        <a class="text-end" href="{{ route('mealplans.show',$mealplan->id) }}">
                            <button class="btn btn-primary btn-sm text-white">View Details</button>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-4 p-2 h-100">
            <div class="card p-2" id="Meals" style="min-height: 40vh;">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="text-start">Meals</h5>
                    <div class="">
                        <a class="me-3" data-bs-toggle="modal" data-bs-target="#meal">
                            <i class="fa fa-plus"></i>
                        </a>
                        <div class="modal fade ms-5" id="meal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mealplanLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-capitalized" id="mealplanLabel">Add Meal</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('meals.store') }}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="title" class="fw-bold">Meal Title</label>
                                                <input type="text" class="form-control mb-2" name="title" id="title" placeholder="E.g Chicken and Rice">
                                            </div>
                                            <!-- dropdown -->

                                            <div class="form-control" id="ingres"></div>
                                            <input hidden type="text" name='ingredients' class="form-control" id="ingredients" readonly>
                                            <div class="nav-item dropdown mb-2 w-100">
                                                <a href="#" class="nav-link" data-bs-toggle="dropdown"><i class="fa fa-plus"></i> Ingredient</a>
                                                <div class="dropdown-menu rounded-0 m-0">
                                                    @foreach($items as $ingredient)
                                                    <a class="dropdown-item" href="#" onclick="addIngredient('{{$ingredient->name}}')">{{$ingredient->name}}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <script>
                                                function addIngredient(value) {
                                                    var el = document.getElementById('ingredients').value;
                                                    if (el.includes(value)) {
                                                        alert("Ingredient already added!");
                                                    } else {
                                                        if (el != '') {
                                                            document.getElementById('ingredients').value = el + ', ' + value;
                                                            document.getElementById('ingres').innerHTML = el + ', ' + value;
                                                        } else {
                                                            document.getElementById('ingredients').value = value;
                                                            document.getElementById('ingres').innerHTML = value;
                                                        }
                                                    }

                                                }
                                            </script>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-info text-white" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary text-white">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <i class="fa fa-times" onclick="closeCard('Meals')" type='button'></i>
                    </div>
                </div>
                <div class="">
                    <div class="">
                        <div class="">
                            <ul class="list-group">
                                @foreach ($meals as $item)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{$item->title}}
                                    <div class="d-flex justify-content-between">
                                        <button type="submit" style="border:none;background-color:transparent;" data-bs-toggle="modal" data-bs-target="#delete{{$item->id }}"><i class="fa fa-trash text-danger ms-2"></i></button>

                                        <div class="modal fade" id="delete{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mealplanLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-capitalized" id="mealplanLabel">Delete {{$item->name}}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="mb-2 fw-bold">
                                                            Are you sure you want to delete {{$item->name}} from the ingredients list?
                                                        </p>
                                                        <p class='text-danger fw-bold'>
                                                            Remember this action is irreversable and will affect mealplans containing this item.
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('ingredients.destroy',$item->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash text-light ms-2"></i> Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card p-2" id="Ingredients">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="text-start">Ingredients</h5>
                    <i class="fa fa-times" onclick="closeCard('Ingredients')" type='button'></i>
                </div>
                <div class="">
                    <form action="{{ route('ingredients.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <input type="text" class="form-control" name="name" placeholder="Item Name">
                            </div>
                            <div class="col-md-3 mb-2">
                                <input type="text" class="form-control" name="quantity" placeholder="Qty/Person">
                            </div>
                            <div class="col-md-2 mb-2">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <div class="">
                        <div class="">
                            <ul class="list-group">
                                @foreach ($items as $item)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{$item->name}}
                                    <div class="d-flex justify-content-between">
                                        <span class="me-2">{{$item->quantity}} per person</span><button type="submit" style="border:none;background-color:transparent;" data-bs-toggle="modal" data-bs-target="#delete{{$item->id }}"><i class="fa fa-trash text-danger ms-2"></i></button>

                                        <div class="modal fade" id="delete{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mealplanLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-capitalized" id="mealplanLabel">Delete {{$item->name}}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="mb-2 fw-bold">
                                                            Are you sure you want to delete {{$item->name}} from the ingredients list?
                                                        </p>
                                                        <p class='text-danger fw-bold'>
                                                            Remember this action is irreversable and will affect mealplans containing this item.
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('ingredients.destroy',$item->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash text-light ms-2"></i> Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function closeCard(cardId) {
        document.getElementById(cardId).style.display = 'none';
    }
</script>
@endsection