@extends('layouts.layout')
@section('content')
    <New-Offer :userId="{{Auth::id()}}" :manufactures="{{json_encode($manufactures)}}"></New-Offer>
@endsection
