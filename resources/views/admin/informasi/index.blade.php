<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-emerald-800 leading-tight">
                {{ __('Informasi Pesantren') }}
            </h2>
            <a href="{{ route('informasi.create') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white font-medium py-2 px-4 rounded-lg transition duration-200 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Informasi
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

            <div class="surface-panel overflow-hidden">
                <div class="p-6">
                    @if($informasi->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($informasi as $item)
                                <div class="overflow-hidden rounded-2xl border border-emerald-100 bg-gradient-to-br from-emerald-50 to-white shadow-lg shadow-emerald-100/40 transition duration-200 hover:-translate-y-0.5 hover:shadow-xl">
                                    @if($item->gambar)
                                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-48 object-cover">
                                    @else
                                        <div class="w-full h-48 bg-emerald-100 flex items-center justify-center">
                                            <svg class="w-16 h-16 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                    @endif
                                    <div class="p-5">
                                        <h3 class="text-lg font-semibold text-emerald-900 mb-2 line-clamp-2">{{ $item->judul }}</h3>
                                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ Str::limit(strip_tags($item->konten), 100) }}</p>
                                        <div class="flex gap-2">
                                            <a href="{{ route('informasi.show', $item) }}" class="flex-1 bg-emerald-50 hover:bg-emerald-100 text-emerald-700 font-medium py-2 px-3 rounded transition duration-200 text-sm text-center">
                                                Detail
                                            </a>
                                            <a href="{{ route('informasi.edit', $item) }}" class="flex-1 bg-blue-50 hover:bg-blue-100 text-blue-700 font-medium py-2 px-3 rounded transition duration-200 text-sm text-center">
                                                Edit
                                            </a>
                                            <form action="{{ route('informasi.destroy', $item) }}" method="POST" class="flex-1" onsubmit="return confirm('Yakin ingin menghapus?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="w-full bg-red-50 hover:bg-red-100 text-red-700 font-medium py-2 px-3 rounded transition duration-200 text-sm">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="mt-6">
                            {{ $informasi->links() }}
                        </div>
                    @else
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada informasi</h3>
                            <p class="mt-1 text-sm text-gray-500">Mulai dengan menambahkan informasi baru.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
