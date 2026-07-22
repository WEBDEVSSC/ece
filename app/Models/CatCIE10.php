<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatCIE10 extends Model
{
    protected $table = 'cat_cie_10';

    protected $fillable = [
        'letra',
        'catalog_key',
        'no_caracteres',
        'nombre',
    ];

     /**
     * Clave y nombre del diagnóstico.
     */
    public function getClaveNombreAttribute()
    {
        return "{$this->catalog_key} - {$this->nombre}";
    }
}
