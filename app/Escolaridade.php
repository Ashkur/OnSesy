<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escolaridade extends Model
{
    protected $fillable = [
        'instituicao',
        'nome_curso',
        'ano_conclusao'
    ];

    public function candidato() {
        return $this->hasOne('App\Candidato', 'candidato_id');
    }

    public function nivelEscolar() {
        return $this->hasOne('App\NivelEscolar', 'nivel_escolar_id');
    }
}
