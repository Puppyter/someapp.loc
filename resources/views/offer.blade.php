@extends('layouts.layout')
@section('content')
    <Offer :offer="{{json_encode($offer)}}"></Offer>
    @if($offer->user_id === Auth::id())
        <a href="{{route('offers.edit',['offer'=>$offer->id])}}" style="background-color: #FD5631;" class="btn text-white">EditOffer</a>
    @endif
@endsection
