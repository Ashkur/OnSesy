<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comunicado extends Model
{
    protected $fillable = [
        'titulo',
        'descricao',
        'data_publicacao'
    ];

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function seletivo() {
        return $this->belongsTo('App\Seletivo', 'seletivo_id')->withTimestamps();
    }

    public function edital() {
        return $this->belongsTo('App\Edital', 'edital_id');
    }
}
