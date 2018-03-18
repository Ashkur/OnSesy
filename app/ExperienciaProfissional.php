<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExperienciaProfissional extends Model
{
    protected $table = 'experiencia_profissional';

    protected $fillable = [
        'empresa',
        'cargo',
        'funcao',
        'tempo',
        'descricao',
        'data_inicio',
        'data_fim',
    ];

    public function candidato() {
        return $this->belongsTo('App\Candidato');
    }
}
