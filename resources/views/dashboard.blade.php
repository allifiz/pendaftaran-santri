<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-emerald-600">Ringkasan</p>
                <h2 class="text-2xl font-bold leading-tight text-slate-900">
                    {{ __('Dashboard') }}
                </h2>
            </div>
            <p class="max-w-2xl text-sm text-slate-600">
                Gambaran cepat aktivitas pendaftaran, status santri, dan akses ke fitur utama Pesantren Kita.
            </p>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="surface-panel mb-6 overflow-hidden bg-gradient-to-r from-emerald-700 via-emerald-600 to-teal-700 p-6 text-white shadow-2xl shadow-emerald-900/10">
                <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
                    <div class="max-w-2xl">
                        <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-4 py-2 text-sm font-semibold backdrop-blur">
                            <span class="h-2.5 w-2.5 rounded-full bg-lime-300"></span>
                            Pesantren Kita
                        </div>
                        <h3 class="text-2xl font-bold sm:text-3xl">
                            Selamat datang, {{ auth()->user()->name }}.
                        </h3>
                        <p class="mt-3 text-emerald-100">
                            Kelola pendaftaran dan informasi dengan tampilan yang lebih nyaman, rapi, dan mudah dipindai.
                        </p>
                    </div>
                    <div class="grid gap-3 sm:grid-cols-3 lg:w-[28rem]">
                        <div class="rounded-2xl bg-white/10 p-4 backdrop-blur">
                            <div class="text-sm text-emerald-100">Status</div>
                            <div class="mt-1 text-xl font-bold">Terpantau</div>
                        </div>
                        <div class="rounded-2xl bg-white/10 p-4 backdrop-blur">
                            <div class="text-sm text-emerald-100">Akses</div>
                            <div class="mt-1 text-xl font-bold">Cepat</div>
                        </div>
                        <div class="rounded-2xl bg-white/10 p-4 backdrop-blur">
                            <div class="text-sm text-emerald-100">Desain</div>
                            <div class="mt-1 text-xl font-bold">Baru</div>
                        </div>
                    </div>
                </div>
            </div>

            @if(auth()->user()->isAdmin() || auth()->user()->isStaff())
                <!-- Admin/Staff Dashboard -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                    <div class="rounded-3xl border border-blue-100 bg-gradient-to-br from-blue-50 to-white p-6 shadow-lg shadow-blue-100/50 transition duration-200 hover:-translate-y-1 hover:shadow-xl">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-blue-600 font-medium">Total Pendaftaran</p>
                                <p class="text-3xl font-bold text-blue-900 mt-2">{{ $totalPendaftaran }}</p>
                            </div>
                            <div class="bg-blue-100 p-3 rounded-full">
                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-3xl border border-yellow-100 bg-gradient-to-br from-yellow-50 to-white p-6 shadow-lg shadow-yellow-100/50 transition duration-200 hover:-translate-y-1 hover:shadow-xl">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-yellow-600 font-medium">Pending</p>
                                <p class="text-3xl font-bold text-yellow-900 mt-2">{{ $pendingCount }}</p>
                            </div>
                            <div class="bg-yellow-100 p-3 rounded-full">
                                <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-3xl border border-emerald-100 bg-gradient-to-br from-emerald-50 to-white p-6 shadow-lg shadow-emerald-100/50 transition duration-200 hover:-translate-y-1 hover:shadow-xl">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-emerald-600 font-medium">Diterima</p>
                                <p class="text-3xl font-bold text-emerald-900 mt-2">{{ $diterimaCount }}</p>
                            </div>
                            <div class="bg-emerald-100 p-3 rounded-full">
                                <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-3xl border border-red-100 bg-gradient-to-br from-red-50 to-white p-6 shadow-lg shadow-red-100/50 transition duration-200 hover:-translate-y-1 hover:shadow-xl">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-red-600 font-medium">Ditolak</p>
                                <p class="text-3xl font-bold text-red-900 mt-2">{{ $ditolakCount }}</p>
                            </div>
                            <div class="bg-red-100 p-3 rounded-full">
                                <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="surface-panel mb-6 overflow-hidden">
                    <div class="p-6">
                        <h3 class="mb-4 text-lg font-semibold text-slate-900">Aksi Cepat</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <a href="{{ route('pendaftaran.index') }}" class="flex items-center rounded-2xl border border-emerald-100 bg-emerald-50 p-4 transition duration-200 hover:-translate-y-0.5 hover:bg-emerald-100">
                                <div class="mr-4 rounded-2xl bg-emerald-600 p-3">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-emerald-900">Lihat Pendaftaran</p>
                                    <p class="text-sm text-emerald-700">Kelola data pendaftaran santri</p>
                                </div>
                            </a>

                            <a href="{{ route('informasi.index') }}" class="flex items-center rounded-2xl border border-blue-100 bg-blue-50 p-4 transition duration-200 hover:-translate-y-0.5 hover:bg-blue-100">
                                <div class="mr-4 rounded-2xl bg-blue-600 p-3">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-blue-900">Kelola Informasi</p>
                                    <p class="text-sm text-blue-700">Tambah dan edit informasi pesantren</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <!-- Wali Santri Dashboard -->
                <div class="surface-panel mb-6 overflow-hidden">
                    <div class="p-6">
                        <h3 class="mb-4 text-lg font-semibold text-slate-900">Selamat Datang, {{ auth()->user()->name }}</h3>
                        
                        @if(isset($registrasi) && $registrasi)
                            <div class="rounded-3xl border border-emerald-100 bg-gradient-to-br from-emerald-50 to-white p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <div>
                                        <h4 class="text-lg font-semibold text-emerald-900">Status Pendaftaran Terbaru</h4>
                                        <p class="text-sm text-gray-600 mt-1">{{ $registrasi->nama_calon_santri }}</p>
                                    </div>
                                    
                                    @if($registrasi->status == 'pending')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                            Menunggu Verifikasi
                                        </span>
                                    @elseif($registrasi->status == 'diterima')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">
                                            Diterima
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                            Ditolak
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <div class="rounded-2xl bg-white p-3 shadow-sm">
                                        <label class="text-xs font-medium text-gray-500 uppercase">Tanggal Daftar</label>
                                        <p class="mt-1 text-sm font-semibold text-gray-900">{{ $registrasi->created_at->format('d/m/Y H:i') }}</p>
                                    </div>
                                    
                                    <div class="rounded-2xl bg-white p-3 shadow-sm">
                                        <label class="text-xs font-medium text-gray-500 uppercase">Jenis Kelamin</label>
                                        <p class="mt-1 text-sm font-semibold text-gray-900">{{ $registrasi->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                                    </div>
                                </div>
                                
                                <div class="flex gap-2">
                                    <a href="{{ route('riwayat.show', $registrasi) }}" class="flex-1 rounded-xl bg-emerald-600 px-4 py-3 text-center font-medium text-white transition duration-200 hover:bg-emerald-700">
                                        Lihat Detail
                                    </a>
                                    <a href="{{ route('riwayat.index') }}" class="flex-1 rounded-xl bg-slate-200 px-4 py-3 text-center font-medium text-slate-700 transition duration-200 hover:bg-slate-300">
                                        Riwayat Lengkap
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="py-8 text-center">
                                <svg class="mx-auto h-12 w-12 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-gray-900">Belum Ada Pendaftaran</h3>
                                <p class="mt-1 text-sm text-gray-500">Mulai dengan mendaftarkan santri baru.</p>
                                <div class="mt-6">
                                    <a href="{{ route('pendaftaran.create') }}" class="inline-flex items-center rounded-xl bg-emerald-600 px-4 py-2 font-medium text-white transition duration-200 hover:bg-emerald-700">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                        </svg>
                                        Daftar Sekarang
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
