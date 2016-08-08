<?php

namespace HistoriaOcupacional;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Empleado extends Model
{
    //use SoftDeletes;
    
    protected $fillable = [
        'nombre', 'apellido', 'edad','cedula', 'sexo', 'estado_civil',
        'telefono_casa', 'telefono_movil', 'direccion','numero_dependientes', 'tiempo_traslado', 'foto',
        'seguro_medico','nss','lugar_origen','donde_esta',
    ];

    //protected $dates = ['deleted_at'];

    public function antecedentesPatologicosPersonales(){return $this->hasMany('HistoriaOcupacional\AntecedentesPatologicosPersonales');
    }
    public function antecedentesPatologicosFamiliares(){return $this->hasMany('HistoriaOcupacional\AntecedentesPatologicosFamiliares');
    }
    public function carrera(){return $this->hasMany('HistoriaOcupacional\Carrera');
    }
    public function licencia(){return $this->hasMany('HistoriaOcupacional\Licencia');
    }
    public function documento(){return $this->hasMany('HistoriaOcupacional\Documento');
    }
    public function experienciasLaborales(){return $this->hasMany('HistoriaOcupacional\ExperienciasLaborales');
    }
    public function factoresDeRiesgos(){return $this->hasMany('HistoriaOcupacional\FactoresDeRiesgos');
    }
    public function habitosToxicos(){return $this->hasMany('HistoriaOcupacional\HabitosToxicos');
    }
    public function puestoDeTrabajo(){return $this->hasMany('HistoriaOcupacional\PuestoDeTrabajo');
    }
    public function departamentos(){
        return $this->belongsTo('HistoriaOcupacional\Departamento');
    }
}
