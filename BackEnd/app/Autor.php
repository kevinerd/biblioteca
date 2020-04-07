<?php

namespace App;

use App\Libro;
use App\GrupoAutor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Autor extends Model {
    use SoftDeletes;

    protected $table = 'autores';

    protected $date = ['deleted_at'];

    protected $fillable = [
        'nombre', 'apellido',
        'thumb', 'id_grupo'
    ];

    public function libros() {
        return $this->hasMany(Libro::class);
    }

    public function gruposAutores() {
        return $this->belongsToMany(GrupoAutor::class);
    }
}
