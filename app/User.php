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

    public function cargo(){
        return $this->hasOne('App\Cargo', 'cargo_id');
    }

    public function comunicado() {
        return $this->belongsTo('App\Comunicado', 'comunicado_id');
    }

    public function edital() {
        return $this->belongsTo('App\Edital', 'edital_id');
    }

}
