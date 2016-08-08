<?php

namespace HistoriaOcupacional;

use Illuminate\Database\Eloquent\Model;

class AntecedentesPatologicosFamiliares extends Model
{
	protected $fillable = [
        'enfermedad', 'tipo', 'diagnosticado','control', 'tratado',
        ];

    public function empleado(){
    	return $this->belongsTo('HistoriaOcupacional\Empleado');
    }
}
