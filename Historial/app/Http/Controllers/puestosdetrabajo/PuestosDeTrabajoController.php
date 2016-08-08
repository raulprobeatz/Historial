<?php

namespace HistoriaOcupacional\Http\Controllers\puestosdetrabajo;

use Illuminate\Http\Request;
use HistoriaOcupacional\Http\Controllers\Controller;
use HistoriaOcupacional\Http\Requests;
use HistoriaOcupacional\Empleado;
use HistoriaOcupacional\PuestoDeTrabajo;
use HistoriaOcupacional\Http\Requests\InsertPuestoTrabajoRequest;

class PuestosDeTrabajoController extends Controller
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
        return view('puestosdetrabajo.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('puestosdetrabajo.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InsertPuestoTrabajoRequest $request)
    {
        if ((PuestoDeTrabajo::find($request->input('puestos_id')))) {
            return response()->json(['respuesta'=>'record existente']);
        }

        $puestos = new PuestoDeTrabajo([
        'puesto'=> $request->input('puestos'), 
        'jornada'=> $request->input('jornada'),
        'horario'=> $request->input('horario'),
        'area_vicerrectoria'=> $request->input('area_vicerrectoria')
        ]);
      
        $empleado = Empleado::find($request->input('id_empleado'));
                
       if ($empleado) {
            $empleado->puestoDeTrabajo()->save($puestos);
            $empleado = Empleado::find($request->input('id_empleado'));
            $puestosEncontrados = $empleado->puestoDeTrabajo()->get();
            return response()->json($puestosEncontrados);
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
        return view('puestosdetrabajo.mostrar');
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
                if ($request->input('puestos')!=null && $request->input('jornada') !=null && $request->input('horario') !=null && $request->input('area_vicerrectoria') !=null) {

                    $puestoAmodificar = PuestoDeTrabajo::find($request->input('puestos_id'));
                    if ($puestoAmodificar) {
                        $puestoAmodificar->fill([
                        'puesto'=> $request->input('puestos'), 
                        'jornada'=> $request->input('jornada'),
                        'horario'=> $request->input('horario'),
                        'area_vicerrectoria'=> $request->input('area_vicerrectoria')
                       ]);
                        $puestoAmodificar->save();
                        $empleado = Empleado::find($request->input('id_empleado'));
                        $puestosEncontradas = $empleado->puestoDeTrabajo()->get();
                        return response()->json($puestosEncontradas);
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
        $puestoAEnviar = PuestoDeTrabajo::find($id);
        PuestoDeTrabajo::destroy($id);
        $empleado = Empleado::find($puestoAEnviar->empleado_id);
        return response()->json($empleado->puestoDeTrabajo()->get());
    }
}
