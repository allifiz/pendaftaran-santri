<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PesantrenInfo;
use App\Models\Comment;

class BlogController extends Controller
{
    public function show(PesantrenInfo $informasi)
    {
        $informasi->load(['comments.user']);
        $latest = PesantrenInfo::whereKeyNot($informasi->id)
            ->latest()
            ->take(5)
            ->get();

        return view('blog.show', compact('informasi', 'latest'));
    }

    public function storeComment(Request $request, PesantrenInfo $informasi)
    {
        $request->validate([
            'komentar' => 'required|string|max:1000',
        ]);

        $informasi->comments()->create([
            'user_id' => auth()->id(),
            'komentar' => $request->komentar,
        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan.');
    }
}
