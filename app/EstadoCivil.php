<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model
{
    protected $table = 'estado_civil';

    protected $fillable = [
        'tipo'
    ];

    public function candidato() {
        return $this->belongsTo('App\Candidato', 'candidato_id');
    }
}
