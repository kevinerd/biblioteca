<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GruposTalleres extends Model {
    protected $table = 'grupos_talleres';
    protected $fillable = [
        'nombre'
    ];
}
