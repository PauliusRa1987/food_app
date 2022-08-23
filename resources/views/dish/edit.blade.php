@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-header">
                    Edit Dish info
                </div>
                <form action="{{route('dish-update', $dish)}}" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label">Dish</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="dish_title" value="{{$dish->dish_title}}">
                            </div>
                        </div>
                        <div class="form-group row m-2 justify-content-center">
                        <img style="width:100px" src="{{$dish->photo}}" alt="photo of dish">
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-sm-4 col-form-label">Dish Image</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" id="image" name="dish_image">
                            </div>
                        </div>
                         <div class="form-group row mt-2">
                            <label for="meniu_id" class="col-sm-4 col-form-label ">In Meniu</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="meniu_id" name="meniu_id">
                                    <option value="">-Choose Meniu-</option>
                                    @foreach($menius as $meniu)
                                    <option value="{{$meniu->id}}" @if($meniu->id == $dish->meniu_id) selected @endif>{{$meniu->meniu_name}} at <b> {{$meniu->getInfo->restaurant_name}}</b></option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label class="col-sm-4 col-form-label " for="dish_text">Discription</label>
                            <div class="col-sm-8">
                            <textarea class="form-control" id="dish_text" name="dish_text" rows="3">{{$dish->dish_text}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted d-flex justify-content-between ">
                        <button class="btn btn-outline-success " type="submit">Update Info</button>
                        <a class="btn btn-outline-primary" href="{{route('dish-index')}}">To the List</a>
                        @csrf
                        @method('put')
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection