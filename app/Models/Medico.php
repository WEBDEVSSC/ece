<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medico extends Model
{
    use SoftDeletes;
    
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
        'role'
    ];

    public function getNombreCompletoAttribute()
    {
        return trim("{$this->apellido_paterno} {$this->apellido_materno} {$this->nombres}");
    }

    public function tipoPersonal()
    {
        return $this->belongsTo(CatTipoPersonalMedico::class, 'tipo_personal_id', 'id');
    }

    public function servicioEspecialidadMedico()
    {
        return $this->belongsTo(CatServiciosEspecialidadMedico::class, 'servicio_id', 'id');
    }

    public function clues()
    {
        return $this->belongsTo(CatClue::class, 'clues_id', 'id');
    }

    public function paisNacimiento()
    {
        return $this->belongsTo(CatPais::class, 'pais_nacimiento_id', 'id');
    }

    public function users()
    {
        return $this->hasOne(User::class);
    }
}
