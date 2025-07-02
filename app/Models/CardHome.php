<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardHome extends Model
{
    protected $table = 'card_home';

    protected $fillable = [
        'name',
        'description',
        'schedule',
        'students_count',
        'status',
        'color_theme',
        'link',
        'image',
    ];
}
