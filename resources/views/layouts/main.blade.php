<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Speed Society - @yield('page_title')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-200">
        <header>
            @include('components.navbar')
        </header>
        <div class="container py-12 mx-auto">
            @yield('content')
        </div>
    </body>
</html>
