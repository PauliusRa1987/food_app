@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>Our Dishes</h3>

                    <div class=" header-box">
                        <a class="btn btn-outline-primary" href="{{route('dish-create')}}">Add New</a>
                    </div>

                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Restaurant</th>
                                <th scope="col">Meniu Type</th>
                                <th scope="col">Dish</th>
                                <th scope="col">Discrition</th>
                                <th scope="col">Image</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dishs as $dish)
                            <form action="{{route('dish-destroy', $dish)}}" method="POST">
                                <tr>
                                    <td class="text-center">{{$dish->getMeniuInfo->getInfo->restaurant_name}}</td>
                                    <td class="text-center">{{$dish->getMeniuInfo->meniu_name}}</td>
                                    <td class="text-center">{{$dish->dish_title}}</td>
                                    <td class="text-center">{{$dish->dish_text}}</td>
                                    <td class="text-center"><img src="{{$dish->photo}}" alt="dish image"></td>
                                    
                                    <td>
                                       
                                        <div class="d-flex justify-content-end ">
                                            <a class="btn btn-outline-success m-2 " href="{{route('dish-edit', $dish)}}">Edit info</a>
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-outline-danger m-2 " type="submit">Delete</button>
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