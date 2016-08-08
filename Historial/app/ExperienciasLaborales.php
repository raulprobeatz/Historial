<?php

namespace HistoriaOcupacional;

use Illuminate\Database\Eloquent\Model;

class ExperienciasLaborales extends Model
{
     protected $fillable = [
        'experiencia','empresa', 'tiempo', 'puesto','epp_usados', 'factores_riesgos',
    ];

    public function empleado(){
    	return $this->belongsTo('HistoriaOcupacional\Empleado');
    }
}
