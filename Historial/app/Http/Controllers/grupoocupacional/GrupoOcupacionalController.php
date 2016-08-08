<?php

namespace HistoriaOcupacional\Http\Controllers\grupoocupacional;

use Illuminate\Http\Request;
use HistoriaOcupacional\Http\Controllers\Controller;
use HistoriaOcupacional\Http\Requests;
use HistoriaOcupacional\Empleado;
use HistoriaOcupacional\AntecedentesPatologicosPersonales;
use HistoriaOcupacional\Http\Requests\InsertEmpleadoRequest;
use HistoriaOcupacional\GrupoOcupacional;
use HistoriaOcupacional\Departamento;
use Storage;
use Session;

class GrupoOcupacionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupo = GrupoOcupacional::all();
        return view('grupoocupacional.index',compact('grupo'));
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
        $ok = false;
        if (GrupoOcupacional::find($request->input('grupo_id'))) {
            return response()->json(['respuesta'=>'Record existente']);
        }

        $grupo = GrupoOcupacional::create([
            'grupo'=> $request->input('grupo')
        ]);
        
        if ($grupo) {
            $ok = true;
        }

        $grupos = GrupoOcupacional::all();
        return response()->json(['grupos'=>$grupos,'ok'=>$ok]);    
    
    }
    public function cargarGrupos(){
        $grupo = GrupoOcupacional::all();
        return response()->json(['grupo'=>$grupo]);
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
        $ok = false;
        if ($request->ajax()) {
            if ($request->input('grupo')!=null) {

                    $grupo = GrupoOcupacional::find($request->input('grupo_id'));
                    if ($grupo) {
                        $grupo->fill([
                        'grupo'=> $request->input('grupo'), 
                        ]);
                        $grupo->save();
                        $ok = true;
                        return response()->json(['ok'=>$ok]);
                    }else{
                        return response()->json(['respuesta'=>'grupo no encontrado']);
                    }
            }else{
                return response()->json(['respuesta'=>'datos vacios']);
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
        $ok = false;
        $grupoDel = GrupoOcupacional::destroy($id);
        if ($grupoDel) {
            $ok = true;
            return response()->json(['ok'=>$ok]);    
        }
        
    }
}
