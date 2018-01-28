<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CargoEdital extends Model
{
    protected $table = 'cargo_edital';

    protected $fillable = [
        'curso',
        'turno_trabalho',
        'tempo_experiencia',
        'numero_vagas',
        'remuneracao',
    ];

    public function cidade(){
        return $this->hasOne('App\Cidade', 'cidade_id');
    }

    public function edital(){
        return $this->hasOne('App\Edital', 'edital_id');
    }
}
