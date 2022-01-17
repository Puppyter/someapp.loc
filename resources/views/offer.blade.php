@extends('layouts.layout')
@section('content')
    <Offer :offer="{{json_encode($offer)}}"></Offer>
    @if($offer->user_id === Auth::id())
        <a href="{{route('offers.edit',['offer'=>$offer->id])}}" class="btn btn-primary">EditOffer</a>
    @endif
@endsection
