@extends('layouts.dashboard',['title'=>'Meal Plans'])
@section('dashboard')
<div class="container mt-3" style="min-height:80vh;">
    <div class="row">
        <div class="col-md-6 p-2" id="juice">
            <div class="card p-2">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="text-start">Juices</h5>
                    <i class="fa fa-times" onclick="closeCard('juice')" type='button'></i>
                </div>
                <div class="">
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalJuice">Add Juice</button>
                    </div>
                    <div class="modal fade" id="modalJuice" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="JuiceLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-capitalized" id="JuiceLabel">Add a new juice</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ route('juices.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group mb-2">
                                            <label for="name">Flavour</label>
                                            <select name="flavour_id" id="" class="form-select">
                                                <option selected disabled>Select flavour</option>
                                                @foreach ($flavours as $flavour)
                                                <option value="{{ $flavour->id }}">{{ $flavour->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="description">Size(ml)</label>
                                            <input type="text" name="size" id="" class="form-control">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="description">Price(Ksh)</label>
                                            <input type="text" name="price" id="" class="form-control">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="">Cover Image</label>
                                            <div class="m-3 card p-3 border-dark bg-transparent" style="border-style:dashed;">
                                                <img id="out" src="" style="width: 100%; object-fit:scale-down;" />
                                                <input type="file" accept="image/*" name="cover" id="cover" style="display: none;" class="form-control" onchange="loadCoverFile(event)">
                                                <div class="pt-2" id="desc">
                                                    <div class="" id="uploader">
                                                        <div class="text-center" style="font-size: xxx-large; font-weight:bolder;">
                                                            <i class="bi bi-upload"></i>
                                                        </div>
                                                        <div class="text-center text-primary">*Supported files .png .jpg .webp</div>
                                                    </div>
                                                    <div class="text-center">
                                                        <label for="cover" class="btn btn-success text-white"
                                                            title="Upload new profile image">Browse</label>
                                                    </div>
                                                </div>
                                                <script>
                                                    var loadCoverFile = function(event) {
                                                        var image = document.getElementById('out');
                                                        image.src = URL.createObjectURL(event.target.files[0]);
                                                        document.getElementById('cover').value == image.src;
                                                        document.getElementById('uploader').style.display = 'none';
                                                    };
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-info text-white" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary text-white">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th scope="col">Flavour</th>
                                <th scope="col">Size(ml)</th>
                                <th scope="col">Price(Ksh)</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($juices as $item)
                            <tr>
                                <td>
                                    <img src="/storage/{{ $item->image_path }}" alt="" style="width:40px;height:40px;object-fit: cover;">
                                    <div class="text-start">{{$item->flavour->name}}</div>
                                </td>
                                <td>{{$item->size}}</td>
                                <td>{{$item->price}}</td>
                                <td class="text-center">
                                    <button type="submit" style="border:none;background-color:transparent;" data-bs-toggle="modal" data-bs-target="#edit{{$item->id }}"><i class="fa fa-edit text-success ms-2"></i></button>
                                    <button type="submit" style="border:none;background-color:transparent;" data-bs-toggle="modal" data-bs-target="#delete{{$item->id }}"><i class="fa fa-trash text-danger ms-2"></i></button>
                                </td>
                            </tr>
                            <div class="modal fade" id="delete{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mealplanLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-capitalized" id="mealplanLabel">Delete {{$item->flavour->name}} {{$item->size}}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="mb-2 fw-bold">
                                                Are you sure you want to delete {{$item->flavour->name}} from the flavours list?
                                            </p>
                                            <p class='text-danger fw-bold'>
                                                Remember this action is irreversable and will affect juices containing this flavour.
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <form action="{{ route('juices.destroy',$item->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash text-light ms-2"></i> Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6 p-2 h-100" id="flavours">
            <div class="card p-2">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="text-start">Flavours</h5>
                    <i class="fa fa-times" onclick="closeCard('flavours')" type='button'></i>
                </div>
                <div class="">
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalFlavour">Add Flavour</button>
                    </div>
                    <div class="modal fade" id="modalFlavour" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mealplanLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-capitalized" id="mealplanLabel">Add a new flavour</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ route('flavour.store') }}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="name">Flavour Name</label>
                                            <input type="text" class="form-control" id="name" name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Flavour Description</label>
                                            <textarea class="form-control" id="description" name="description" required rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-info text-white" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary text-white">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="">
                        <div class="">
                            <ul class="list-group">
                                @foreach ($flavours as $item)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{$item->name}}
                                    <div class="d-flex justify-content-between">
                                        <div class="form-check">
                                            <form action="{{ route('flavour.update',$item->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" value="{{$item->status?0:1}}">
                                                <input class="form-check-input" type="checkbox"  id="checkChecked" {{$item->status?'checked':''}} onclick="submit(this.form)">
                                            </form>
                                        </div>
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
                                                            Are you sure you want to delete {{$item->name}} from the flavours list?
                                                        </p>
                                                        <p class='text-danger fw-bold'>
                                                            Remember this action is irreversable and will affect juices containing this flavour.
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('flavour.destroy',$item->id) }}" method="post">
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