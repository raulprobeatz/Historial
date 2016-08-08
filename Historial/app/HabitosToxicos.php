<?php

namespace HistoriaOcupacional;

use Illuminate\Database\Eloquent\Model;

class HabitosToxicos extends Model
{
    protected $fillable = [
        'habito', 'frecuencia',
    ];

    public function empleado(){
    	return $this->belongsTo('HistoriaOcupacional\Empleado');
    }
}
