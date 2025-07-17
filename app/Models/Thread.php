<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'user_id',
        'image',
        'image_path',
        'program_studi',
        'category',
    ];

    // Relasi ke user (pembuat thread)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke semua balasan
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    // Scope untuk filter berdasarkan program studi (jika ada kolom 'program_studi')
    public function scopeByProdi($query, $prodi)
    {
        return $query->where('program_studi', $prodi);
    }

    // Thread.php
    public function programStudi()
    {
        return $this->belongsTo(ProgramStudi::class, 'program_studi', 'id');
    }

}
