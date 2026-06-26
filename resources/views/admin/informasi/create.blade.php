<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-emerald-600">Informasi</p>
                <h2 class="text-2xl font-bold text-slate-900">
                    Tambah Informasi Baru
                </h2>
            </div>
            <a href="{{ route('informasi.index') }}" class="rounded-full border border-emerald-100 bg-white px-4 py-2 text-sm font-semibold text-emerald-700 shadow-sm transition hover:bg-emerald-50">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="surface-panel p-6 sm:p-8">
                <form method="POST" action="{{ route('informasi.store') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div>
                        <label for="judul" class="block text-sm font-semibold text-slate-700">Judul Informasi</label>
                        <input id="judul" name="judul" type="text" value="{{ old('judul') }}" required
                            class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 shadow-sm focus:border-emerald-500 focus:ring-emerald-500"
                            placeholder="Masukkan judul informasi">
                        @error('judul')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="konten" class="block text-sm font-semibold text-slate-700">Konten</label>
                        <textarea id="konten" name="konten" rows="8" required
                            class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 shadow-sm focus:border-emerald-500 focus:ring-emerald-500"
                            placeholder="Tulis konten informasi...">{{ old('konten') }}</textarea>
                        @error('konten')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="gambar" class="block text-sm font-semibold text-slate-700">Gambar (opsional)</label>
                        <input id="gambar" name="gambar" type="file" accept="image/*"
                            class="mt-2 w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                        <p class="mt-2 text-sm text-slate-500">Format: JPEG, PNG, JPG, GIF. Maksimal 2MB.</p>
                        @error('gambar')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap items-center justify-end gap-3">
                        <a href="{{ route('informasi.index') }}" class="rounded-xl border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-600 shadow-sm transition hover:bg-slate-50">
                            Batal
                        </a>
                        <button type="submit" class="rounded-xl bg-emerald-600 px-6 py-2.5 text-sm font-semibold text-white shadow-lg shadow-emerald-500/20 transition hover:-translate-y-0.5 hover:bg-emerald-700">
                            Simpan Informasi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
