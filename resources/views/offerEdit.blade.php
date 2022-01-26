@extends('layouts.layout')
@section('content')
    @can('update',$offer)
    <edit-offer :offer="{{json_encode($offer)}}"></edit-offer>
    @else
        @can('isAdmin',Auth::user())
            <edit-offer :offer="{{json_encode($offer)}}"></edit-offer>
        @endcan
    @endcan
@endsection
