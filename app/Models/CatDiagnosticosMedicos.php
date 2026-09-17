<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatDiagnosticosMedicos extends Model
{
    //
    protected $table = 'cat_diagnosticos_medicos';

    protected $fillable = [
        'nombre',
    ];

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = mb_strtoupper(trim($value), 'UTF-8');
    }
}
