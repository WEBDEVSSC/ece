<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatTipoPersonalUnidad extends Model
{
    //
    protected $table = 'cat_tipos_personal_unidad';

    protected $fillable = [
        'descripcion',
    ];

    public function personalUnidad()
    {
        return $this->hasOne(PersonalUnidad::class, 'tipo_personal_id', 'id');
    }
}
