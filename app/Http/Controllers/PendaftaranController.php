<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistrasiSantri;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PendaftaranController extends Controller
{
    public function index()
    {
        $pendaftaran = RegistrasiSantri::with(['user', 'admin'])
            ->latest()
            ->paginate(15);
        
        return view('admin.pendaftaran.index', compact('pendaftaran'));
    }

    public function create()
    {
        return view('wali.pendaftaran.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_calon_santri' => 'required|string|max:255',
            'nama_wali' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:15',
            'email_wali' => 'required|email|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string',
            'bukti_pembayaran' => 'nullable|image|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        if ($request->hasFile('bukti_pembayaran')) {
            $validated['bukti_pembayaran'] = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        }

        $validated['user_id'] = auth()->id();
        $validated['status'] = 'pending';

        RegistrasiSantri::create($validated);

        return redirect()->route('dashboard')
            ->with('success', 'Pendaftaran berhasil dikirim. Menunggu verifikasi.');
    }

    // Manual registration oleh admin
    public function createManual()
    {
        return view('admin.pendaftaran.manual-create');
    }

    public function storeManual(Request $request)
    {
        $validated = $request->validate([
            'nama_calon_santri' => 'required|string|max:255',
            'nama_wali' => 'required|string|max:255',
            'email_wali' => 'required|email|unique:users,email|max:255',
            'no_telepon' => 'required|string|max:15',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string',
        ]);

        // Buat akun user untuk wali santri
        $user = User::create([
            'name' => $validated['nama_wali'],
            'email' => $validated['email_wali'],
            'password' => Hash::make('password123'), // Password default
            'role' => 'wali',
        ]);

        $validated['user_id'] = $user->id;
        $validated['created_by'] = auth()->id();
        $validated['is_manual_entry'] = true;
        $validated['status'] = 'pending';

        RegistrasiSantri::create($validated);

        return redirect()->route('pendaftaran.index')
            ->with('success', 'Data santri berhasil didaftarkan secara manual. Password default: password123');
    }

    public function show(RegistrasiSantri $pendaftaran)
    {
        return view('admin.pendaftaran.show', compact('pendaftaran'));
    }

    public function updateStatus(Request $request, RegistrasiSantri $pendaftaran)
    {
        $validated = $request->validate([
            'status' => 'required|in:diterima,ditolak',
            'catatan_penolakan' => 'nullable|string|max:500',
        ]);

        if ($validated['status'] === 'ditolak' && empty($validated['catatan_penolakan'])) {
            return back()->withErrors(['catatan_penolakan' => 'Catatan penolakan wajib diisi jika status ditolak.']);
        }

        $pendaftaran->update([
            'status' => $validated['status'],
            'catatan_penolakan' => $validated['catatan_penolakan'] ?? null,
        ]);

        return redirect()->route('pendaftaran.index')
            ->with('success', 'Status pendaftaran berhasil diupdate.');
    }
}