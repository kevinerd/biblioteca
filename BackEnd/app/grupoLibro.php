<?php

namespace App;

use App\Libro;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class grupoLibro extends Model {
    use SoftDeletes;

    protected $table = 'grupos_libros';

    protected $date = ['deleted_at'];

    protected $fillable = [
        'nombre'
    ];

    public function libros() {
        return $this->belongsToMany(Libro::class);
    }
}
