<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    public function cidade() {
        return $this->hasMany('App\Cidade', 'cidade_id');
    }
}
