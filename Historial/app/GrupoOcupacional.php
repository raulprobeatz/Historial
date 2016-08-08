<?php

namespace HistoriaOcupacional;

use Illuminate\Database\Eloquent\Model;

class GrupoOcupacional extends Model
{    
    protected $fillable = [
        'grupo'
    ];

    protected $dates = ['deleted_at'];
    public function departamento(){return $this->hasMany('HistoriaOcupacional\Departamento');}
}
