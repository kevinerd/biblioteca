<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model {
    protected $table = 'prestamos';
    protected $fillable = [
        'id_libro', 'id_socio', 'fecha_inicio',
        'fecha_fin', 'fecha_devuelto', 'devuelto',
        'aviso'
    ];
}
