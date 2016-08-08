<?php

namespace HistoriaOcupacional\Http\Controllers\factoresderiesgos;

use Illuminate\Http\Request;
use HistoriaOcupacional\Http\Controllers\Controller;
use HistoriaOcupacional\Http\Requests;
use HistoriaOcupacional\FactoresDeRiesgos;
use HistoriaOcupacional\Empleado;
use HistoriaOcupacional\Http\Requests\InsertFactoresRiesgosRequest;

class FactoresDeRiesgosController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('factoresderiesgos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('factoresderiesgos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InsertFactoresRiesgosRequest $request)
    {
        if ((FactoresDeRiesgos::find($request->input('factores_id')))) {
            return response()->json(['respuesta'=>'record existente']);
        }
        $factor = new FactoresDeRiesgos([
        'factor'=> $request->input('factor'), 
        'control'=> $request->input('control'),
        'diagnosticado'=> $request->input('diagnosticado')
        ]);
        
        $empleado = Empleado::find($request->input('id_empleado'));     
        if ($empleado) {
            $empleado->factoresDeRiesgos()->save($factor);
            $empleado = Empleado::find($request->input('id_empleado'));
            $factoresEncontrados = $empleado->factoresDeRiesgos()->get();
            return response()->json($factoresEncontrados);
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
        return view('factoresderiesgos.mostrar');
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
                if ($request->input('factor')!=null && $request->input('control') !=null && $request->input('diagnosticado') !=null) {

                    $facotresAmodificar = FactoresDeRiesgos::find($request->input('factores_id'));
                    if ($facotresAmodificar) {
                        $facotresAmodificar->fill([
                        'factor'=> $request->input('factor'), 
                        'control'=> $request->input('control'),
                        'diagnosticado'=> $request->input('diagnosticado')
                    ]);
                        $facotresAmodificar->save();
                        $empleado = Empleado::find($request->input('id_empleado'));
                        $factoresEncontrados = $empleado->factoresDeRiesgos()->get();
                        return response()->json($factoresEncontrados);
                    }else{
                        return response()->json(['respuesta'=>'experiencias laborales no encontradas']);
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
        $factorAEnviar = FactoresDeRiesgos::find($id);
        FactoresDeRiesgos::destroy($id);
        $empleado = Empleado::find($factorAEnviar->empleado_id);
        return response()->json($empleado->factoresDeRiesgos()->get());
    }
}
