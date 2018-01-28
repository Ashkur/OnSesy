<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrgaoExpedidor extends Model
{
    protected $table = 'orgao_expedidor';

    protected $fillable = [
        'entidade'
    ];

    public function candidato() {
        return $this->belongsTo('App\Candidato', 'candidato_id');
    }
}
