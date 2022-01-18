@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col">
            <Cars :cars=@json($cars) :manufactures=@json($manufactures)></Cars>
        </div>
    </div>
@endsection
