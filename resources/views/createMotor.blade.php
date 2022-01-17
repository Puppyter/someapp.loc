@extends('layouts.layout')
@section('content')
    <create-motors :fuels="{{json_encode($fuels)}}" :bodyTypes="{{json_encode($bodyTypes)}}"></create-motors>
@endsection
