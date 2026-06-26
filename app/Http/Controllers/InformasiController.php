<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PesantrenInfo;
use Illuminate\Support\Facades\Storage;

class InformasiController extends Controller
{
    public function index()
    {
        $informasi = PesantrenInfo::latest()->paginate(10);
        return view('admin.informasi.index', compact('informasi'));
    }

    public function create()
    {
        return view('admin.informasi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('informasi', 'public');
        }

        PesantrenInfo::create($validated);

        return redirect()->route('informasi.index')
            ->with('success', 'Informasi berhasil ditambahkan.');
    }

    public function show(PesantrenInfo $informasi)
    {
        return view('admin.informasi.show', compact('informasi'));
    }

    public function edit(PesantrenInfo $informasi)
    {
        return view('admin.informasi.edit', compact('informasi'));
    }

    public function update(Request $request, PesantrenInfo $informasi)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($informasi->gambar) {
                Storage::disk('public')->delete($informasi->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('informasi', 'public');
        }

        $informasi->update($validated);

        return redirect()->route('informasi.index')
            ->with('success', 'Informasi berhasil diupdate.');
    }

    public function destroy(PesantrenInfo $informasi)
    {
        if ($informasi->gambar) {
            Storage::disk('public')->delete($informasi->gambar);
        }

        $informasi->delete();

        return redirect()->route('informasi.index')
            ->with('success', 'Informasi berhasil dihapus.');
    }
}