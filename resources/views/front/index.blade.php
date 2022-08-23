@extends('layouts.app')
@section('content')
<div class="container front">
    <h1 class="card-title col-8 mt-3">Welcome to the Food Hall home page</h1>
    <p class="card-text col-6 mt-3">You might have had bad experiences in the past with hold reservations or such businesses, but Food Hall is different. Check our services!</p>
</div>
<div class="container div-btn-box1 mt-5">
    <div class="card-deck mb-3 text-center col-3 m-5">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Our Locations</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title"><small class="text-muted">Top Locations</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Only best places in city</li>
                    <li>Good deals</li>
                    <li>Staff is allways smile</li>
                    <li>Secure cashless payments</li>
                </ul>
                <a href="{{route('restaurant-index')}}" class="btn btn-lg btn-block btn-outline-primary">Check our Restorants</a>
            </div>
        </div>
    </div>
    <div class="card-deck mb-3 text-center col-3 m-5">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Meniu</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title"><small class="text-muted">Taste and fresh</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Seefood</li>
                    <li>Best pasta</li>
                    <li>Cold Drinks</li>
                    <li>Extra deals and meny others..</li>
                </ul>
                <a href="{{route('meniu-index')}}" class="btn btn-lg btn-block btn-outline-primary">Check our Meniu</a>
            </div>
        </div>
    </div>
    
</div>
@endsection