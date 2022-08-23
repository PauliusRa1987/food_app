@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>My Orders</h3>
                    <div class=" header-box">
                        <a class="btn btn-outline-primary" href="{{route('meniu-index')}}">Book new Holiday</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Dish</th>
                                <th scope="col">Restorant</th>
                                <th scope="col">Status</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $order)
                            <form action="{{route('order-destroy', $order)}}" method="POST">
                                <tr>
                                    <td class="text-center">{{$order->getDishInfo->dish_title}}</td>
                                    <td class="text-center">{{$order->getRestInfo->restaurant_name}}</td>
                                    <td class="text-center">{{$order->status}}</td>
                                    <td class="text-center">{{$order->stics}}</td>
                                    <td>
                                        <div class="d-flex justify-content-end ">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-outline-danger m-2 " type="submit">Cancel</button>
                                        </div>
                                    </td>
                                </tr>
                            </form>
                            @empty
                            <h3>List is empty</h3>
                            @endforelse
                        <tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection