<?php

namespace HistoriaOcupacional;

use Illuminate\Database\Eloquent\Model;

class AntecedentesPatologicosPersonales extends Model
{
    protected $fillable = [
        'factor', 'diagnostico', 'control','tratado',
    ];

    public function empleado(){
    	return $this->belongsTo('HistoriaOcupacional\Empleado');
    }
}
