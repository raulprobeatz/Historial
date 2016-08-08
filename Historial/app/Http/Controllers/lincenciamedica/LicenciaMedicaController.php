<?php

namespace HistoriaOcupacional\Http\Controllers\lincenciamedica;

use Illuminate\Http\Request;
use HistoriaOcupacional\Http\Controllers\Controller;
use HistoriaOcupacional\Http\Requests;
use HistoriaOcupacional\Empleado;
use HistoriaOcupacional\AntecedentesPatologicosPersonales;
use HistoriaOcupacional\Http\Requests\InsertEmpleadoRequest;
use HistoriaOcupacional\Licencia;
use HistoriaOcupacional\Departamento;
use Storage;
use Session;

class LicenciaMedicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ((Licencia::find($request->input('licencia_id')))) {
            return response()->json(['respuesta'=>'record existente']);
        }
        $licencia = new Licencia([
        'fecha'=> $request->input('fecha'),
        'descripsion' => $request->input('licencia_descripsion'),
        ]);
        
        $empleado = Empleado::find($request->input('id_empleado'));     
        if ($empleado) {
            $empleado->licencia()->save($licencia);
            $empleado = Empleado::find($request->input('id_empleado'));
            $licencias = $empleado->licencia()->get();
            return response()->json($licencias);
            }else{
                return response()->json([
                'respuesta'=>'empleado no econtrado'
            ]);    
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            $empleado = Empleado::find($request->input('id_empleado'));
            if ($empleado) {
                if ($request->input('fecha')!=null && $request->input('licencia_descripsion')) {
                    $licencia = Licencia::find($request->input('licencia_id'));
                    if ($licencia) {
                        $licencia->fill([
                        'fecha'=> $request->input('fecha'), 
                        'descripsion'=> $request->input('licencia_descripsion'),
                         ]);
                        $licencia->save();
                        $empleado = Empleado::find($request->input('id_empleado'));
                        $licencias = $empleado->licencia()->get();
                        return response()->json($licencias);
                    }else{
                        return response()->json(['respuesta'=>'licencia no encontrada']);
                    }
                }else{
                    return response()->json(['respuesta'=>'datos vacios']);
                }
            }else{
                return response()->json(['respuesta'=>'empleado no encontrado']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $licencia = Licencia::find($id);
        Licencia::destroy($id);
        $empleado = Empleado::find($licencia->empleado_id);
        return response()->json($empleado->licencia()->get());
    }
}
