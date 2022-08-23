@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>Our Restaurants</h3>
                    <div class=" header-box">
                     @if(isset(Auth::user()->role) && Auth::user()->role  > 9)
                        <a class="btn btn-outline-primary" href="{{route('restaurant-create')}}">Add New</a>
                       @endif
                    </div>
                </div>
                <div class="card-body d-flex justify-content-between flex-wrap">
                    @foreach($restaurants as $restaurant)
                    <div class="card col-3 m-4 ">
                        <div class="card-header">
                            <h3> {{$restaurant->restaurant_name}} Restaurant</h3>
                        </div>
                        <div class="card-body ">
                            <ul class="list-group ">
                                <li class="list-group-item"><b>Name: </b><i>{{$restaurant->restaurant_name}}</i></li>
                                <li class="list-group-item"><b>City: </b><i>{{$restaurant->city}}</i></li>
                                <li class="list-group-item"><b>Address: </b><i>{{$restaurant->address}}</i></li>
                                <li class="list-group-item"><b>Place Kode: </b><i>{{$restaurant->place_kode}} h</i></li>
                            </ul>
                            <div class="d-flex justify-content-between ">
                                @if(isset(Auth::user()->role) && Auth::user()->role  > 9)
                                <a class="btn btn-outline-success m-2 " href="{{route('restaurant-edit', $restaurant)}}">Edit info</a>
                                <form action="{{route('restaurant-destroy', $restaurant)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger m-2 " type="submit">Delete</button>
                                </form>
                               @else
                               <a class="btn btn-outline-warning m-2 " href="{{route('meniu-index')}}">Check Our Meniu</a>
                               @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection