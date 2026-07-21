<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paciente extends Model
{
    use HasFactory;

    protected $table = 'pacientes';

    protected $fillable = [
        'curp',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'sexo',
        'fecha_nacimiento',
        'escolaridad_id',
        'estado_civil_id',
        'alergias',
        'diagnostico_medico_id',
        'celular',
        'email',
        'no_expediente',
        'clues_id'
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];

    /**
     * Escolaridad del paciente.
     */
    public function escolaridad()
    {
        return $this->belongsTo(CatEscolaridad::class, 'escolaridad_id');
    }

    /**
     * Estado civil del paciente.
     */
    public function estadoCivil()
    {
        return $this->belongsTo(CatEstadoCivil::class, 'estado_civil_id');
    }

    /**
     * Diagnóstico médico (CIE-10).
     */
    public function diagnosticoMedico()
    {
        return $this->belongsTo(CatCIE10::class, 'diagnostico_medico_id');
    }

    /**
     * CLUES del paciente
     */
    public function clues()
    {
        return $this->belongsTo(CatClue::class, 'clues_id');
    }

    /**
     * Nombre completo.
     */
    public function getNombreCompletoAttribute()
    {
        return trim(
            "{$this->apellido_paterno} {$this->apellido_materno} {$this->nombre}"
        );
    }
}
