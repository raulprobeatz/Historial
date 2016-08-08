<?php

namespace HistoriaOcupacional\Http\Controllers\carreras;

use Illuminate\Http\Request;
use HistoriaOcupacional\Http\Controllers\Controller;
use HistoriaOcupacional\Http\Requests;
use HistoriaOcupacional\Empleado;
use HistoriaOcupacional\Carrera;
use HistoriaOcupacional\Http\Requests\InsertCarreraRequest;

class CarrerasController extends Controller
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
        return view('carreras.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carreras.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InsertCarreraRequest $request)
    {
        if ((Carrera::find($request->input('carreras_id')))) {
                    return response()->json(['respuesta'=>'record existente']);
        }

        $carrera = new Carrera([
        'carrera'=> $request->input('carrera'), 
        'institucion'=> $request->input('institucion')
        ]);
             
        $empleado = Empleado::find($request->input('id_empleado'));
               
        if ($empleado) {
            $empleado->carrera()->save($carrera);
            $empleado = Empleado::find($request->input('id_empleado'));
            $carrerasEncontradas = $empleado->carrera()->get();
            return response()->json($carrerasEncontradas);
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
        return view('carreras.mostrar');
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
                if ($request->input('carrera')!=null && $request->input('institucion') !=null) {

                    $carreraAmodificar = Carrera::find($request->input('carreras_id'));
                    if ($carreraAmodificar) {
                        $carreraAmodificar->fill([
                        'carrera'=> $request->input('carrera'), 
                        'institucion'=> $request->input('institucion')
                    ]);
                        $carreraAmodificar->save();
                        $empleado = Empleado::find($request->input('id_empleado'));
                        $carreraEncontradas = $empleado->carrera()->get();
                        return response()->json($carreraEncontradas);
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
        $carreraAEnviar = Carrera::find($id);
        Carrera::destroy($id);
        $empleado = Empleado::find($carreraAEnviar->empleado_id);
        return response()->json($empleado->carrera()->get());
    }
}
