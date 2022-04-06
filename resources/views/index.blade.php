<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token()  }}">
</head>
<body>
    @include('partials.nav')

    <main class="bg-light">
        <div class="container">
            @yield('content')
        </div>
    </main>
</body>
</html>
