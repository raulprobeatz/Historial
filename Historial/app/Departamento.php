<?php

namespace HistoriaOcupacional;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{    
    protected $fillable = [
        'departamento'
    ];

    public function empleado(){
    	return $this->hasMany('HistoriaOcupacional\Empleado');
    }
    public function grupo(){
        return $this->belongsTo('HistoriaOcupacional\GrupoOcupacional');
    }
}
