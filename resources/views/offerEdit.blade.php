@extends('layouts.layout')
@section('content')
    <edit-offer :offer="{{json_encode($car)}}"></edit-offer>
@endsection
