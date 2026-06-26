<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'pesantren_info_id',
        'user_id',
        'komentar',
    ];

    public function pesantrenInfo()
    {
        return $this->belongsTo(PesantrenInfo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
