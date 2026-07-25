<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CitaConsultaExternaLaboratorio extends Model
{
    protected $table = 'citas_consulta_externa_laboratorios';

    protected $fillable = [
        'cita_id',
        'hemoglobina',
        'glucosa_serica',
        'trigliceridos',
        'colesterol_ldl',
        'colesterol_hdl',
        'colesterol_total',
        'microalbuminuria',
    ];

    /**
     * Cita de consulta externa a la que pertenece el laboratorio.
     */
    public function cita()
    {
        return $this->belongsTo(CitaConsultaExterna::class, 'cita_id');
    }
}
