<?php

namespace HistoriaOcupacional;

use Illuminate\Database\Eloquent\Model;

class Licencia extends Model
{
    protected $fillable = [
        'descripsion','fecha'
    ];

    public function empleado(){
    	return $this->belongsTo('HistoriaOcupacional\Empleado');
    }
}
