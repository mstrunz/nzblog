<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-findcond">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('home') }}">Blog</a>
            </div>
            <div class="navbar" id="navbar">
                <ul class="nav navbar-nav navbar-right">
                    @if (\Illuminate\Support\Facades\Auth::check())
                        <li>
                            <a href="/new">New</a>
                        </li>
                        <li>
                            <a href="/logout">Logout</a>
                        </li>
                    @else
                        <li>
                            <a href="/login">Login</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
</div>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>