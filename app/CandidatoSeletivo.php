<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidatoSeletivo extends Model
{
    protected $fillable = [
        'titulo_capacitacao',
        'pontucao_capacitacao',
        'titulo_graduacao',
        'pontuacao_capacitacao',
        'titulo_experiencia',
        'pontuacao_experiencia',
    ];

    public function candidato(){
        return $this->hasMany('App\Candidato', 'candidato_id');
    }

    public function seletivo(){
        return $this->hasMany('App\Seletivo', 'seletivo_id');
    }
}
