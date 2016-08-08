<?php

namespace HistoriaOcupacional\Http\Requests;

use HistoriaOcupacional\Http\Requests\Request;

class InsertExperienciasRequest extends Request
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
            'experiencia'=>'required',
            'empresa'=>'required',
            'tiempo'=>'required',
            'puesto'=>'required',
            'epp_usado'=>'required',
            'factores_riesgos'=>'required',
            'id_empleado'=>'required|integer'
        ];
    }
}
