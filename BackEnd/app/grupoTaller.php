<?php

namespace App;

use App\Taller;
use Illuminate\Database\Eloquent\Model;

class grupoTaller extends Model
{
    public function talleres() {
        return $this->belongsToMany(Taller::class);
    }
}
