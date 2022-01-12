@extends('layouts.layout')
@section('content')
    <Offer :car="{{json_encode($car)}}"></Offer>
@endsection
