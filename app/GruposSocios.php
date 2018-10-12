<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GruposSocios extends Model {
    protected $table = 'grupos_socios';
    protected $fillable = [
        'nombre'
    ];
}
