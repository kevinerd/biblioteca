<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GruposAutores extends Model {
    use SoftDeletes;

    protected $table = 'grupos_autores';

    protected $date = ['deleted_at'];

    protected $fillable = [
        'nombre'
    ];
}
