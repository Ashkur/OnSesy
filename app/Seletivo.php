<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seletivo extends Model
{
    public function edital() {
        return $this->hasOne('App\Edital', 'edital_id');
    }

    public function comunicado() {
        return $this->hasMany('App\Comunidado', 'comunicado_id');
    }
}
