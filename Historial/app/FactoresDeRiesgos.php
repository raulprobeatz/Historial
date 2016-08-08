<?php

namespace HistoriaOcupacional;

use Illuminate\Database\Eloquent\Model;

class FactoresDeRiesgos extends Model
{
    protected $fillable = [
        'factor', 'control', 'diagnosticado',
    ];

    public function empleado(){
    	return $this->belongsTo('HistoriaOcupacional\Empleado');
    }
}
