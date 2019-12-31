<!-- Stored in resources/views/layouts/master.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'HM Blog') }} - @yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link rel="stylesheet" href="/css/style.css">
</head>
<body>


<nav class="nav-bar sticky">
    <a href="/" class="logo">{{ config('app.name', 'HM Blog') }}</a>
    <div class="nav-items">
        <a href="{{ route('articles.index') }}">Articles</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
    </div>


</nav>

<div class="flex-center position-ref main">

    @if (Route::has('login'))
        <div class="top-right links" style="z-index: 9">
            @guest
                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif

            @else
                <a style="border: 1px solid lightblue" href="{{ url('/admin') }}">{{ Auth::user()->name }}</a>

                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </div>
    @endif


    <div class="content">
        @yield('content')
    </div>


</div>

<footer>
    Copyright © 2019 Fadi Selo.
</footer>
</body>
</html>
