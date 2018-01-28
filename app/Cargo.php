<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $fillable = [
        'nome',
        'nivel',        
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    
}
