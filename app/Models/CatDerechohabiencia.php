<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatDerechohabiencia extends Model
{
    //
    protected $table = 'cat_derechohabiencia';

    protected $fillable = [
        'derechohabiencia',
    ];

    public function pacientes()
    {
        return $this->hasMany(Paciente::class, 'derechohabiencia_id');
    }
}
