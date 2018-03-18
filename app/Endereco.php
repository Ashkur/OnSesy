<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = [
        'cep',
        'logradouro',
        'bairro',
        'cidade',
        'estado',
    ];

    public function candidato() {
        return $this->belongsTo('App\Candidato');
    }
}
