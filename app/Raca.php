<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Raca extends Model
{
    protected $fillable = [
        'tipo',
    ];

    public function candidato() {
        return $this->belongsTo('App\Candidato', 'candidato_id');
    }
}
