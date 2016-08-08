<?php

namespace HistoriaOcupacional;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $fillable = [
        'ruta', 'descripsion',
    ];

    public function empleado(){
    	return $this->belongsTo('HistoriaOcupacional\Empleado');
    }
}
