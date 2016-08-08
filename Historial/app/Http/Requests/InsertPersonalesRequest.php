<?php

namespace HistoriaOcupacional\Http\Requests;

use HistoriaOcupacional\Http\Requests\Request;

class InsertPersonalesRequest extends Request
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
            'factor' => 'required',
            'diagnostico' => 'required',
            'control' => 'required|in:Si,No',
            'tratado' => 'required|in:Si,No',
            'id_empleado'=>'required|integer'
        ];
    }
}
