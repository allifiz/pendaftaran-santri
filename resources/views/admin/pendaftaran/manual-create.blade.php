<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-emerald-800 leading-tight">
                {{ __('Pendaftaran Manual Santri') }}
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
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8">
                    <div class="mb-6 bg-blue-50 border-l-4 border-blue-500 p-4 rounded">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-blue-700">
                                    Pendaftaran ini akan membuat akun otomatis untuk wali santri dengan password default: <strong>password123</strong>
                                </p>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('pendaftaran.manual.store') }}" method="POST">
                        @csrf
                        
                        <div class="space-y-6">
                            <!-- Data Calon Santri -->
                            <div>
                                <h3 class="text-lg font-semibold text-emerald-900 mb-4 flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Data Calon Santri
                                </h3>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                                        <input type="text" name="nama_calon_santri" value="{{ old('nama_calon_santri') }}" required 
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition duration-200 @error('nama_calon_santri') border-red-500 @enderror"
                                            placeholder="Masukkan nama lengkap">
                                        @error('nama_calon_santri')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Kelamin <span class="text-red-500">*</span></label>
                                        <select name="jenis_kelamin" required 
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition duration-200 @error('jenis_kelamin') border-red-500 @enderror">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                            <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                        @error('jenis_kelamin')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Tempat Lahir <span class="text-red-500">*</span></label>
                                        <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required 
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition duration-200 @error('tempat_lahir') border-red-500 @enderror"
                                            placeholder="Kota tempat lahir">
                                        @error('tempat_lahir')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Lahir <span class="text-red-500">*</span></label>
                                        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required 
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition duration-200 @error('tanggal_lahir') border-red-500 @enderror">
                                        @error('tanggal_lahir')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap <span class="text-red-500">*</span></label>
                                        <textarea name="alamat" rows="3" required 
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition duration-200 @error('alamat') border-red-500 @enderror"
                                            placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>
                                        @error('alamat')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <hr class="border-gray-200">

                            <!-- Data Wali Santri -->
                            <div>
                                <h3 class="text-lg font-semibold text-emerald-900 mb-4 flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    Data Wali Santri
                                </h3>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Wali <span class="text-red-500">*</span></label>
                                        <input type="text" name="nama_wali" value="{{ old('nama_wali') }}" required 
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition duration-200 @error('nama_wali') border-red-500 @enderror"
                                            placeholder="Nama wali santri">
                                        @error('nama_wali')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">No. Telepon <span class="text-red-500">*</span></label>
                                        <input type="text" name="no_telepon" value="{{ old('no_telepon') }}" required 
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition duration-200 @error('no_telepon') border-red-500 @enderror"
                                            placeholder="08xxxxxxxxxx">
                                        @error('no_telepon')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Email Wali <span class="text-red-500">*</span></label>
                                        <input type="email" name="email_wali" value="{{ old('email_wali') }}" required 
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition duration-200 @error('email_wali') border-red-500 @enderror"
                                            placeholder="email@example.com">
                                        <p class="mt-1 text-xs text-gray-500">Email ini akan digunakan sebagai username untuk login</p>
                                        @error('email_wali')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 flex gap-3 justify-end">
                            <a href="{{ route('pendaftaran.index') }}" 
                                class="px-6 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg transition duration-200">
                                Batal
                            </a>
                            <button type="submit" 
                                class="px-6 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg transition duration-200 flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Simpan Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
