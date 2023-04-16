<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


        @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])
        {{-- <script async defer
        src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBiJUX6hj4VIh3bAuzoAKJAIcKVDvO3gik&callback=initMap()">
        </script> --}}
    </head>
    {{-- <body class="font-sans antialiased"> --}}
        <body class="font-sans antialiased" x-data="{ darkMode: false }" x-init="
    if (!('darkMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) {
      localStorage.setItem('darkMode', JSON.stringify(true));
    }
    darkMode = JSON.parse(localStorage.getItem('darkMode'));
    $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" x-cloak>
        <div x-bind:class="{'dark' : darkMode === true}" class="min-h-screen bg-gray-100">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            @if (isset($header))
            <!-- Page Heading -->
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                <div class="container">
                    {{ $slot }}
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12" id="map" style="height:500px">
                        </div>
                    </div>
                </div>
            </main>
        </div>
        {{-- <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script> --}}
        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script> --}}
        <!-- Scripts -->
        {{-- @vite(['resources/js/map.js']) --}}

        <script async
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBiJUX6hj4VIh3bAuzoAKJAIcKVDvO3gik&callback=initMap">
        </script>

    </body>
</html>
