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
        return $this->hasMany('App\Comunicado');
    }

    public function edital() {
        return $this->hasMany('App\Edital');
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

    public function validCPF($cpf){
        $d1 = 0;
        $d2 = 0;
          $cpf = preg_replace("/[^0-9]/", "", $cpf);
          $ignore_list = array(
            '00000000000',
            '01234567890',
            '11111111111',
            '22222222222',
            '33333333333',
            '44444444444',
            '55555555555',
            '66666666666',
            '77777777777',
            '88888888888',
            '99999999999'
          );
          if(strlen($cpf) != 11 || in_array($cpf, $ignore_list)){
              return false;
          } else {
            for($i = 0; $i < 9; $i++){
              $d1 += $cpf[$i] * (10 - $i);
            }
            $r1 = $d1 % 11;
            $d1 = ($r1 > 1) ? (11 - $r1) : 0;
            for($i = 0; $i < 9; $i++) {
              $d2 += $cpf[$i] * (11 - $i);
            }
            $r2 = ($d2 + ($d1 * 2)) % 11;
            $d2 = ($r2 > 1) ? (11 - $r2) : 0;
            return (substr($cpf, -2) == $d1 . $d2) ? true : false;
          }
        }

}
