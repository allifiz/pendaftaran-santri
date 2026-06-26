<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistrasiSantri;

class WaliController extends Controller
{
    public function riwayat()
    {
        $registrasi = RegistrasiSantri::where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('wali.riwayat', compact('registrasi'));
    }

    public function show(RegistrasiSantri $registrasi)
    {
        // Pastikan hanya pemilik yang bisa lihat
        if ($registrasi->user_id !== auth()->id()) {
            abort(403);
        }

        return view('wali.riwayat-show', compact('registrasi'));
    }
}