<?php

namespace HistoriaOcupacional\Http\Requests;

use HistoriaOcupacional\Http\Requests\Request;

class InsertPuestoTrabajoRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'puestos'=>'required',
            'jornada'=>'required',
            'horario'=>'required',
            'area_vicerrectoria'=>'required',
            'id_empleado'=>'required|integer'
        ];
    }
}
