<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrasiSantri extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_calon_santri',
        'nama_wali',
        'no_telepon',
        'email_wali',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'bukti_pembayaran',
        'status',
        'catatan_penolakan',
        'is_manual_entry',
        'created_by',
    ];

    protected $casts = [
        'is_manual_entry' => 'boolean',
        'tanggal_lahir' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}