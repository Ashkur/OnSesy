<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    public function cargoEdital() {
        return $this->belongsTo('App\CargoEdital', 'cargo_edital_id');
    }

    public function estado() {
        return $this->hasOne('App\Estado', 'estado_id');
    }
}
