@extends('layouts.layout')
@section('content')
    <Register route="{{route('usersStore')}}" routeLogin="{{route('users.index')}}"></Register>
    <a class="btn btn-primary" href="{{route('users.index')}}">Login</a>
@endsection
<script>
    var Laravel = {
        'csrfToken' : '{{csrf_token()}}'
    };
</script>
