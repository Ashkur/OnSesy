<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Papel extends Model
{
    protected $table = "papeis";

    protected $fillable = [
        'nome',
        'descricao'
    ];

    public function users() {
        return $this->belongsToMany('App\User', 'papeis_users');
    }

    public function permissoes() {
        return $this->belongsToMany('App\Permissao', 'papeis_permissoes');
    }
}
