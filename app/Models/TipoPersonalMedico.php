<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoPersonalMedico extends Model
{
    //
    protected $table = 'tipos_personal_medico';

    protected $fillable = [
        'descripcion',
    ];
}
