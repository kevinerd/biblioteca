<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GruposSocios extends Model {
    use SoftDeletes;

    protected $table = 'grupos_socios';

    protected $date = ['deleted_at'];

    protected $fillable = [
        'nombre'
    ];
}
