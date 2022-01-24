@extends('layouts.layout')
@section('content')
            <Cars :manufactures=@json($manufactures)></Cars>
@endsection
