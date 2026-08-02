<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalUnidadVacacion extends Model
{
    protected $table = 'personal_unidad_vacaciones';

    protected $fillable = [
        'personal_unidad_id',
        'fecha',
        'concepto',
    ];

    protected $casts = [
        'fecha' => 'date',
    ];

    /**
     * PersonalUnidad al que pertenece el registro de vacaciones.
     */
    public function personalUnidad()
    {
        return $this->belongsTo(PersonalUnidad::class);
    }
}
