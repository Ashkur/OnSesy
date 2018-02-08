<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'cpf', 
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function comunicado() {
        return $this->belongsTo('App\Comunicado', 'comunicado_id')->withTimestamps();
    }

    public function edital() {
        return $this->belongsTo('App\Edital', 'edital_id')->withTimestamps();
    }

    public function papeis() {
        return $this->belongsToMany('App\Papel', 'papeis_users')->withTimestamps();
    }

    //checa se o papel deste usuario tem permissão
    public function temAcesso($id){
        $user = User::find($id);

        foreach($user->papel as $papel){
            return $papel->retornaPermissoes();        
        }
    }

}
