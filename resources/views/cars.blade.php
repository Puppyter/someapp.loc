@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col">
            <Cars :cars=@json($cars) :manufactures=@json($manufactures)></Cars>
        </div>
        <div class="col-auto">
            <a href="{{route('offers.create')}}" class="btn btn-primary">Create New Offer</a>
        </div>
    </div>
@endsection
