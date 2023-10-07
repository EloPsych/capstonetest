<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'iNotify') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <a href="/">
                            <img src="/img/iNotify.png" alt="Logo" class="logo" style="width:380px; margin-left: 20vw"> 
                        </a><br>
                        <h3 style="margin-left: 20vw; font-family:Poppins; font-size: 26px; font-weigh">A Web System for Disaster Risk<br>Management and Emergency Response</h3>
                    </div>
                    <div class="col-md-6 w-25 sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg" style="margin-left: 10vw">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
