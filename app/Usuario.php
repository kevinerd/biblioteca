<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable{
    use Notifiable;
    protected $table = 'usuarios';

    protected $fillable = ['id', 'nombre', 'apellido', 'mail', 'usuario', 'clave'];

    protected $hidden = [
        'clave', 'remember_token',
    ];
}
