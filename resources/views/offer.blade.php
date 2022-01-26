@extends('layouts.layout')
@section('content')
    <Offer :offer="{{json_encode($offer)}}"></Offer>
    @can('update',$offer)
        <a href="{{route('offers.edit',['offer'=>$offer->id])}}" style="background-color: #FD5631;" class="btn text-white">EditOffer</a>
    @else
        @can( 'isAdmin',Auth::user())
            <a href="{{route('offers.edit',['offer'=>$offer->id])}}" style="background-color: #FD5631;" class="btn text-white">EditOffer</a>
        @endcan
    @endcan
@endsection
