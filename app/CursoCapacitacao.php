<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CursoCapacitacao extends Model
{
    protected $table = 'curso_capacitacao';

    protected $fillable = [
        'nome_curso',
        'descricao',
        'ano_conclusao',
        'carga_horaria'
    ];

    public function candidato() {
        return $this->hasOne('App\Candidato', 'candidato_id');
    }
}
