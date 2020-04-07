<?php

namespace App;

use App\Evento;
use Illuminate\Database\Eloquent\Model;

class grupoEvento extends Model
{



    public function eventos() {
        return $this->belongsToMany(Evento::class);
    }
}
