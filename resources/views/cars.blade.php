@extends('layouts.layout')
@section('content')
            <Cars :cars=@json($cars) :manufactures=@json($manufactures)></Cars>
@endsection
