<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-emerald-800 leading-tight">
                {{ __('Detail Pendaftaran') }}
            </h2>
            <a href="{{ route('riwayat.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded-lg transition duration-200 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8">
                    <!-- Status Badge -->
                    <div class="mb-6">
                        @if($registrasi->status == 'pending')
                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Menunggu Verifikasi
                            </span>
                        @elseif($registrasi->status == 'diterima')
                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-emerald-100 text-emerald-800">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Diterima
                            </span>
                        @else
                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Ditolak
                            </span>
                        @endif
                    </div>

                    <!-- Data Calon Santri -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-emerald-900 mb-4 pb-2 border-b-2 border-emerald-200 flex items-center gap-2">
                            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Data Calon Santri
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <label class="text-xs font-medium text-gray-500 uppercase">Nama Lengkap</label>
                                <p class="mt-1 text-sm font-semibold text-gray-900">{{ $registrasi->nama_calon_santri }}</p>
                            </div>
                            
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <label class="text-xs font-medium text-gray-500 uppercase">Jenis Kelamin</label>
                                <p class="mt-1 text-sm font-semibold text-gray-900">{{ $registrasi->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                            </div>
                            
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <label class="text-xs font-medium text-gray-500 uppercase">Tempat Lahir</label>
                                <p class="mt-1 text-sm font-semibold text-gray-900">{{ $registrasi->tempat_lahir }}</p>
                            </div>
                            
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <label class="text-xs font-medium text-gray-500 uppercase">Tanggal Lahir</label>
                                <p class="mt-1 text-sm font-semibold text-gray-900">{{ $registrasi->tanggal_lahir->format('d F Y') }}</p>
                            </div>
                            
                            <div class="md:col-span-2 bg-gray-50 p-4 rounded-lg">
                                <label class="text-xs font-medium text-gray-500 uppercase">Alamat Lengkap</label>
                                <p class="mt-1 text-sm font-semibold text-gray-900">{{ $registrasi->alamat }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Data Wali Santri -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-emerald-900 mb-4 pb-2 border-b-2 border-emerald-200 flex items-center gap-2">
                            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            Data Wali Santri
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <label class="text-xs font-medium text-gray-500 uppercase">Nama Wali</label>
                                <p class="mt-1 text-sm font-semibold text-gray-900">{{ $registrasi->nama_wali }}</p>
                            </div>
                            
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <label class="text-xs font-medium text-gray-500 uppercase">No. Telepon</label>
                                <p class="mt-1 text-sm font-semibold text-gray-900">{{ $registrasi->no_telepon }}</p>
                            </div>
                            
                            <div class="md:col-span-2 bg-gray-50 p-4 rounded-lg">
                                <label class="text-xs font-medium text-gray-500 uppercase">Email</label>
                                <p class="mt-1 text-sm font-semibold text-gray-900">{{ $registrasi->email_wali }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Bukti Pembayaran -->
                    @if($registrasi->bukti_pembayaran)
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-emerald-900 mb-4 pb-2 border-b-2 border-emerald-200 flex items-center gap-2">
                                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Bukti Pembayaran
                            </h3>
                            
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <a href="{{ asset('storage/' . $registrasi->bukti_pembayaran) }}" target="_blank" 
                                    class="inline-flex items-center text-emerald-600 hover:text-emerald-700 font-medium">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    Lihat Bukti Pembayaran
                                </a>
                            </div>
                        </div>
                    @endif

                    <!-- Catatan Penolakan -->
                    @if($registrasi->catatan_penolakan)
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-emerald-900 mb-4 pb-2 border-b-2 border-emerald-200 flex items-center gap-2">
                                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Catatan dari Admin
                            </h3>
                            
                            <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded">
                                <p class="text-sm text-red-800">{{ $registrasi->catatan_penolakan }}</p>
                            </div>
                        </div>
                    @endif

                    <!-- Informasi Tambahan -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-emerald-900 mb-4 pb-2 border-b-2 border-emerald-200 flex items-center gap-2">
                            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Informasi Pendaftaran
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <label class="text-xs font-medium text-gray-500 uppercase">Tanggal Pendaftaran</label>
                                <p class="mt-1 text-sm font-semibold text-gray-900">{{ $registrasi->created_at->format('d F Y H:i') }}</p>
                            </div>
                            
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <label class="text-xs font-medium text-gray-500 uppercase">Terakhir Diupdate</label>
                                <p class="mt-1 text-sm font-semibold text-gray-900">{{ $registrasi->updated_at->format('d F Y H:i') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Next Steps Info -->
                    @if($registrasi->status == 'pending')
                        <div class="mt-8 bg-blue-50 border-l-4 border-blue-500 p-4 rounded">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-blue-800">Pendaftaran Sedang Diproses</h3>
                                    <p class="mt-2 text-sm text-blue-700">
                                        Data pendaftaran Anda sedang menunggu verifikasi dari admin. 
                                        Kami akan segera menghubungi Anda melalui email atau telepon jika ada informasi lebih lanjut.
                                    </p>
                                </div>
                            </div>
                        </div>
                    @elseif($registrasi->status == 'diterima')
                        <div class="mt-8 bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-emerald-800">Selamat! Pendaftaran Diterima</h3>
                                    <p class="mt-2 text-sm text-emerald-700">
                                        Pendaftaran santri telah diterima. Silakan hubungi admin untuk informasi selanjutnya mengenai proses registrasi ulang.
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
