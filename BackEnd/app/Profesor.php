<?php

namespace App;

use App\Taller;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model {

    public function taller() {
        $this->belongsTo(Taller::class);
    }
}
