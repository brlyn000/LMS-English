<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = [
        'module_id', 'class_prodi_id', 'user_id', 'title', 'description', 'file_path', 'type'
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function classProdi()
    {
        return $this->belongsTo(ProgramStudi::class);
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
}
