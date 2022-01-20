@extends('layouts.layout')
@section('content')
    <Register route="{{route('usersStore')}}" routeLogin="{{route('users.index')}}"></Register>

@endsection
<script>
    var Laravel = {
        'csrfToken' : '{{csrf_token()}}'
    };
</script>
