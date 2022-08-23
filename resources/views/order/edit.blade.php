@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>Order List</h3>
                    <div class=" header-box">

                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Client</th>
                                <th scope="col">Dish</th>
                                <th scope="col">Restorant</th>
                                <th scope="col">Status</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $order)
                            <form action="{{route('order-update', $order)}}" method="POST">
                                <tr>
                                    <td class="text-center">{{$order->getUserInfo->name}}</td>
                                    <td class="text-center">{{$order->getDishInfo->dish_title}}</td>
                                    <td class="text-center">{{$order->getRestInfo->restaurant_name}}</td>
                                    <td class="text-center">{{$order->status}}</td>
                                    <td class="text-center">{{$order->stics}}</td>

                                    <td>
                                        <div class="d-flex justify-content-end ">
                                            <div class="col-sm-3 m-2">
                                                <select class="form-control" id="status" name="status">
                                                    <option value="Approved">Approve</option>
                                                    <option value="Canceled">Cancel</option>
                                                </select>
                                            </div>
                                            @csrf
                                            @method('put')
                                            <button class="btn btn-outline-warning m-2 " type="submit">Change It!</button>
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
