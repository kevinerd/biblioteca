<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GruposEventos extends Model {
    use SoftDeletes;

    protected $table = 'grupos_eventos';

    protected $date = ['deleted_at'];

    protected $fillable = [
        'nombre'
    ];
}
