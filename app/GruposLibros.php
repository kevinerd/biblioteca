<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GruposLibros extends Model {
    protected $table = 'grupos_libros';
    protected $fillable = [
        'nombre'
    ];
}
