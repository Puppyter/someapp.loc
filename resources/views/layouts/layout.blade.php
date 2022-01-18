<!doctype HTML>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SomeApp</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body style="height: auto" class="bg-dark">
<div class="container" id="app">
@section("upper")
    <upper></upper>
@show
<div class="container-fluid" style="height: auto">
    @yield("content")
</div>
</div>
<footer class="fixed-bottom" style="background: #212121">
    <p style="color: white">asdasdasfasfafs</p>
</footer>
<script src="{{ mix("js/app.js") }}" defer></script>
</body>
</html>
