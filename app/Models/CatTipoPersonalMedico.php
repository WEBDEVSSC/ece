<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatTipoPersonalMedico extends Model
{
    //
    protected $table = 'cat_tipos_personal_medico';

    protected $fillable = [
        'descripcion',
    ];

    public function medico()
    {
        return $this->hasOne(Medico::class, 'tipo_personal_id', 'id');
    }
}
