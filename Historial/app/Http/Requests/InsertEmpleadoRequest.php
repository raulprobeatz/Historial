<?php

namespace HistoriaOcupacional\Http\Requests;

use HistoriaOcupacional\Http\Requests\Request;

class InsertEmpleadoRequest extends Request
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
            'cedula' => 'required|digits:11|unique:empleados',
            'nombre' => 'required|string',  
            'apellido' => 'required|string',
            'edad' => 'required|integer|max:100|min:10',
            'sexo' => 'required|in:M,F',
            'estado_civil' => 'required|in:casado,soltero',
            'telefono_casa' => 'digits_between:9,10',
            'telefono_movil' => 'digits_between:9,10',
            'numero_dependientes' => 'integer|max:50|min:0',
            'direccion' => 'required',
            'departamento' => 'required|integer',
        ];
    }
    //public function messages()
    //{
      //  return [
            
        //];
    //}
}
