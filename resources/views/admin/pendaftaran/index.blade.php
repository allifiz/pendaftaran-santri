<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-emerald-800 leading-tight">
                {{ __('Data Pendaftaran Santri') }}
            </h2>
            <a href="{{ route('pendaftaran.manual.create') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white font-medium py-2 px-4 rounded-lg transition duration-200 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                </svg>
                Pendaftaran Manual
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

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                <div class="rounded-3xl border border-blue-100 bg-gradient-to-br from-blue-50 to-white p-4 shadow-lg shadow-blue-100/50">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-blue-600 font-medium">Total</p>
                            <p class="text-2xl font-bold text-blue-900">{{ $pendaftaran->total() }}</p>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-full">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="rounded-3xl border border-yellow-100 bg-gradient-to-br from-yellow-50 to-white p-4 shadow-lg shadow-yellow-100/50">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-yellow-600 font-medium">Pending</p>
                            <p class="text-2xl font-bold text-yellow-900">{{ $pendaftaran->where('status', 'pending')->count() }}</p>
                        </div>
                        <div class="bg-yellow-100 p-3 rounded-full">
                            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="rounded-3xl border border-emerald-100 bg-gradient-to-br from-emerald-50 to-white p-4 shadow-lg shadow-emerald-100/50">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-emerald-600 font-medium">Diterima</p>
                            <p class="text-2xl font-bold text-emerald-900">{{ $pendaftaran->where('status', 'diterima')->count() }}</p>
                        </div>
                        <div class="bg-emerald-100 p-3 rounded-full">
                            <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="rounded-3xl border border-red-100 bg-gradient-to-br from-red-50 to-white p-4 shadow-lg shadow-red-100/50">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-red-600 font-medium">Ditolak</p>
                            <p class="text-2xl font-bold text-red-900">{{ $pendaftaran->where('status', 'ditolak')->count() }}</p>
                        </div>
                        <div class="bg-red-100 p-3 rounded-full">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="surface-panel overflow-hidden">
                <div class="p-6">
                    @if($pendaftaran->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-emerald-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-emerald-700 uppercase tracking-wider">No</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-emerald-700 uppercase tracking-wider">Nama Santri</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-emerald-700 uppercase tracking-wider">Wali</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-emerald-700 uppercase tracking-wider">Telepon</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-emerald-700 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-emerald-700 uppercase tracking-wider">Tanggal</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-emerald-700 uppercase tracking-wider">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($pendaftaran as $index => $item)
                                        <tr class="hover:bg-gray-50 transition duration-150">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ ($pendaftaran->currentPage() - 1) * $pendaftaran->perPage() + $index + 1 }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-medium text-gray-900">{{ $item->nama_calon_santri }}</div>
                                                <div class="text-xs text-gray-500">{{ $item->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $item->nama_wali }}</div>
                                                @if($item->is_manual_entry)
                                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-purple-100 text-purple-800">
                                                        Manual
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->no_telepon }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if($item->status == 'pending')
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                        Pending
                                                    </span>
                                                @elseif($item->status == 'diterima')
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">
                                                        Diterima
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                        Ditolak
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->created_at->format('d/m/Y') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <button onclick="viewDetail({{ $item->id }})" class="text-emerald-600 hover:text-emerald-900 mr-3">Detail</button>
                                                @if($item->status == 'pending')
                                                    <button onclick="updateStatus({{ $item->id }})" class="text-blue-600 hover:text-blue-900">Update Status</button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="mt-6">
                            {{ $pendaftaran->links() }}
                        </div>
                    @else
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada data pendaftaran</h3>
                            <p class="mt-1 text-sm text-gray-500">Mulai dengan menambahkan pendaftaran manual.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Update Status -->
    <div id="statusModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto w-full max-w-md rounded-[1.75rem] border border-white/70 bg-white p-8 shadow-2xl shadow-slate-900/10">
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
        function viewDetail(id) {
            window.location.href = `/pendaftaran/${id}`;
        }

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
