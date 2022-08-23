@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
            
                <div class="card-header d-flex justify-content-between">
                    <h3>Meniu List</h3>
                    <div class=" header-box">
                    @if(isset(Auth::user()->role) && Auth::user()->role  > 9)
                        <a class="btn btn-outline-primary" href="{{route('meniu-create')}}">Add New</a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                <div class="div-box">
@include('meniu.search')
</div>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Meniu Name</th>
                                <th scope="col">Restaurant</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($menius as $meniu)
                            <form action="{{route('meniu-destroy', $meniu)}}" method="POST">
                                <tr>
                                    <td class="text-center">{{$meniu->meniu_name}}</td>
                                    <td class="text-center">{{$meniu->getInfo->restaurant_name}}</td>
                                    <td>
                                        <div class="d-flex justify-content-center ">
                                        @if(isset(Auth::user()->role) && Auth::user()->role  > 9)
                                            <a class="btn btn-outline-success m-2 " href="{{route('meniu-edit', $meniu)}}">Edit info</a>
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-outline-danger m-2 " type="submit">Delete</button>
                                        @else
                                        @if(isset(Auth::user()->role) && Auth::user()->role  ==1)
                                        <a class="btn btn-outline-warning m-2 " href="{{route('order-create', $meniu)}}">Check Dishes and Book</a>
                                        @else
                                        <h5>Please log in to make a order!</h5>
                                        @endif
                                        @endif
                                        </div>
                                    </td>
                                </tr>
                            </form>
                            @endforeach
                        <tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection