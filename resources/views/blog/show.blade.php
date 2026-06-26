<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $informasi->judul }} - {{ config('app.name', 'Pesantren Kita') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=manrope:400,500,600,700,800&playfair-display:500,600,700&display=swap" rel="stylesheet" />

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

    <!-- Article Content -->
    <div class="py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-3 text-sm text-[#1A5319]/60">
                <a href="{{ url('/') }}" class="font-semibold text-[#1A5319] hover:text-[#508D4E]">Beranda</a>
                <span>/</span>
                <span>Informasi</span>
            </div>

            <div class="mt-6 grid gap-10 lg:grid-cols-[1.4fr_0.6fr]">
                <div>
                    <article class="overflow-hidden rounded-[2rem] border border-[#80AF81]/30 bg-white shadow-2xl shadow-[#80AF81]/30">
                        <div class="relative h-80 overflow-hidden">
                            @if($informasi->gambar)
                                <img src="{{ asset('storage/' . $informasi->gambar) }}" alt="{{ $informasi->judul }}" class="h-full w-full object-cover">
                            @else
                                <div class="h-full w-full bg-gradient-to-br from-[#508D4E] to-[#1A5319]"></div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-slate-900/10 to-transparent"></div>
                        </div>

                        <div class="p-8">
                            <div class="flex flex-wrap items-center gap-4 text-sm text-[#1A5319]/60">
                                <span class="inline-flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    {{ $informasi->created_at->format('d F Y') }}
                                </span>
                                <span class="inline-flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                    </svg>
                                    {{ $informasi->comments->count() }} Komentar
                                </span>
                                <span class="inline-flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Estimasi baca 5 menit
                                </span>
                            </div>

                            <h1 class="mt-6 text-3xl font-bold text-[#1A5319] md:text-4xl font-['Playfair_Display']">{{ $informasi->judul }}</h1>
                            <div class="prose max-w-none text-[#1A5319]/80 leading-relaxed mt-6">
                                {!! nl2br(e($informasi->konten)) !!}
                            </div>

                            <div class="mt-8 flex flex-wrap items-center gap-3 border-t border-[#80AF81]/20 pt-5">
                                <span class="text-sm font-semibold text-[#1A5319]/60">Bagikan:</span>
                                <button class="rounded-full border border-[#80AF81]/40 px-4 py-2 text-sm font-semibold text-[#1A5319]/80 hover:bg-[#D6EFD8] hover:text-[#1A5319]">WhatsApp</button>
                                <button class="rounded-full border border-[#80AF81]/40 px-4 py-2 text-sm font-semibold text-[#1A5319]/80 hover:bg-[#D6EFD8] hover:text-[#1A5319]">Facebook</button>
                                <button class="rounded-full border border-[#80AF81]/40 px-4 py-2 text-sm font-semibold text-[#1A5319]/80 hover:bg-[#D6EFD8] hover:text-[#1A5319]">Salin Link</button>
                            </div>
                        </div>
                    </article>

                    <div class="mt-10 overflow-hidden rounded-[1.75rem] border border-[#80AF81]/30 bg-white shadow-lg shadow-[#80AF81]/30">
                        <div class="p-8">
                            <h3 class="mb-6 flex items-center gap-2 text-2xl font-bold text-[#1A5319] font-['Playfair_Display']">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                </svg>
                                Komentar ({{ $informasi->comments->count() }})
                            </h3>

                            @if(session('success'))
                                <div class="mb-6 rounded-xl border-l-4 border-[#508D4E] bg-[#D6EFD8]/60 p-4">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <svg class="h-5 w-5 text-[#508D4E]" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm text-[#1A5319]">{{ session('success') }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @auth
                                <form action="{{ route('blog.comment.store', $informasi) }}" method="POST" class="mb-8">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="komentar" class="block text-sm font-semibold text-[#1A5319] mb-2">Tulis Komentar</label>
                                        <textarea
                                            name="komentar"
                                            id="komentar"
                                            rows="4"
                                            required
                                            class="w-full rounded-xl border border-[#80AF81]/40 bg-white px-4 py-3 text-slate-900 shadow-sm focus:border-[#508D4E] focus:ring-[#508D4E] @error('komentar') border-red-500 @enderror"
                                            placeholder="Tulis komentar Anda di sini...">{{ old('komentar') }}</textarea>
                                        @error('komentar')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <button type="submit" class="inline-flex items-center gap-2 rounded-xl bg-[#1A5319] px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-[#508D4E]/30 transition hover:-translate-y-0.5 hover:bg-[#508D4E]">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                        </svg>
                                        Kirim Komentar
                                    </button>
                                </form>
                            @else
                                <div class="mb-8 rounded-xl border-l-4 border-[#80AF81] bg-[#D6EFD8]/50 p-4">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <svg class="h-5 w-5 text-[#508D4E]" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm text-[#1A5319]">
                                                Ingin berkomentar? Silakan
                                                <a href="{{ route('login') }}" class="font-semibold underline hover:no-underline">login</a>
                                                atau
                                                <a href="{{ route('register') }}" class="font-semibold underline hover:no-underline">daftar</a>
                                                terlebih dahulu.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endauth

                            @if($informasi->comments->count() > 0)
                                <div class="space-y-6">
                                    @foreach($informasi->comments as $comment)
                                        <div class="border-b border-[#80AF81]/20 pb-6 last:border-0">
                                            <div class="flex items-start gap-4">
                                                <div class="flex-shrink-0">
                                                    <div class="h-12 w-12 rounded-full bg-[#D6EFD8] flex items-center justify-center">
                                                        <span class="text-[#1A5319] font-semibold text-lg">
                                                            {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="flex-1">
                                                    <div class="flex items-center justify-between mb-2">
                                                        <h4 class="font-semibold text-[#1A5319]">{{ $comment->user->name }}</h4>
                                                        <span class="text-sm text-[#1A5319]/60">{{ $comment->created_at->diffForHumans() }}</span>
                                                    </div>
                                                    <p class="text-[#1A5319]/80 leading-relaxed">{{ $comment->komentar }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-8 text-[#1A5319]/60">
                                    <svg class="mx-auto h-12 w-12 text-[#80AF81]/50 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                    </svg>
                                    <p>Belum ada komentar. Jadilah yang pertama berkomentar!</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <aside class="space-y-6">
                    <div class="rounded-3xl border border-[#80AF81]/30 bg-white p-6 shadow-lg shadow-[#80AF81]/30">
                        <h3 class="text-lg font-bold text-[#1A5319] font-['Playfair_Display']">Terbaru</h3>
                        <div class="mt-4 space-y-4">
                            @forelse($latest as $item)
                                <a href="{{ route('blog.show', $item) }}" class="flex items-start gap-3">
                                    <div class="h-14 w-14 overflow-hidden rounded-2xl bg-[#D6EFD8]">
                                        @if($item->gambar)
                                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="h-full w-full object-cover">
                                        @endif
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-[#1A5319] line-clamp-2">{{ $item->judul }}</p>
                                        <p class="mt-1 text-xs text-[#1A5319]/60">{{ $item->created_at->format('d M Y') }}</p>
                                    </div>
                                </a>
                            @empty
                                <p class="text-sm text-[#1A5319]/60">Belum ada artikel lain.</p>
                            @endforelse
                        </div>
                    </div>

                    <div class="rounded-3xl border border-[#80AF81]/40 bg-[#D6EFD8]/40 p-6 shadow-lg shadow-[#80AF81]/30">
                        <h3 class="text-lg font-bold text-[#1A5319] font-['Playfair_Display']">Kategori</h3>
                        <div class="mt-4 flex flex-wrap gap-2">
                            <span class="rounded-full bg-white px-3 py-1 text-xs font-semibold text-[#1A5319]">Berita</span>
                            <span class="rounded-full bg-white px-3 py-1 text-xs font-semibold text-[#1A5319]">Info Ponpes</span>
                            <span class="rounded-full bg-white px-3 py-1 text-xs font-semibold text-[#1A5319]">Panduan Wali</span>
                            <span class="rounded-full bg-white px-3 py-1 text-xs font-semibold text-[#1A5319]">Kegiatan</span>
                        </div>
                    </div>

                    <div class="rounded-3xl border border-[#80AF81]/30 bg-white p-6 shadow-lg shadow-[#80AF81]/30">
                        <h3 class="text-lg font-bold text-[#1A5319] font-['Playfair_Display']">Newsletter</h3>
                        <p class="mt-2 text-sm text-[#1A5319]/70">Ringkasan berita pesantren langsung ke inbox Anda.</p>
                        <div class="mt-4 flex flex-col gap-3">
                            <input type="email" placeholder="Alamat email" class="w-full rounded-xl border border-[#80AF81]/40 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm focus:border-[#508D4E] focus:ring-[#508D4E]">
                            <button class="rounded-xl bg-[#1A5319] px-4 py-3 text-sm font-semibold text-white shadow-lg shadow-[#508D4E]/30 transition hover:-translate-y-0.5 hover:bg-[#508D4E]">Berlangganan</button>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>

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
