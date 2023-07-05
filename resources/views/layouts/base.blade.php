<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel-Proj</title>
    @vite('resources/js/app.js')
</head>

<body>
<header>
    <nav class="nav__bar d-flex align-items-center">
        <div class="container d-flex justify-content-between h-100 align-items-center">
            <a class="navbar-brand d-flex align-items-center gap-3" href="/">
                <img src="{{ Vite::asset('resources/img/logo.svg') }}" alt="">
            </a>
            <h3 class="m-0 fw-bold">To Do List</h3>
            @include('partials.navigation')
        </div>
    </nav>
</header>

<div class="container">
    <main>
        @yield('contents')
    </main>
</div>
</body>

</html>
