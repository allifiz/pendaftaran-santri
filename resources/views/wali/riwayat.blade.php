<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-emerald-800 leading-tight">
                {{ __('Riwayat Pendaftaran') }}
            </h2>
            <a href="{{ route('pendaftaran.create') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white font-medium py-2 px-4 rounded-lg transition duration-200 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Daftar Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-emerald-700">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @if($registrasi->count() > 0)
                        <div class="space-y-4">
                            @foreach($registrasi as $item)
                                <div class="border border-gray-200 rounded-lg p-6 hover:shadow-md transition duration-200">
                                    <div class="flex justify-between items-start mb-4">
                                        <div>
                                            <h3 class="text-lg font-semibold text-emerald-900">{{ $item->nama_calon_santri }}</h3>
                                            <p class="text-sm text-gray-600 mt-1">Wali: {{ $item->nama_wali }}</p>
                                        </div>
                                        
                                        <div>
                                            @if($item->status == 'pending')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    Menunggu Verifikasi
                                                </span>
                                            @elseif($item->status == 'diterima')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    Diterima
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    Ditolak
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                                        <div class="bg-gray-50 p-3 rounded">
                                            <label class="text-xs font-medium text-gray-500 uppercase">Jenis Kelamin</label>
                                            <p class="mt-1 text-sm font-semibold text-gray-900">{{ $item->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                                        </div>
                                        
                                        <div class="bg-gray-50 p-3 rounded">
                                            <label class="text-xs font-medium text-gray-500 uppercase">Tempat, Tanggal Lahir</label>
                                            <p class="mt-1 text-sm font-semibold text-gray-900">{{ $item->tempat_lahir }}, {{ $item->tanggal_lahir->format('d/m/Y') }}</p>
                                        </div>
                                        
                                        <div class="bg-gray-50 p-3 rounded">
                                            <label class="text-xs font-medium text-gray-500 uppercase">Tanggal Daftar</label>
                                            <p class="mt-1 text-sm font-semibold text-gray-900">{{ $item->created_at->format('d/m/Y H:i') }}</p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex gap-2">
                                        <button onclick="viewDetail({{ $item->id }})" 
                                            class="flex-1 bg-emerald-50 hover:bg-emerald-100 text-emerald-700 font-medium py-2 px-4 rounded transition duration-200 flex items-center justify-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            Lihat Detail
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="mt-6">
                            {{ $registrasi->links() }}
                        </div>
                    @else
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada riwayat pendaftaran</h3>
                            <p class="mt-1 text-sm text-gray-500">Mulai dengan mendaftarkan santri baru.</p>
                            <div class="mt-6">
                                <a href="{{ route('pendaftaran.create') }}" 
                                    class="inline-flex items-center px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-medium rounded-lg transition duration-200">
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
        </div>
    </div>

    <script>
        function viewDetail(id) {
            window.location.href = `/riwayat/${id}`;
        }
    </script>
</x-app-layout>
