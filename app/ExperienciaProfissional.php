<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExperienciaProfissional extends Model
{
    protected $table = 'experiencia_profissional';

    protected $fillable = [
        'empresa',
        //'cargo',
        //'funcao',
        //'tempo',
        //'mes_ano_tempo',
        'descricao',
        //'data_inicio',
        //'data_fim',
    ];

    public function candidato() {
        return $this->hasOne('App\Candidato', 'candidato_id');
    }
}
