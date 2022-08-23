@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>{{$meniu->meniu_name}} at <b>{{$meniu->getInfo->restaurant_name}}</b></h3>
                    <div class=" header-box">

                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Dish</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Discription</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($meniu->dishes as $dish)


                            <form action="{{route('order-store', $dish)}}" method="POST">
                                <tr>
                                    <td class="text-center">{{$dish->dish_title}}</td>
                                    <td class="text-center"><img src="{{$dish->photo}}"></td>
                                    <td class="text-center">{{$dish->dish_text}}</td>
                                    <td class="text-center" style="width:120px">
                                        <div class="col-5 d-flex justify-content-center">
                                            <input type="text" class="form-control" id="stics" name="stics" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-end ">
                                            @csrf
                                            <button class="btn btn-outline-danger m-2 " type="submit">Order It!</button>
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
