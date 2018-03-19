<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class grupo_categoria extends Model
{
    protected $table = 'grupos_categorias';
    protected $fillable = [
        'nombre'
    ];
}
