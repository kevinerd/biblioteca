<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evento extends Model {
    use SoftDeletes;

    protected $table = 'eventos';

    protected $date = ['deleted_at'];

    protected $fillable = [
        'nombre', 'fecha', 'hora', 'descripcion',
        'thumb', 'id_grupo'
    ];
}