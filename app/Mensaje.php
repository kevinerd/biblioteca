<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mensaje extends Model {
    use SoftDeletes;

    protected $table = 'contacto';

    protected $date = ['deleted_at'];

    protected $fillable = [
        'nombre', 'apellido', 'telefono',
        'mail', 'mensaje'
        ];
}
