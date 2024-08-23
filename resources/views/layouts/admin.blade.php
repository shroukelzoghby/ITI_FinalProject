<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard - @yield('title')</title>

    <link rel="icon" href="{{ Vite::logo('icon.png') }}">

    @vite([
        'resources/sass/app.scss',
        'resources/js/app.js',
        'resources/css/font-awesome.min.css',
        'resources/js/font-awesome.min.js'
    ])
</head>
<body>
    @include('admin.nav')

    <main id="app">
        @yield('content')
    </main>

    @include('footer')
</body>
</html>

