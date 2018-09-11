<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taller extends Model {
    protected $table = 'talleres';
    protected $fillable = [
        'nombre', 'descripcion', 'idProfesor', 'duracion',
        'idAutor', 'edicion', 'portada'
    ];
}
