<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-emerald-800 leading-tight">
                {{ __('Detail Pendaftaran') }}
            </h2>
            <a href="{{ route('pendaftaran.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded-lg transition duration-200 flex items-center gap-2">
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
                    <div class="mb-6 flex justify-between items-center">
                        <div>
                            @if($pendaftaran->status == 'pending')
                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Menunggu Verifikasi
                                </span>
                            @elseif($pendaftaran->status == 'diterima')
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
                        
                        @if($pendaftaran->is_manual_entry)
                            <span class="inline-flex items-center px-3 py-1 rounded text-xs font-medium bg-purple-100 text-purple-800">
                                Pendaftaran Manual
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
                                <p class="mt-1 text-sm font-semibold text-gray-900">{{ $pendaftaran->nama_calon_santri }}</p>
                            </div>
                            
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <label class="text-xs font-medium text-gray-500 uppercase">Jenis Kelamin</label>
                                <p class="mt-1 text-sm font-semibold text-gray-900">{{ $pendaftaran->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                            </div>
                            
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <label class="text-xs font-medium text-gray-500 uppercase">Tempat Lahir</label>
                                <p class="mt-1 text-sm font-semibold text-gray-900">{{ $pendaftaran->tempat_lahir }}</p>
                            </div>
                            
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <label class="text-xs font-medium text-gray-500 uppercase">Tanggal Lahir</label>
                                <p class="mt-1 text-sm font-semibold text-gray-900">{{ $pendaftaran->tanggal_lahir->format('d F Y') }}</p>
                            </div>
                            
                            <div class="md:col-span-2 bg-gray-50 p-4 rounded-lg">
                                <label class="text-xs font-medium text-gray-500 uppercase">Alamat Lengkap</label>
                                <p class="mt-1 text-sm font-semibold text-gray-900">{{ $pendaftaran->alamat }}</p>
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
                                <p class="mt-1 text-sm font-semibold text-gray-900">{{ $pendaftaran->nama_wali }}</p>
                            </div>
                            
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <label class="text-xs font-medium text-gray-500 uppercase">No. Telepon</label>
                                <p class="mt-1 text-sm font-semibold text-gray-900">{{ $pendaftaran->no_telepon }}</p>
                            </div>
                            
                            <div class="md:col-span-2 bg-gray-50 p-4 rounded-lg">
                                <label class="text-xs font-medium text-gray-500 uppercase">Email</label>
                                <p class="mt-1 text-sm font-semibold text-gray-900">{{ $pendaftaran->email_wali }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Bukti Pembayaran -->
                    @if($pendaftaran->bukti_pembayaran)
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-emerald-900 mb-4 pb-2 border-b-2 border-emerald-200 flex items-center gap-2">
                                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Bukti Pembayaran
                            </h3>
                            
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <a href="{{ asset('storage/' . $pendaftaran->bukti_pembayaran) }}" target="_blank" 
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
                    @if($pendaftaran->catatan_penolakan)
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-emerald-900 mb-4 pb-2 border-b-2 border-emerald-200 flex items-center gap-2">
                                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Catatan Penolakan
                            </h3>
                            
                            <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded">
                                <p class="text-sm text-red-800">{{ $pendaftaran->catatan_penolakan }}</p>
                            </div>
                        </div>
                    @endif

                    <!-- Informasi Tambahan -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-emerald-900 mb-4 pb-2 border-b-2 border-emerald-200 flex items-center gap-2">
                            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Informasi Tambahan
                        </h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <label class="text-xs font-medium text-gray-500 uppercase">Tanggal Pendaftaran</label>
                                <p class="mt-1 text-sm font-semibold text-gray-900">{{ $pendaftaran->created_at->format('d F Y H:i') }}</p>
                            </div>
                            
                            @if($pendaftaran->admin)
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <label class="text-xs font-medium text-gray-500 uppercase">Didaftarkan Oleh</label>
                                    <p class="mt-1 text-sm font-semibold text-gray-900">{{ $pendaftaran->admin->name }}</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    @if($pendaftaran->status == 'pending')
                        <div class="mt-8 pt-6 border-t border-gray-200">
                            <button onclick="updateStatus({{ $pendaftaran->id }})" 
                                class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-medium py-3 px-6 rounded-lg transition duration-200 flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Update Status Pendaftaran
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Update Status -->
    <div id="statusModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-8 border w-full max-w-md shadow-2xl rounded-lg bg-white">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-emerald-900">Update Status</h3>
                <button onclick="closeStatusModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <form id="statusForm" method="POST">
                @csrf
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select name="status" id="status" required onchange="toggleCatatan()"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition duration-200">
                            <option value="">Pilih Status</option>
                            <option value="diterima">Diterima</option>
                            <option value="ditolak">Ditolak</option>
                        </select>
                    </div>
                    
                    <div id="catatanContainer" class="hidden">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Catatan Penolakan</label>
                        <textarea name="catatan_penolakan" id="catatan_penolakan" rows="4" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition duration-200"
                            placeholder="Berikan alasan penolakan..."></textarea>
                    </div>
                </div>
                
                <div class="mt-6 flex gap-3 justify-end">
                    <button type="button" onclick="closeStatusModal()" 
                        class="px-6 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg transition duration-200">
                        Batal
                    </button>
                    <button type="submit" 
                        class="px-6 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg transition duration-200">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function updateStatus(id) {
            document.getElementById('statusModal').classList.remove('hidden');
            document.getElementById('statusForm').action = `/pendaftaran/${id}/status`;
            document.getElementById('status').value = '';
            document.getElementById('catatan_penolakan').value = '';
            toggleCatatan();
        }

        function closeStatusModal() {
            document.getElementById('statusModal').classList.add('hidden');
        }

        function toggleCatatan() {
            const status = document.getElementById('status').value;
            const catatanContainer = document.getElementById('catatanContainer');
            
            if (status === 'ditolak') {
                catatanContainer.classList.remove('hidden');
                document.getElementById('catatan_penolakan').required = true;
            } else {
                catatanContainer.classList.add('hidden');
                document.getElementById('catatan_penolakan').required = false;
            }
        }

        // Close modal when clicking outside
        document.getElementById('statusModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeStatusModal();
            }
        });
    </script>
</x-app-layout>
