<?php

namespace HistoriaOcupacional\Http\Controllers\antecedentespatologicosfamiliares;

use Illuminate\Http\Request;
use HistoriaOcupacional\Http\Controllers\Controller;
use HistoriaOcupacional\Http\Requests;
use HistoriaOcupacional\AntecedentesPatologicosFamiliares;
use HistoriaOcupacional\Empleado;
use HistoriaOcupacional\Http\Requests\InsertarFamiliares;

class AntecedentesPatologicosFamiliaresController extends Controller
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
        return view('antecedentespatologicosfamiliares.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('antecedentespatologicosfamiliares.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InsertarFamiliares $request)
    {  
        if ((AntecedentesPatologicosFamiliares::find($request->input('familiares_id')))) {
            return response()->json(['respuesta'=>'Record existente']);
        }

        $antecedentesFamiliares = new AntecedentesPatologicosFamiliares([
           'enfermedad'=> $request->input('enfermedad'),
           'tipo'=> $request->input('tipo'),
           'diagnosticado'=> $request->input('diagnosticado'),
           'control'=> $request->input('control'),
           'tratado'=> $request->input('tratado')
        ]);

        $empleado = Empleado::find($request->input('id_empleado'));
        if ($empleado) {
            $empleado->antecedentesPatologicosFamiliares()->save($antecedentesFamiliares);
            $empleado = Empleado::find($request->input('id_empleado'));
            $antecedentesEncontrados = $empleado->antecedentesPatologicosFamiliares()->get();
            return response()->json($antecedentesEncontrados);
        }else{
            return response()->json(['respuesta'=>'empleado no econtrado']);    
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
        return view('antecedentespatologicosfamiliares.mostrar');
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
                if ($request->input('enfermedad')!=null && $request->input('tipo') !=null && $request->input('diagnosticado') !=null && $request->input('control') !=null && $request->input('tratado') !=null) {

                    $antecedentesAmodificar = AntecedentesPatologicosFamiliares::find($request->input('familiares_id'));
                    if ($antecedentesAmodificar) {
                        $antecedentesAmodificar->fill([
                        'enfermedad'=> $request->input('enfermedad'), 
                        'tipo'=> $request->input('tipo'),
                        'diagnosticado'=> $request->input('diagnosticado'),
                        'control'=> $request->input('control'),
                        'tratado'=> $request->input('tratado')
                        ]);
                        $antecedentesAmodificar->save();
                        $empleado = Empleado::find($request->input('id_empleado'));
                        $antecedentesEncontrados = $empleado->antecedentesPatologicosFamiliares()->get();
                        return response()->json($antecedentesEncontrados);
                    }else{
                        return response()->json(['respuesta'=>'antecedentes no encontrados']);
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
        $familiaresAEnviar = AntecedentesPatologicosFamiliares::find($id);
        AntecedentesPatologicosFamiliares::destroy($id);
        $empleado = Empleado::find($familiaresAEnviar->empleado_id);
        return response()->json($empleado->antecedentesPatologicosFamiliares()->get());
    }
}
