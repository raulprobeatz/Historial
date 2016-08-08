<?php

namespace HistoriaOcupacional\Http\Requests;

use HistoriaOcupacional\Http\Requests\Request;

class UserInsertRequest extends Request
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
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'roll'=>'required|digits_between:1,2'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio',
            'email.required'  => 'El correo es obligatorio',
            'email.email' => 'El correo debe ser valido',
            'password.required' => 'La contraseña es oblicatoria',
            'roll.required' => 'El roll es requerido',
            'roll.digits_between' => 'El roll debe ser un entero: (1 o 2)'
        ];
    }
}
