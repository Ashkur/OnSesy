<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    protected $fillable = [
        'nome',
        'sobrenome',
        'cpf',
        'rg',
        'nacionalidade',
        'sexo',
        'filiacao1',
        'filiacao2',
        'pne',
        'atendimento_especial',
        'telefone1',
        'telefone2',
        'raca',
        'email'
    ] ;

    public function orgaoExpedidor(){
        return $this->hasOne('App\OrgaoExpedidor','orgao_expedidor_id');
    }

    public function raca(){
        return $this->hasOne('App\Raca', 'raca_id');
    }

    public function estadoCivil(){
        return $this->hasOne('App\EstadoCivil', 'estado_civil_id');
    }

    public function candidatoSeletivo(){
        return $this->belongsTo('App\CandidatoSeletivo', 'candidato_seletivo_id');
    }

    public function cursoCapacitacao() {
        return $this->belongsTo('App\CursoCapacitacao', 'curso_capacitacao_id');
    }

    public function endereco() {
        return $this->belongsTo('App\Endereco', 'endereco_id');
    }

    public function escolaridade() {
        return $this->belongsTo('App\Escolaridade', 'escolaridade_id');
    }
}
