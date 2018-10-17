<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Taller extends Model {
    use SoftDeletes;

    protected $table = 'talleres';

    protected $date = ['deleted_at'];

    protected $fillable = [
        'nombre', 'descripcion', 'horario', 'fecha',
        'thumb', 'id_grupo'
    ];
}
