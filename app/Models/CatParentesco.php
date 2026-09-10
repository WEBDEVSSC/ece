<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatParentesco extends Model
{
    protected $table = 'cat_parentesco';

    protected $fillable = [
        'parentesco',
    ];
}
