<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Socio extends Model {
    use SoftDeletes;

    protected $table = 'socios';

    protected $date = ['deleted_at'];

    protected $fillable = [
        'nombre', 'apellido', 'documento',
        'domicilio', 'telefono', 'mail',
        'fecha_nac', 'id_grupo'
    ];
}
