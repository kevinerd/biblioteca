<?php

namespace App;

use App\Autor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class grupoAutor extends Model {
    use SoftDeletes;

    protected $table = 'grupos_autores';

    protected $date = ['deleted_at'];

    protected $fillable = [
        'nombre'
    ];

    public function autores() {
        return $this->belongsToMany(Autor::class);
    }
}
