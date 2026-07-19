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

    /**
     * NOMBRE COMPLETO CONCATENADO DEL MÉDICO
     */
    public function getNombreCompletoAttribute()
    {
        return trim("{$this->apellido_paterno} {$this->apellido_materno} {$this->nombres}");
    }

    /**
     * TIPO DE PERSONAL MÉDICO
     */
    public function tipoPersonal()
    {
        return $this->belongsTo(CatTipoPersonalMedico::class, 'tipo_personal_id', 'id');
    }

    /**
     * SERVICIO DE ESPECIALIDAD DEL MÉDICO
     */
    public function servicioEspecialidadMedico()
    {
        return $this->belongsTo(CatServiciosEspecialidadMedico::class, 'servicio_id', 'id');
    }

    /**
     * CLUES AL QUE PERTENECE EL MÉDICO
     */
    public function clues()
    {
        return $this->belongsTo(CatClue::class, 'clues_id', 'id');
    }

    /**
     * PAIS DE NACIMIENTO DEL MÉDICO
     */
    public function paisNacimiento()
    {
        return $this->belongsTo(CatPais::class, 'pais_nacimiento_id', 'id');
    }

    /**
     * USUARIO ASOCIADO AL MÉDICO
     */
    public function users()
    {
        return $this->hasOne(User::class);
    }

    /**
     * VACACIONES DEL MÉDICO
     */
    public function vacaciones()
    {
        return $this->hasMany(MedicoVacacion::class);
    }
}
