<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = 'grupos_categorias';
    protected $fillable = [
        'nombre'
    ];
}
