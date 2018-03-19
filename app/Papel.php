<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Papel extends Model
{
    use Notifiable;
    
    protected $table = "papeis";

    protected $fillable = [
        'nome',
        'descricao'
    ];

    public function users() {
        return $this->belongsToMany('App\User', 'papeis_users')->withTimestamps();
    }

    public function permissoes() {
        return $this->belongsToMany('App\Permissao', 'papeis_permissoes')->withTimestamps();
    }

    public function retornaPermissoes(){
		foreach($this->permissoes as $permissao){
			return $permissao->valor;
		}
	}
}
