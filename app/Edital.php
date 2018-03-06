<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edital extends Model
{
    protected $table = 'edital';

    protected $fillable = [
        'entidade',
        'numero',
        'ano',
        'data_inicio',
        'data_fim',
    ];

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function seletivo() {
        return $this->belongsTo('App\Seletivo', 'seletivo_id');
    }
}
