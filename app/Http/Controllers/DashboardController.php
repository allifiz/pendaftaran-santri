<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistrasiSantri;
use App\Models\PesantrenInfo;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->isAdmin() || $user->isStaff()) {
            $totalPendaftaran = RegistrasiSantri::count();
            $pendingCount = RegistrasiSantri::where('status', 'pending')->count();
            $diterimaCount = RegistrasiSantri::where('status', 'diterima')->count();
            $ditolakCount = RegistrasiSantri::where('status', 'ditolak')->count();

            return view('dashboard', compact(
                'totalPendaftaran',
                'pendingCount',
                'diterimaCount',
                'ditolakCount'
            ));
        }

        $registrasi = RegistrasiSantri::where('user_id', $user->id)->latest()->first();
        return view('dashboard', compact('registrasi'));
    }
}