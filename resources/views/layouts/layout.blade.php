<!doctype HTML>
<html style="position: relative; min-height: 100%">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SomeApp</title>
 <script  src="https://js.stripe.com/v3/"></script>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <style>
        *{
            font-family: 'Noto Sans',sans-serif;
            font-size: 14px;
        }
    </style>
</head>
<body style="background-color: #191429; margin-bottom: 50px">
<div class="container" id="app">
    <header>
@section("upper")
    @can('isAdmin',Auth::user())
        <admin-upper auth="{{Auth::check()}}"></admin-upper>
            @else
                <upper auth="{{Auth::check()}}"></upper>
            @endcan
@show
    </header>
    <main class="main h-100">
<div class="container-fluid">
    @yield("content")
</div>
    </main>
</div>
<footer class="footer" style="background: #231f32;position: absolute; bottom: 0;left: 0; right: 0; height: 50px; width: 100%">
    <div class="container">
    <a class="navbar-brand text-white" href="/">SomeApp</a>
        <p class="text-light opacity-50">© All rights reserved.</p>
    </div>
</footer>
<script src="{{ mix("js/app.js") }}" defer></script>

</body>
</html>
