<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NivelEscolar extends Model
{
    protected $table = 'nivel_escolar';

    protected $fillable = [
        'nivel'
    ];

    public function escolaridade() {
        return $this->belongsTo('App\Escolaridade', 'escolaridade_id');
    }
}
