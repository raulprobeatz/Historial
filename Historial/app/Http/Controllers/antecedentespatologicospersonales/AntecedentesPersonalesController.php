<?php

namespace HistoriaOcupacional\Http\Controllers\antecedentespatologicospersonales;

use Illuminate\Http\Request;
use HistoriaOcupacional\Http\Controllers\Controller;
use HistoriaOcupacional\Http\Requests;
use HistoriaOcupacional\AntecedentesPatologicosPersonales;
use HistoriaOcupacional\Empleado;
use HistoriaOcupacional\Http\Requests\InsertPersonalesRequest;

class AntecedentesPersonalesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin',['only'=>['destroy','edit']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('antecedentespatologicospersonales.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('antecedentespatologicospersonales.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InsertPersonalesRequest $request)
    {
                if (AntecedentesPatologicosPersonales::find($request->input('personales_id'))) {
                    return response()->json(['respuesta'=>'Record existente']);
                }

                $antecedentesPersonales = new AntecedentesPatologicosPersonales([
                'factor'=> $request->input('factor'), 
                'diagnostico'=> $request->input('diagnostico'),
                'control'=> $request->input('control'),
                'tratado'=> $request->input('tratado')
                ]);

                $empleado = Empleado::find($request->input('id_empleado'));

                if ($empleado) {
                    $empleado->antecedentesPatologicosPersonales()->save($antecedentesPersonales);
                    $empleado = Empleado::find($request->input('id_empleado'));
                    $antecedentesEncontrados = $empleado->antecedentesPatologicosPersonales()->get();
                    return response()->json($antecedentesEncontrados);
                }else{
                    return response()->json([
                        'respuesta'=>'Empleado no econtrado'
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
        return view('antecedentespatologicospersonales.mostrar');
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
                if ($request->input('personales_id') != null && $request->input('factor')!=null && $request->input('diagnostico') !=null && $request->input('control') !=null && $request->input('tratado')) {

                    $antecedentesAmodificar = AntecedentesPatologicosPersonales::find($request->input('personales_id'));
                    if ($antecedentesAmodificar) {
                        $antecedentesAmodificar->fill([
                        'factor'=>$request->input('factor'),
                        'diagnostico'=>$request->input('diagnostico'),
                        'control'=>$request->input('control'),
                        'tratado'=>$request->input('tratado')
                        ]);
                        $antecedentesAmodificar->save();
                        $empleado = Empleado::find($request->input('id_empleado'));
                        $antecedentesEncontrados = $empleado->antecedentesPatologicosPersonales()->get();
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
        $personalesAEnviar = AntecedentesPatologicosPersonales::find($id);
        AntecedentesPatologicosPersonales::destroy($id);
        $empleado = Empleado::find($personalesAEnviar->empleado_id);
        return response()->json($empleado->antecedentesPatologicosPersonales()->get());
    }
}
