<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comunicado extends Model
{
    protected $fillable = [
        'descricao',
        'data_publicacao'
    ];

    public function user() {
        return $this->hasOne('App\User', 'user_id');
    }

    public function seletivo() {
        return $this->belongsTo('App\Seletivo', 'seletivo_id');
    }
}
