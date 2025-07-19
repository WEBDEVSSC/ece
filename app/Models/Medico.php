<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $table = 'medicos';

    protected $fillable = [
        'curp',
        'apellido_paterno',
        'apellido_materno',
        'nombres',
        'tipo_personal_id',
        'tipo_personal_label',
        'cedula_profesional',
        'servicio_id',
        'servicio_label',
        'clues_id',
        'clues_clues',
        'clues_label',
    ];
}
