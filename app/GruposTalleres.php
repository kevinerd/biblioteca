<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GruposTalleres extends Model {
    use SoftDeletes;

    protected $table = 'grupos_talleres';

    protected $date = ['deleted_at'];

    protected $fillable = [
        'nombre'
    ];
}
