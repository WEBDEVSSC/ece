<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatClue extends Model
{
    //
    protected $table = 'cat_clues';

    protected $fillable = [
        'clues',
        'nombre',
        'jurisdiccion',
        'jurisdiccion_label',
        'municipio',
    ];

    public function getCluesNombreAttribute()
    {
        return "{$this->clues} - {$this->nombre}";
    }
}
