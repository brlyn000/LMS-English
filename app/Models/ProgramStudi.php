<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    use HasFactory;

    protected $table = 'program_studi';

    protected $fillable = ['nama_prodi', 'kode_prodi'];

    public function users()
    {
        return $this->hasMany(User::class, 'program_studi_id');
    }
        public function materials()
    {
        return $this->hasMany(Material::class);
    }

    public function threads()
    {
        return $this->hasMany(Thread::class, 'program_studi', 'id');
    }
}
