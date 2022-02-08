@extends('layouts.layout')
@section('content')
    <payment :paymentType=@json($paymentType)></payment>
@endsection
