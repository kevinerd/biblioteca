<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prestamo extends Model {
    use SoftDeletes;

    protected $table = 'prestamos';

    protected $date = ['deleted_at'];

    protected $fillable = [
        'id_libro', 'id_user', 'fecha_inicio',
        'fecha_fin', 'fecha_devuelto', 'devuelto',
        'aviso'
    ];
}
