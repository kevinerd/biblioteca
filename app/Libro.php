<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $table = 'libros';
    protected $fillable = [
        'isbn', 'titulo', 'sipnosis', 'paginas',
        'idAutor', 'edicion', 'thumb'
    ];
}
