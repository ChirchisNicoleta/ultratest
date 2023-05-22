<?php session_start() ?>
        <!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="container">
<div>
    <nav class="bg-black text-white">
        <div class="flex flex-row justify-end px-6 py-4 sm:block bg-gray-100">
            @livewire('basket-button')

            <a href="{{ route('/') }}" class="text-sm text-gray-700 underline text-xl">/ Home</a>

        @if (Route::has('login'))
            @auth
                <!-- Authentication -->
                    <form class="inline-block border p-2" method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <input class="text-black text-xl" type="submit" value="{{ __('Log Out') }}"/>

                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline text-xl">/ Log in /</a>

                    @if (Route::has('register'))
                        <a href="{{route('register')}}"
                           class="ml-4 text-sm text-gray-700 underline text-xl">Register</a>
                    @endif
                @endauth
        </div>
    @endif
</div>
</nav>
{{ $slot }}
@livewireScripts
</body>
</html>
