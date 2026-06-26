<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WaliController;
use App\Models\PesantrenInfo;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $informasi = PesantrenInfo::latest()->paginate(9);
    return view('welcome', compact('informasi'));
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Blog Routes (Public)
Route::get('/informasi/{informasi}', [BlogController::class, 'show'])->name('blog.show');
Route::post('/informasi/{informasi}/komentar', [BlogController::class, 'storeComment'])
    ->middleware('auth')
    ->name('blog.comment.store');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes untuk Wali Santri
Route::middleware(['auth', 'role:wali'])->group(function () {
    Route::get('/pendaftaran/create', [PendaftaranController::class, 'create'])
        ->name('pendaftaran.create');
    Route::post('/pendaftaran', [PendaftaranController::class, 'store'])
        ->name('pendaftaran.store');
    Route::get('/riwayat', [WaliController::class, 'riwayat'])
        ->name('riwayat.index');
    Route::get('/riwayat/{registrasi}', [WaliController::class, 'show'])
        ->name('riwayat.show');
});

// Routes untuk Admin dan Staff
Route::middleware(['auth', 'role:admin,staff'])->group(function () {
    // Informasi Pesantren - using explicit routes instead of resource to avoid conflict
    Route::get('/admin/informasi', [InformasiController::class, 'index'])->name('informasi.index');
    Route::get('/admin/informasi/create', [InformasiController::class, 'create'])->name('informasi.create');
    Route::post('/admin/informasi', [InformasiController::class, 'store'])->name('informasi.store');
    Route::get('/admin/informasi/{informasi}', [InformasiController::class, 'show'])->name('informasi.show');
    Route::get('/admin/informasi/{informasi}/edit', [InformasiController::class, 'edit'])->name('informasi.edit');
    Route::put('/admin/informasi/{informasi}', [InformasiController::class, 'update'])->name('informasi.update');
    Route::delete('/admin/informasi/{informasi}', [InformasiController::class, 'destroy'])->name('informasi.destroy');
    
    // Pendaftaran
    Route::get('/pendaftaran', [PendaftaranController::class, 'index'])
        ->name('pendaftaran.index');
    Route::get('/pendaftaran/manual-create', [PendaftaranController::class, 'createManual'])
        ->name('pendaftaran.manual.create');
    Route::post('/pendaftaran/manual-create', [PendaftaranController::class, 'storeManual'])
        ->name('pendaftaran.manual.store');
    Route::get('/pendaftaran/{pendaftaran}', [PendaftaranController::class, 'show'])
        ->name('pendaftaran.show');
    Route::post('/pendaftaran/{pendaftaran}/status', [PendaftaranController::class, 'updateStatus'])
        ->name('pendaftaran.updateStatus');
});

require __DIR__.'/auth.php';