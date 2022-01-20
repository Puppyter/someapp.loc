@extends('layouts.layout')
@section('upper')
    <admin-upper></admin-upper>
@endsection
@section('content')
    <create-motors :fuels="{{json_encode($fuels)}}" :bodyTypes="{{json_encode($bodyTypes)}}"></create-motors>
@endsection
