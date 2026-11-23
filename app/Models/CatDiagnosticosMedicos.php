<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatDiagnosticosMedicos extends Model
{
    //
    protected $table = 'cat_diagnosticos_medicos';

    protected $fillable = [
        'nombre',
        'tipo_unidad',
    ];

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = mb_strtoupper(trim($value), 'UTF-8');
    }

    public function pacientes()
    {
        // Reemplaza Paciente::class y la clave foránea según tu estructura
        return $this->hasMany(Paciente::class, 'dx_id');
    }
}
