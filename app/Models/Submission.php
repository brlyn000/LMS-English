<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Submission extends Model
{
    use HasFactory;

    protected $table = 'submissions';
    protected $casts = [
        'submitted_at' => 'datetime',
    ];
    protected $fillable = [
        'material_id',
        'user_id',
        'file_path',
        'notes',
        'submitted_at',
        'score',
        'comment'
    ];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
