<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escolaridade extends Model
{
    protected $fillable = [
        'nivel_escolar',
        'instituicao',
        'nome_curso',
        'ano_conclusao'
    ];

    public function candidato() {
        return $this->belongsTo('App\Candidato');
    }
}
