<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Libro extends Model {
    use SoftDeletes;

    protected $table = 'libros';

    protected $date = ['deleted_at'];

    protected $fillable = [
        'isbn', 'titulo', 'sipnosis', 'paginas',
        'id_autor', 'edicion', 'thumb', 'id_grupo',
        'destacado', 'semanal'
    ];
}
