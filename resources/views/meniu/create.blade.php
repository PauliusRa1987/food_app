@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-header">
                    Meniu Create
                </div>
                <form action="{{route('meniu-store')}}" method="post">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="meniu_name" class="col-sm-4 col-form-label">Meniu Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="meniu_name" name="meniu_name">
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="place_id" class="col-sm-4 col-form-label ">Restaurants</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="place_id" name="place_id">
                                    <option value="">-Choose Place-</option>
                                    @foreach($bars as $bar)
                                    <option value="{{$bar->id}}">{{$bar->restaurant_name}} ({{$bar->address}})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted d-flex justify-content-between ">
                        <button class="btn btn-outline-success " type="submit">Add</button>
                        <a class="btn btn-outline-primary" href="{{route('meniu-index')}}">To the List</a>
                        @csrf
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection