<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'deskripsi',
        'image',
        'thread_id',
        'user_id',
    ];

    // Relasi ke thread
    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }

    // Relasi ke user (pemberi komentar)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
