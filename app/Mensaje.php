<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $table = 'contacto';
    protected $fillable = [
        'nombre', 'apellido', 'telefono',
        'mail', 'mensaje'
        ];
}
