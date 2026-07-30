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

    /**
     * Signos vitales de la cita
     */
    public function signosVitales()
    {
        return $this->hasOne(CitaConsultaExternaSignosVitales::class, 'cita_id');
    }

    /**
     * Resultados de laboratorio de la cita.
     */
    public function laboratorio()
    {
        return $this->hasOne(CitaConsultaExternaLaboratorio::class, 'cita_id');
    }

    /**
     * Valoración podológica.
     */
    public function valoracionPodologica()
    {
        return $this->hasOne(CitaConsultaExternaValoracionPodologica::class, 'cita_id');
    }

    /**
     * Examen de estructura ósea.
     */
    public function examenEstructuraOsea()
    {
        return $this->hasOne(CitaConsultaExternaExamenEstructuraOsea::class, 'cita_id');
    }
}
