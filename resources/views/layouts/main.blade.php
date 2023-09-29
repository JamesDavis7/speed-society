<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Speed Society - @yield('page_title')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="bg-gray-200">
        <header>
            @include('components.navbar')
        </header>
        
        @if(session('success'))
            <div class="w-full py-4 text-center bg-green-300">
                <span class="text-xl font-light text-green-800">{{ session('success')}}</span>
            </div>
        @endif

        <div class="container py-12 mx-auto">

            @yield('content')
        </div>

        @livewireScripts
    </body>
</html>


