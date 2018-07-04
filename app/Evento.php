<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos';
    protected $fillable = [
        'nombre', 'fecha', 'hora', 'id_categoria', 'invitados',
        'descripcion', 'thumb_banner', 'thumb_afiche'
    ];
}