<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Pesantren') }} - Informasi & Berita</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=manrope:400,500,600,700,800&playfair-display:500,600,700&display=swap" rel="stylesheet" />
    <style>
        @keyframes scroll-x {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        .carousel-mask {
            overflow: hidden;
            position: relative;
        }

        .carousel-track {
            display: flex;
            gap: 1rem;
            width: max-content;
            animation: scroll-x 40s linear infinite;
        }

        .carousel-track.slow {
            animation-duration: 55s;
        }

        .carousel-item {
            min-width: 280px;
        }
    </style>

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased text-slate-900 bg-white" style="font-family: 'Manrope', 'Segoe UI', sans-serif;">
    <!-- Navigation -->
    <nav class="sticky top-0 z-50 border-b border-white/60 bg-white/85 shadow-xl shadow-[#80AF81]/30 backdrop-blur-xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ url('/') }}" class="group flex items-center gap-3">
                        <div class="rounded-full bg-[#508D4E] p-2 text-white shadow-lg shadow-[#80AF81]/40 transition group-hover:-translate-y-0.5 group-hover:shadow-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <div>
                            <span class="text-xs font-semibold uppercase tracking-[0.3em] text-[#80AF81]">Portal</span>
                            <span class="block text-xl font-bold text-[#1A5319]">{{ config('app.name', 'Pesantren Kita') }}</span>
                        </div>
                    </a>
                </div>

                <div class="hidden sm:flex sm:items-center sm:space-x-3">
                    <a href="{{ url('/') }}" class="rounded-full border border-[#80AF81]/40 bg-[#D6EFD8] px-4 py-2 font-semibold text-[#1A5319] shadow-lg shadow-[#80AF81]/30">Beranda</a>
                    <a href="#informasi" class="rounded-full px-4 py-2 font-medium text-[#1A5319]/70 transition hover:bg-white/70 hover:text-[#1A5319]">Informasi</a>
                    
                    @auth
                        <a href="{{ url('/dashboard') }}" class="rounded-full px-4 py-2 font-semibold text-[#1A5319] transition hover:bg-white/70 hover:text-[#1A5319]">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="rounded-full px-4 py-2 font-semibold text-[#1A5319] transition hover:bg-white/70 hover:text-[#1A5319]">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="rounded-full bg-[#1A5319] px-4 py-2 font-semibold text-white shadow-lg shadow-[#508D4E]/30 transition duration-200 hover:-translate-y-0.5 hover:bg-[#508D4E]">
                                Daftar
                            </a>
                        @endif
                    @endauth
                </div>

                <!-- Mobile menu button -->
                <div class="sm:hidden flex items-center">
                    <button onclick="toggleMobileMenu()" class="text-gray-600 hover:text-emerald-700 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden sm:hidden border-t border-[#80AF81]/40 bg-white/95 backdrop-blur-xl">
            <div class="space-y-2 px-4 py-4">
                <a href="{{ url('/') }}" class="block rounded-2xl bg-[#D6EFD8] px-3 py-2 font-semibold text-[#1A5319]">Beranda</a>
                <a href="#informasi" class="block rounded-2xl px-3 py-2 text-[#1A5319]/70 hover:bg-[#D6EFD8] hover:text-[#1A5319]">Informasi</a>
                @auth
                    <a href="{{ url('/dashboard') }}" class="block rounded-2xl px-3 py-2 font-semibold text-[#1A5319] hover:bg-[#D6EFD8] hover:text-[#1A5319]">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="block rounded-2xl px-3 py-2 text-[#1A5319] hover:bg-[#D6EFD8] hover:text-[#1A5319]">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="block rounded-2xl px-3 py-2 text-[#1A5319] hover:bg-[#D6EFD8] hover:text-[#1A5319]">Daftar</a>
                    @endif
                @endauth
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    @php
        $heroGallery = [
            'https://picsum.photos/seed/pesantren-hero-01/1600/900',
            'https://picsum.photos/seed/pesantren-hero-02/1600/900',
            'https://picsum.photos/seed/pesantren-hero-03/1600/900',
        ];
    @endphp

    <div class="relative overflow-hidden bg-white">
        <div class="absolute inset-0">
            <div id="hero-carousel" class="relative h-full w-full">
                @foreach($heroGallery as $index => $image)
                    <div class="hero-slide absolute inset-0 transition-opacity duration-1000 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}">
                        <img src="{{ $image }}" alt="Galeri pesantren" class="h-full w-full object-cover">
                        <div class="absolute inset-0 bg-black/60"></div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="relative mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="mb-6 inline-flex items-center gap-2 rounded-full border border-[#80AF81]/40 bg-[#D6EFD8] px-4 py-2 text-sm font-semibold text-[#1A5319] shadow-lg shadow-[#80AF81]/30">
                    <span class="h-2.5 w-2.5 rounded-full bg-[#508D4E]"></span>
                    Portal resmi pendaftaran dan informasi pesantren
                </div>
                <h1 class="mb-6 text-4xl font-bold text-[#D6EFD8] md:text-6xl font-['Playfair_Display']">
                    Selamat Datang di<br/>
                    <span class="text-[#80AF81]">{{ config('app.name', 'Pesantren Kita') }}</span>
                </h1>
                <p class="mx-auto mb-8 max-w-3xl text-xl text-[#D6EFD8]/70 md:text-2xl">
                    Pusat informasi dan pendaftaran santri online. Temukan berita terbaru dan informasi seputar pesantren.
                </p>
                <div class="flex flex-col justify-center gap-4 sm:flex-row">
                    <a href="#informasi" class="inline-flex items-center justify-center gap-2 rounded-full bg-[#1A5319] px-8 py-3 font-semibold text-white shadow-2xl shadow-[#508D4E]/30 transition duration-200 hover:-translate-y-0.5 hover:bg-[#508D4E]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                        Lihat Informasi
                    </a>
                    @guest
                        <a href="{{ route('register') }}" class="inline-flex items-center justify-center gap-2 rounded-full border border-[#80AF81]/40 bg-[#D6EFD8] px-8 py-3 font-semibold text-[#1A5319] shadow-2xl shadow-[#80AF81]/30 transition duration-200 hover:-translate-y-0.5 hover:bg-[#80AF81]">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                            Daftar Sekarang
                        </a>
                    @endguest
                </div>
            </div>
            <div class="mt-10 grid gap-4 sm:grid-cols-3">
                <div class="rounded-2xl bg-[#D6EFD8] p-4 shadow-2xl shadow-[#80AF81]/30">
                    <div class="text-xs font-semibold uppercase tracking-[0.3em] text-[#508D4E]">Pendaftaran</div>
                    <div class="mt-2 text-xl font-bold text-[#1A5319]">Online</div>
                </div>
                <div class="rounded-2xl bg-[#80AF81] p-4 shadow-2xl shadow-[#508D4E]/30">
                    <div class="text-xs font-semibold uppercase tracking-[0.3em] text-[#D6EFD8]">Informasi</div>
                    <div class="mt-2 text-xl font-bold text-white">Terkini</div>
                </div>
                <div class="rounded-2xl bg-[#508D4E] p-4 shadow-2xl shadow-[#1A5319]/30">
                    <div class="text-xs font-semibold uppercase tracking-[0.3em] text-[#D6EFD8]">Agenda</div>
                    <div class="mt-2 text-xl font-bold text-white">Harian</div>
                </div>
            </div>
        </div>
    </div>

    @php
        $gallery = [
            'https://picsum.photos/seed/pesantren-01/1200/800',
            'https://picsum.photos/seed/pesantren-02/1200/800',
            'https://picsum.photos/seed/pesantren-03/1200/800',
            'https://picsum.photos/seed/pesantren-04/1200/800',
            'https://picsum.photos/seed/pesantren-05/1200/800',
            'https://picsum.photos/seed/pesantren-06/1200/800',
        ];
    @endphp

    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.3em] text-[#80AF81]">Galeri</p>
                    <h2 class="text-3xl font-bold text-[#1A5319] font-['Playfair_Display']">Potret Pesantren</h2>
                </div>
                <span class="text-sm text-[#1A5319]/60">Auto scroll</span>
            </div>
            <div class="carousel-mask rounded-3xl border border-[#80AF81]/30 bg-white p-4 shadow-2xl shadow-[#80AF81]/35">
                <div class="carousel-track">
                    @foreach($gallery as $image)
                        <div class="carousel-item">
                            <div class="overflow-hidden rounded-2xl shadow-2xl shadow-[#80AF81]/30">
                                <img src="{{ $image }}" alt="Galeri pesantren" class="h-48 w-72 object-cover">
                            </div>
                        </div>
                    @endforeach
                    @foreach($gallery as $image)
                        <div class="carousel-item">
                            <div class="overflow-hidden rounded-2xl shadow-2xl shadow-[#80AF81]/30">
                                <img src="{{ $image }}" alt="Galeri pesantren" class="h-48 w-72 object-cover">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <script>
        (function () {
            const slides = document.querySelectorAll('#hero-carousel .hero-slide');
            if (!slides.length) return;
            let index = 0;
            setInterval(() => {
                slides[index].classList.remove('opacity-100');
                slides[index].classList.add('opacity-0');
                index = (index + 1) % slides.length;
                slides[index].classList.remove('opacity-0');
                slides[index].classList.add('opacity-100');
            }, 5000);
        })();
    </script>

    @php
        $collection = $informasi->getCollection();
        $featured = $collection->first();
        $trending = $collection->take(5);
        $secondary = $collection->skip(1)->take(2);
        $rest = $collection->skip(3);
    @endphp

    <section class="py-16 md:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-[1.2fr_0.8fr]">
                <div class="space-y-6">
                    <div class="inline-flex items-center gap-2 rounded-full border border-[#80AF81]/40 bg-white px-4 py-2 text-sm font-semibold text-[#1A5319] shadow-2xl shadow-[#80AF81]/40">
                        Headline hari ini
                    </div>

                    @if($featured)
                        <article class="group overflow-hidden rounded-[2rem] border border-[#80AF81]/40 bg-gradient-to-br from-[#D6EFD8] via-white to-white shadow-2xl shadow-[#80AF81]/45 transition duration-300 hover:-translate-y-1">
                            <div class="relative h-80 overflow-hidden">
                                @if($featured->gambar)
                                    <img src="{{ asset('storage/' . $featured->gambar) }}" alt="{{ $featured->judul }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-110">
                                @else
                                    <div class="h-full w-full bg-gradient-to-br from-emerald-500 to-teal-700"></div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-900/10 to-transparent"></div>
                                <div class="absolute bottom-6 left-6 right-6">
                                    <div class="mb-3 inline-flex items-center gap-2 rounded-full bg-white/10 px-3 py-1 text-xs font-semibold text-[#D6EFD8] backdrop-blur">
                                        Highlight Pesantren
                                    </div>
                                    <h2 class="text-3xl font-bold text-white sm:text-4xl font-['Playfair_Display']">
                                        {{ $featured->judul }}
                                    </h2>
                                    <p class="mt-2 text-sm text-[#D6EFD8]">
                                        {{ $featured->created_at->format('d M Y') }}
                                    </p>
                                </div>
                            </div>
                            <div class="p-6">
                                <p class="text-slate-600 line-clamp-3">
                                    {{ Str::limit(strip_tags($featured->konten), 220) }}
                                </p>
                                <div class="mt-6 flex items-center justify-between border-t border-slate-100 pt-4">
                                    <span class="text-sm text-slate-500">Baca selengkapnya</span>
                                    <a href="{{ route('blog.show', $featured) }}" class="inline-flex items-center gap-2 rounded-full bg-[#1A5319] px-4 py-2 text-sm font-semibold text-white shadow-2xl shadow-[#508D4E]/30 transition hover:-translate-y-0.5 hover:bg-[#508D4E]">
                                        Lihat Artikel
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endif

                    <div class="carousel-mask">
                        <div class="carousel-track slow">
                        @foreach($secondary as $item)
                            <article class="carousel-item group overflow-hidden rounded-3xl border border-white/70 bg-white shadow-2xl shadow-[#80AF81]/35 transition duration-300 hover:-translate-y-1">
                                <div class="relative h-40 overflow-hidden">
                                    @if($item->gambar)
                                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-110">
                                    @else
                                        <div class="h-full w-full bg-gradient-to-br from-[#80AF81] to-[#508D4E]"></div>
                                    @endif
                                </div>
                                <div class="p-5">
                                    <h3 class="text-lg font-semibold text-slate-900 line-clamp-2">
                                        {{ $item->judul }}
                                    </h3>
                                    <p class="mt-2 text-sm text-slate-600 line-clamp-2">
                                        {{ Str::limit(strip_tags($item->konten), 120) }}
                                    </p>
                                    <div class="mt-4 flex items-center justify-between text-sm text-slate-500">
                                        <span>{{ $item->created_at->format('d M Y') }}</span>
                                        <a href="{{ route('blog.show', $item) }}" class="font-semibold text-[#1A5319] hover:text-[#508D4E]">Baca</a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                        @foreach($secondary as $item)
                            <article class="carousel-item group overflow-hidden rounded-3xl border border-white/70 bg-white shadow-2xl shadow-[#80AF81]/35 transition duration-300 hover:-translate-y-1">
                                <div class="relative h-40 overflow-hidden">
                                    @if($item->gambar)
                                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-110">
                                    @else
                                        <div class="h-full w-full bg-gradient-to-br from-[#80AF81] to-[#508D4E]"></div>
                                    @endif
                                </div>
                                <div class="p-5">
                                    <h3 class="text-lg font-semibold text-slate-900 line-clamp-2">
                                        {{ $item->judul }}
                                    </h3>
                                    <p class="mt-2 text-sm text-slate-600 line-clamp-2">
                                        {{ Str::limit(strip_tags($item->konten), 120) }}
                                    </p>
                                    <div class="mt-4 flex items-center justify-between text-sm text-slate-500">
                                        <span>{{ $item->created_at->format('d M Y') }}</span>
                                        <a href="{{ route('blog.show', $item) }}" class="font-semibold text-[#1A5319] hover:text-[#508D4E]">Baca</a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                        </div>
                    </div>
                </div>

                <aside class="space-y-6">
                    <div class="rounded-3xl border border-white/70 bg-white p-6 shadow-2xl shadow-[#80AF81]/45">
                        <h3 class="text-lg font-bold text-[#1A5319] font-['Playfair_Display']">Trending</h3>
                        <div class="mt-4 space-y-4">
                            @foreach($trending as $item)
                                <a href="{{ route('blog.show', $item) }}" class="flex items-start gap-3">
                                    <div class="h-14 w-14 overflow-hidden rounded-2xl bg-[#D6EFD8]">
                                        @if($item->gambar)
                                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="h-full w-full object-cover">
                                        @endif
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-[#1A5319] line-clamp-2">{{ $item->judul }}</p>
                                        <p class="mt-1 text-xs text-slate-500">{{ $item->created_at->format('d M Y') }}</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <div class="rounded-3xl border border-[#80AF81]/40 bg-gradient-to-br from-[#D6EFD8] to-white p-6 shadow-2xl shadow-[#80AF81]/45">
                        <h3 class="text-lg font-bold text-[#1A5319] font-['Playfair_Display']">Jelajahi Topik</h3>
                        <div class="mt-4 flex flex-wrap gap-2">
                            <span class="rounded-full bg-white px-3 py-1 text-xs font-semibold text-[#1A5319]">Berita</span>
                            <span class="rounded-full bg-white px-3 py-1 text-xs font-semibold text-[#1A5319]">Kegiatan</span>
                            <span class="rounded-full bg-white px-3 py-1 text-xs font-semibold text-[#1A5319]">Pendidikan</span>
                            <span class="rounded-full bg-white px-3 py-1 text-xs font-semibold text-[#1A5319]">Prestasi</span>
                            <span class="rounded-full bg-white px-3 py-1 text-xs font-semibold text-[#1A5319]">Santri</span>
                        </div>
                    </div>

                    <div class="rounded-3xl border border-white/70 bg-white p-6 shadow-2xl shadow-[#80AF81]/45">
                        <h3 class="text-lg font-bold text-[#1A5319] font-['Playfair_Display']">Newsletter Pesantren</h3>
                        <p class="mt-2 text-sm text-slate-600">Ikuti kabar terbaru dari Pesantren Kita lewat email mingguan.</p>
                        <div class="mt-4 flex flex-col gap-3">
                            <input type="email" placeholder="Alamat email" class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-[#508D4E] focus:ring-[#508D4E]">
                            <button class="rounded-xl bg-[#1A5319] px-4 py-3 text-sm font-semibold text-white shadow-2xl shadow-[#508D4E]/30 transition hover:-translate-y-0.5 hover:bg-[#508D4E]">Berlangganan</button>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <!-- Information/Blog Section -->
    <section id="informasi" class="py-10 md:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-10 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                <div>
                    <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-[#80AF81]/40 bg-white px-4 py-2 text-sm font-semibold text-[#1A5319] shadow-xl shadow-[#80AF81]/30">
                        Berita terbaru
                    </div>
                    <h2 class="text-3xl font-bold text-[#1A5319] md:text-4xl font-['Playfair_Display']">Informasi & Agenda Pesantren</h2>
                </div>
                <p class="max-w-xl text-sm text-slate-600">Rangkuman berita, agenda, dan tulisan inspiratif seputar pesantren. Disusun agar mudah dibaca seperti portal informasi.</p>
            </div>

            @if($informasi->count() > 0)
                <div class="grid gap-8 lg:grid-cols-[1fr_0.4fr]">
                    <div class="carousel-mask">
                        <div class="carousel-track">
                        @foreach($rest as $item)
                            <article class="carousel-item group overflow-hidden rounded-3xl border border-white/70 bg-white shadow-2xl shadow-[#80AF81]/35 transition duration-300 hover:-translate-y-1">
                                <div class="relative h-52 overflow-hidden">
                                    @if($item->gambar)
                                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-110">
                                    @else
                                        <div class="h-full w-full bg-gradient-to-br from-[#80AF81] to-[#508D4E]"></div>
                                    @endif
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                                </div>
                                <div class="p-6">
                                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#508D4E]">Terbaru</p>
                                    <h3 class="mt-2 text-xl font-bold text-[#1A5319] line-clamp-2">
                                        {{ $item->judul }}
                                    </h3>
                                    <p class="mt-3 text-sm text-slate-600 line-clamp-3">
                                        {{ Str::limit(strip_tags($item->konten), 140) }}
                                    </p>
                                    <div class="mt-5 flex items-center justify-between text-sm text-slate-500">
                                        <span>{{ $item->created_at->format('d M Y') }}</span>
                                        <a href="{{ route('blog.show', $item) }}" class="font-semibold text-[#1A5319] hover:text-[#508D4E]">Selengkapnya</a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                        @foreach($rest as $item)
                            <article class="carousel-item group overflow-hidden rounded-3xl border border-white/70 bg-white shadow-2xl shadow-[#80AF81]/35 transition duration-300 hover:-translate-y-1">
                                <div class="relative h-52 overflow-hidden">
                                    @if($item->gambar)
                                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-110">
                                    @else
                                        <div class="h-full w-full bg-gradient-to-br from-[#80AF81] to-[#508D4E]"></div>
                                    @endif
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                                </div>
                                <div class="p-6">
                                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#508D4E]">Terbaru</p>
                                    <h3 class="mt-2 text-xl font-bold text-[#1A5319] line-clamp-2">
                                        {{ $item->judul }}
                                    </h3>
                                    <p class="mt-3 text-sm text-slate-600 line-clamp-3">
                                        {{ Str::limit(strip_tags($item->konten), 140) }}
                                    </p>
                                    <div class="mt-5 flex items-center justify-between text-sm text-slate-500">
                                        <span>{{ $item->created_at->format('d M Y') }}</span>
                                        <a href="{{ route('blog.show', $item) }}" class="font-semibold text-[#1A5319] hover:text-[#508D4E]">Selengkapnya</a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="rounded-3xl border border-white/70 bg-white p-6 shadow-2xl shadow-[#80AF81]/35">
                            <h3 class="text-lg font-bold text-[#1A5319] font-['Playfair_Display']">Info Terbaru</h3>
                            <div class="mt-4 space-y-3">
                                @foreach($trending as $item)
                                    <a href="{{ route('blog.show', $item) }}" class="block text-sm font-semibold text-slate-700 hover:text-[#508D4E]">
                                        {{ $item->judul }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="rounded-3xl border border-[#80AF81]/40 bg-gradient-to-br from-[#D6EFD8] to-white p-6 shadow-2xl shadow-[#80AF81]/40">
                            <h3 class="text-lg font-bold text-[#1A5319] font-['Playfair_Display']">Layanan Pesantren</h3>
                            <ul class="mt-4 space-y-3 text-sm text-emerald-800">
                                <li class="flex items-center justify-between"><span class="text-[#1A5319]">Pendaftaran Santri</span><span class="text-xs font-semibold text-[#508D4E]">Online</span></li>
                                <li class="flex items-center justify-between"><span class="text-[#1A5319]">Informasi Program</span><span class="text-xs font-semibold text-[#508D4E]">Terbaru</span></li>
                                <li class="flex items-center justify-between"><span class="text-[#1A5319]">Agenda Kegiatan</span><span class="text-xs font-semibold text-[#508D4E]">Mingguan</span></li>
                                <li class="flex items-center justify-between"><span class="text-[#1A5319]">Portal Wali</span><span class="text-xs font-semibold text-[#508D4E]">Aman</span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="mt-12">
                    {{ $informasi->links() }}
                </div>
            @else
                <div class="py-16 text-center">
                    <div class="mb-4 inline-block rounded-full bg-emerald-100 p-6">
                        <svg class="w-16 h-16 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Informasi</h3>
                    <p class="text-gray-600">Informasi dan berita akan segera ditampilkan di sini.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    @guest
        <section class="relative overflow-hidden bg-gradient-to-r from-emerald-700 via-emerald-600 to-teal-700 py-16">
            <div class="absolute inset-0 opacity-20">
                <div class="absolute left-0 top-0 h-48 w-48 rounded-full bg-white blur-3xl"></div>
                <div class="absolute right-0 bottom-0 h-64 w-64 rounded-full bg-lime-200 blur-3xl"></div>
            </div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Siap Mendaftar?
                </h2>
                <p class="text-xl text-emerald-100 mb-8 max-w-2xl mx-auto">
                    Bergabunglah dengan kami dan mulai perjalanan pendidikan Islam yang berkualitas
                </p>
                <a href="{{ route('register') }}" class="inline-flex items-center gap-2 rounded-full bg-white px-8 py-4 text-lg font-semibold text-emerald-800 shadow-lg shadow-emerald-950/10 transition duration-200 hover:-translate-y-0.5 hover:bg-emerald-50">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                    Daftar Sekarang
                </a>
            </div>
        </section>
    @endguest

    <!-- Footer -->
    <footer class="bg-[#1A5319] text-white py-12 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <div class="bg-[#508D4E] p-2 rounded-lg shadow-lg shadow-[#80AF81]/30">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <span class="text-xl font-bold">{{ config('app.name', 'Pesantren') }}</span>
                    </div>
                    <p class="text-[#D6EFD8]/80">
                        Lembaga pendidikan Islam yang berkomitmen mencetak generasi Qur'ani berakhlak mulia.
                    </p>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Tautan Cepat</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ url('/') }}" class="text-[#D6EFD8]/80 hover:text-white transition">Beranda</a></li>
                        @auth
                            <li><a href="{{ url('/dashboard') }}" class="text-[#D6EFD8]/80 hover:text-white transition">Dashboard</a></li>
                        @else
                            <li><a href="{{ route('login') }}" class="text-[#D6EFD8]/80 hover:text-white transition">Login</a></li>
                            <li><a href="{{ route('register') }}" class="text-[#D6EFD8]/80 hover:text-white transition">Pendaftaran</a></li>
                        @endauth
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Kontak</h3>
                    <ul class="space-y-2 text-[#D6EFD8]/80">
                        <li class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            info@pesantren.com
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            +62 xxx-xxxx-xxxx
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-white/10 mt-8 pt-8 text-center text-[#D6EFD8]/70">
                <p>&copy; {{ date('Y') }} {{ config('app.name', 'Pesantren') }}. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }
    </script>
</body>
</html>
