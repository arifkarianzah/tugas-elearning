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
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-background relative overflow-hidden text-text-main">
            <div class="absolute top-[-20%] left-[-10%] w-[50%] h-[50%] bg-accent-amber/20 blur-[150px] rounded-full pointer-events-none animate-pulse"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[50%] bg-[#A855F7]/20 blur-[150px] rounded-full pointer-events-none animate-pulse"></div>

            <div class="relative z-10 w-full text-center mb-6">
                <a href="/" class="flex flex-col items-center gap-3 w-fit mx-auto">
                    <div class="flex items-center justify-center w-16 h-16 bg-gradient-to-br from-accent-teal to-accent-violet rounded-2xl shadow-xl shadow-accent-teal/30">
                        <span class="font-heading font-bold text-4xl text-white">A</span>
                    </div>
                    <span class="font-heading font-extrabold text-3xl tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-white to-white/70">Alqowy</span>
                </a>
            </div>

            <div class="w-full sm:max-w-md px-8 py-8 bg-white/5 backdrop-blur-md/5 border border-white/10 shadow-2xl relative z-10 sm:rounded-3xl">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
