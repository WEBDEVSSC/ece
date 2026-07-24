<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CitaConsultaExterna extends Model
{
    protected $table = 'citas_consulta_externa';

    protected $fillable = [
        'fecha',
        'hora',
        'paciente_id',
        'medico_id',
        'clues_id',
        'status',
    ];

    protected $casts = [
        'fecha' => 'date',
    ];

    /**
     * Paciente de la cita.
     */
    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    /**
     * Médico de la cita.
     */
    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }

    /**
     * CLUES donde se agenda la cita.
     */
    public function clues()
    {
        return $this->belongsTo(CatClue::class, 'clues_id');
    }

    public function signosVitales()
    {
        return $this->hasOne(CitaConsultaExternaSignosVitales::class, 'cita_id');
    }
}
