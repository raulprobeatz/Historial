<?php

namespace HistoriaOcupacional\Http\Controllers\experienciaslaborales;

use Illuminate\Http\Request;
use HistoriaOcupacional\Http\Controllers\Controller;
use HistoriaOcupacional\Http\Requests;
use HistoriaOcupacional\ExperienciasLaborales;
use HistoriaOcupacional\Empleado;
use HistoriaOcupacional\Http\Requests\InsertExperienciasRequest;
class ExperienciasLaboralesController extends Controller
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
        return view('experienciaslaborales.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('experienciaslaborales.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InsertExperienciasRequest $request)
    {
        if ((ExperienciasLaborales::find($request->input('experiencias_id')))) {
           return response()->json(['respuesta'=>'record existente']);
        }
        
        $experiencias = new ExperienciasLaborales([
        'experiencia'=> $request->input('experiencia'), 
        'empresa'=> $request->input('empresa'),
        'tiempo'=> $request->input('tiempo'),
        'puesto'=> $request->input('puesto'),
        'epp_usados'=> $request->input('epp_usado'),
        'factores_riesgos'=> $request->input('factores_riesgos'),
        ]);
        
        $empleado = Empleado::find($request->input('id_empleado'));
             
        if ($empleado) {
            $empleado->experienciasLaborales()->save($experiencias);
            $empleado = Empleado::find($request->input('id_empleado'));
            $experienciasEncontradas = $empleado->experienciasLaborales()->get();
            return response()->json($experienciasEncontradas);
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
        return view('experienciaslaborales.mostrar');
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
                if ($request->input('experiencia')!=null && $request->input('empresa') !=null && $request->input('tiempo') !=null && $request->input('puesto') !=null && $request->input('epp_usado') !=null && $request->input('factores_riesgos') !=null) {

                    $experienciasAmodificar = ExperienciasLaborales::find($request->input('experiencias_id'));
                    if ($experienciasAmodificar) {
                        $experienciasAmodificar->fill([
                        'experiencia'=> $request->input('experiencia'), 
                        'empresa'=> $request->input('empresa'),
                        'tiempo'=> $request->input('tiempo'),
                        'puesto'=> $request->input('puesto'),
                        'epp_usados'=> $request->input('epp_usado'),
                        'factores_riesgos'=> $request->input('factores_riesgos')
                        ]);
                        $experienciasAmodificar->save();
                        $empleado = Empleado::find($request->input('id_empleado'));
                        $experienciasEncontradas = $empleado->experienciasLaborales()->get();
                        return response()->json($experienciasEncontradas);
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
        $experienciasAEnviar = ExperienciasLaborales::find($id);
        ExperienciasLaborales::destroy($id);
        $empleado = Empleado::find($experienciasAEnviar->empleado_id);
        return response()->json($empleado->experienciasLaborales()->get());
    }
}
