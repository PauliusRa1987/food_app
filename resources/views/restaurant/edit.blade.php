@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-header">
                    Edit Restaurant Info
                </div>
                <form action="{{route('restaurant-update', $restaurant)}}" method="post">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label">Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="restaurant_name" value="{{$restaurant->restaurant_name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-sm-4 col-form-label">City</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="city" name="city" value="{{$restaurant->city}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-4 col-form-label">Address</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="address" name="address" value="{{$restaurant->address}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="place_kode" class="col-sm-4 col-form-label">Place Kode</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="place_kode" name="place_kode" value="{{$restaurant->place_kode}}">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <button class="btn btn-outline-success " type="submit">Edit</button>
                        <a class="btn btn-outline-primary" href="{{route('restaurant-index')}}">To the List</a>
                        @csrf
                        @method('put')
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection