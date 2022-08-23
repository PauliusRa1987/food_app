@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-header">
                    Restaurants
                </div>
                <form action="{{route('restaurant-store')}}" method="post">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label">Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="restaurant_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-sm-4 col-form-label">City</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="city" name="city">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-4 col-form-label">Address</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="address" name="address">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="place_kode" class="col-sm-4 col-form-label">Place kode</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="place_kode" name="place_kode">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <button class="btn btn-outline-success " type="submit">Add</button>
                        <a class="btn btn-outline-primary" href="{{route('restaurant-index')}}">To the List</a>
                        @csrf
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection