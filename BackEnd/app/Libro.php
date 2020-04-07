<?php

namespace App;

use App\Autor;
use App\Prestamo;
use App\GrupoLibro;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Libro extends Model {
    use SoftDeletes;

    const SEMANAL    = '1';
    const NO_SEMANAL = '0';

    const DESTACADO     = 'true';
    const NO_DESTACADO  = 'false';

    protected $table = 'libros';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'isbn', 'titulo', 'sipnosis', 'paginas',
        'id_autor', 'edicion', 'thumb', 'id_grupo',
        'destacado', 'semanal'
    ];

    public function autor() {
        return $this->belongsTo(Autor::class);
    }

    public function gruposLibros() {
        return $this->belongsToMany(GrupoLibro::class);
    }

    public function prestamos() {
        return $this->hasMany(Prestamo::class);
    }
}
