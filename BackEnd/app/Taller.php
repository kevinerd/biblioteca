<?php

namespace App;

use App\GrupoTaller;
use App\Profesor;
use Illuminate\Database\Eloquent\Model;

class Taller extends Model {
    public function gruposTalleres() {
        return $this->belongsToMany(GrupoTaller::class);
    }

    public function profesor() {
        return $this->belongsTo(Profesor::class);
    }
}
