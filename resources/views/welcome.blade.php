@extends('layouts.layout')
@section('content')
    <example-component :tops="{{$top}}" :topsById="{{$topById}}"></example-component>
@endsection
