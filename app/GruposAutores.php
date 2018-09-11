<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GruposAutores extends Model {
    protected $table = 'grupos_autores';
    protected $fillable = [
        'nombre'
    ];
}
