<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clue extends Model
{
    //
    protected $table = 'clues';

    protected $fillable = [
        'clues',
        'nombre',
        'jurisdiccion',
        'jurisdiccion_label',
        'municipio',
    ];
}
