<?php

namespace HistoriaOcupacional\Http\Requests;

use HistoriaOcupacional\Http\Requests\Request;

class InsertarFamiliares extends Request
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
            'enfermedad'=>'required',
            'tipo'=>'required',
            'diagnosticado'=>'required',
            'control'=>'required',
            'tratado'=>'required',
            'id_empleado'=>'required|integer'
        ];
    }
}
