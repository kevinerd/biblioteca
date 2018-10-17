<?php

namespace App;

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
}
