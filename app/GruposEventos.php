<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GruposEventos extends Model {
    protected $table = 'grupos_eventos';
    protected $fillable = [
        'nombre'
    ];
}
