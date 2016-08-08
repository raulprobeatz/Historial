<?php

namespace HistoriaOcupacional;

use Illuminate\Database\Eloquent\Model;

class PuestoDeTrabajo extends Model
{
    protected $fillable = [
        'puesto', 'jornada', 'horario','area_vicerrectoria',
    ];

    public function empleado(){
    	return $this->belongsTo('HistoriaOcupacional\Empleado');
    }
}
