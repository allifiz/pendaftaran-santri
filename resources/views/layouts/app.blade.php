<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Pesantren Kita') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-slate-900">
        <div class="relative min-h-screen overflow-hidden bg-[radial-gradient(circle_at_top_left,_rgba(16,185,129,0.16),_transparent_32%),radial-gradient(circle_at_top_right,_rgba(45,212,191,0.14),_transparent_28%),linear-gradient(180deg,#f8fafc_0%,#ecfdf5_100%)]">
            <div class="pointer-events-none absolute inset-0 opacity-70">
                <div class="absolute -left-28 top-24 h-64 w-64 rounded-full bg-emerald-200/40 blur-3xl"></div>
                <div class="absolute right-0 top-40 h-72 w-72 rounded-full bg-cyan-200/30 blur-3xl"></div>
                <div class="absolute bottom-0 left-1/2 h-80 w-80 -translate-x-1/2 rounded-full bg-white/30 blur-3xl"></div>
            </div>
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="relative z-10 border-b border-white/60 bg-white/75 shadow-sm backdrop-blur-xl">
                    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="relative z-10">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
