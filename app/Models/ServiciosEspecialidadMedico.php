<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiciosEspecialidadMedico extends Model
{
    //
    protected $table = 'servicios_especialidad_medicos';

    protected $fillable = [
        'especialidad',
    ];
}
