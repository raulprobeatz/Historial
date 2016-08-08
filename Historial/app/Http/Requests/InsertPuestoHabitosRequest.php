<?php

namespace HistoriaOcupacional\Http\Requests;

use HistoriaOcupacional\Http\Requests\Request;

class InsertPuestoHabitosRequest extends Request
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
            'habito'=>'required',
            'frecuencia'=>'required',
            'id_empleado'=>'required|integer'
        ];
    }
}
