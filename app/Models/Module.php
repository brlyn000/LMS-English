<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{

    protected $table = 'modules';

    // jika kamu ingin mass-assignment:
    protected $fillable = [
        'title', 'description', 'image_path', 'program_studi', 'type'
    ];

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

}
