<?php

namespace App;

use App\GrupoEvento;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    public function gruposEventos() {
        return $this->belongsToMany(GrupoEvento::class);
    }
}
