<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatServiciosEspecialidadMedico extends Model
{
    //
    protected $table = 'cat_servicios_especialidad_medicos';

    protected $fillable = [
        'especialidad',
    ];
}
