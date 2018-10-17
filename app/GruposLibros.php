<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GruposLibros extends Model {
    use SoftDeletes;

    protected $table = 'grupos_libros';

    protected $date = ['deleted_at'];

    protected $fillable = [
        'nombre'
    ];
}
