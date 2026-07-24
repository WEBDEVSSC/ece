<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CitaConsultaExternaSignosVitales extends Model
{
    protected $table = 'citas_consulta_externa_signos_vitales';

    protected $fillable = [
        'cita_id',
        'temperatura',
        'frecuencia_cardiaca',
        'frecuencia_respiratoria',
        'saturacion_oxigeno',
        'tension_arterial_sistolica',
        'tension_arterial_diastolica',
        'glicemia_capilar',
        'glicemia_capilar_medicion',
        'circunferencia_cintura',
        'peso',
        'talla',
        'imc',
    ];

    /**
     * Relación con la cita.
     */
    public function cita()
    {
        return $this->belongsTo(CitaConsultaExterna::class, 'cita_id');
    }
}
