@extends('layouts.layout')
@section('content')
    @if(session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <Login></Login>
    <a href="{{route('users.create')}}">Register</a>
@endsection
