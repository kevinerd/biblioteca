<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $table = 'libros';
    protected $fillable = [
        'isbn', 'titulo', 'sipnosis', 'paginas',
        'id_autor', 'edicion', 'thumb', 'id_grupo',
        'destacado', 'semanal'
    ];
}
