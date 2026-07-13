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

        <!-- Scripts -->
        <link href="{{ asset('css/output.css') }}" rel="stylesheet">
        @vite(['resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-text-main bg-background">
        <div class="min-h-screen bg-background relative overflow-hidden">
            <div class="absolute top-[-20%] left-[-10%] w-[50%] h-[50%] bg-accent-amber/20 blur-[150px] rounded-full pointer-events-none animate-pulse z-0"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[50%] bg-[#A855F7]/20 blur-[150px] rounded-full pointer-events-none animate-pulse z-0"></div>

            <div class="relative z-10">
                @include('layouts.navigation')

                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white/5 backdrop-blur-md/5 border-b border-white/10 shadow-lg">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
