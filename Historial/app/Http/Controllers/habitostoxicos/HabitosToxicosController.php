<?php

namespace HistoriaOcupacional\Http\Controllers\habitostoxicos;

use Illuminate\Http\Request;
use HistoriaOcupacional\Http\Controllers\Controller;
use HistoriaOcupacional\Http\Requests;
use HistoriaOcupacional\Empleado;
use HistoriaOcupacional\HabitosToxicos;
use HistoriaOcupacional\Http\Requests\InsertPuestoHabitosRequest;

class HabitosToxicosController extends Controller
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
        return view('habitostoxicos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('habitostoxicos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InsertPuestoHabitosRequest $request)
    {
        if ((HabitosToxicos::find($request->input('habitos_id')))) {
            return response()->json(['respuesta'=>'record existente']);
        }

        $habito = new HabitosToxicos([
        'habito'=> $request->input('habito'), 
        'frecuencia'=> $request->input('frecuencia')
        ]);
        
        $empleado = Empleado::find($request->input('id_empleado'));
              
        if ($empleado) {
            $empleado->habitosToxicos()->save($habito);
            $empleado = Empleado::find($request->input('id_empleado'));
            $habitosEncontrados = $empleado->habitosToxicos()->get();
            return response()->json($habitosEncontrados);
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
        return view('habitostoxicos.mostrar');
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
                if ($request->input('habito')!=null && $request->input('frecuencia') !=null) {

                    $habitosAmodificar = HabitosToxicos::find($request->input('habitos_id'));
                    if ($habitosAmodificar) {
                        $habitosAmodificar->fill([
                        'habito'=> $request->input('habito'), 
                        'frecuencia'=> $request->input('frecuencia')
                    ]);
                        $habitosAmodificar->save();
                        $empleado = Empleado::find($request->input('id_empleado'));
                        $habitosEncontrados = $empleado->habitosToxicos()->get();
                        return response()->json($habitosEncontrados);
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
        $habitosAEnviar = HabitosToxicos::find($id);
        HabitosToxicos::destroy($id);
        $empleado = Empleado::find($habitosAEnviar->empleado_id);
        return response()->json($empleado->habitosToxicos()->get());
    }
}
