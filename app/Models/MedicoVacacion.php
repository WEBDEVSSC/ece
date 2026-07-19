<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicoVacacion extends Model
{
    protected $table = 'medicos_vacaciones';

    protected $fillable = [
        'medico_id',
        'fecha',
        'concepto',
    ];

    protected $casts = [
        'fecha' => 'date',
    ];

    /**
     * Médico al que pertenece el registro de vacaciones.
     */
    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }
}
