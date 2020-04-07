<?php

namespace App;

use App\Libro;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prestamo extends Model {
    use SoftDeletes;

    protected $table = 'prestamos';

    protected $date = ['deleted_at'];

    protected $fillable = [
        'libro_id', 'user_id', 'fecha_inicio',
        'fecha_fin', 'fecha_devuelto', 'devuelto',
        'aviso'
    ];

    public function libros() {
        return $this->belongsTo(Libro::class);
    }

    public function users() {
        return $this->belongsTo(User::class);
    }
}
