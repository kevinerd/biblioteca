<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos';
    protected $fillable = [
        'nombre', 'fecha', 'hora', 'invitados',
        'descripción', 'thumb_banner', 'thumb_afiche',
        'id_categoria'
    ];
}
