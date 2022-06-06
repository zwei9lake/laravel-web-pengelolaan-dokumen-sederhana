<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name') }}</title>

        <!-- Fonts -->
        <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> -->

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">


        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <div class="md:flex">
                @include('layouts.sidebar')

                <!-- Page Content -->
                <main class="w-5/6 p-5">
                    <div>
                        <h1 class="text-4xl sm:text-5xl italic md:text-5xl mb-20 font-bold text-black">Sistem Informasi Pengendalian Dokumen
                        </h1>
                    </div>
                        {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
