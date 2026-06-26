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
        <div class="relative min-h-screen overflow-hidden bg-[radial-gradient(circle_at_top_left,_rgba(16,185,129,0.2),_transparent_28%),radial-gradient(circle_at_bottom_right,_rgba(217,249,157,0.25),_transparent_24%),linear-gradient(180deg,#f8fafc_0%,#ecfeff_100%)]">
            <div class="pointer-events-none absolute inset-0">
                <div class="absolute -left-24 top-16 h-72 w-72 rounded-full bg-emerald-200/50 blur-3xl"></div>
                <div class="absolute right-0 top-1/3 h-80 w-80 rounded-full bg-cyan-200/40 blur-3xl"></div>
            </div>

            <div class="relative z-10 flex min-h-screen items-center justify-center px-4 py-10 sm:px-6 lg:px-8">
                <div class="grid w-full max-w-6xl items-center gap-10 lg:grid-cols-[1.05fr_0.95fr]">
                    <div class="hidden lg:block">
                        <div class="max-w-xl">
                            <div class="mb-6 inline-flex items-center gap-2 rounded-full border border-emerald-200 bg-white/80 px-4 py-2 text-sm font-semibold text-emerald-800 shadow-sm backdrop-blur">
                                <span class="h-2.5 w-2.5 rounded-full bg-emerald-500"></span>
                                Pesantren Kita
                            </div>
                            <h1 class="text-4xl font-bold tracking-tight text-slate-900 xl:text-5xl">
                                Portal santri yang lebih rapi, hangat, dan mudah dipakai.
                            </h1>
                            <p class="mt-4 text-lg leading-8 text-slate-600">
                                Masuk untuk mengelola pendaftaran, membaca informasi pesantren, dan memantau riwayat dengan tampilan yang lebih tenang dan modern.
                            </p>

                            <div class="mt-8 grid gap-4 sm:grid-cols-3">
                                <div class="rounded-2xl border border-white/70 bg-white/70 p-4 shadow-lg backdrop-blur">
                                    <div class="text-sm font-medium text-slate-500">Pendaftaran</div>
                                    <div class="mt-1 text-2xl font-bold text-slate-900">Online</div>
                                </div>
                                <div class="rounded-2xl border border-white/70 bg-white/70 p-4 shadow-lg backdrop-blur">
                                    <div class="text-sm font-medium text-slate-500">Informasi</div>
                                    <div class="mt-1 text-2xl font-bold text-slate-900">Terpusat</div>
                                </div>
                                <div class="rounded-2xl border border-white/70 bg-white/70 p-4 shadow-lg backdrop-blur">
                                    <div class="text-sm font-medium text-slate-500">Akses</div>
                                    <div class="mt-1 text-2xl font-bold text-slate-900">Cepat</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full">
                        <div class="mb-6 flex items-center justify-center gap-3 lg:justify-start">
                            <a href="/" class="flex items-center gap-3 rounded-full border border-white/70 bg-white/80 px-4 py-2 shadow-sm backdrop-blur transition hover:-translate-y-0.5 hover:shadow-md">
                                <x-application-logo class="h-10 w-10 fill-current text-emerald-600" />
                                <div class="text-left">
                                    <div class="text-sm font-semibold text-slate-500">Selamat datang di</div>
                                    <div class="text-lg font-bold text-slate-900">{{ config('app.name', 'Pesantren Kita') }}</div>
                                </div>
                            </a>
                        </div>

                        <div class="surface-panel mx-auto w-full max-w-xl p-6 sm:p-8 lg:max-w-none">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
