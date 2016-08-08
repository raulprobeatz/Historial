<?php

namespace HistoriaOcupacional\Http\Controllers\departamento;

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
use DB;
class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamento = DB::table('grupo_ocupacionals')
            ->join('departamentos', 'grupo_ocupacionals.id', '=', 'departamentos.grupo_id')
            ->select('departamentos.id', 'departamentos.departamento', 'grupo_ocupacionals.grupo')
            ->get();
        
        return response()->json($departamento);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departamento.charts');
    }

    public function cantidad(){
        $empleadosPorDepartamento = DB::select('select count(empleados.id) as cantidad,departamento,grupo_ocupacionals.grupo from empleados inner join departamentos on departamentos.id = empleados.departamento_id inner join grupo_ocupacionals on grupo_ocupacionals.id = departamentos.grupo_id group by departamento order by grupo_ocupacionals.grupo');

        return response()->json(['departamentos'=>$empleadosPorDepartamento]);

    }

    public function faltas(){
        //$licenciasPorDepartamento = DB::table('departamentos')
            //->join('empleados', 'departamentos.id', '=', 'empleados.departamento_id')
            //->join('licencias', 'empleados.id', '=', 'licencias.empleado_id')
            //->select('departamentos.departamento', DB::raw('MONTH(licencias.fecha) as mes'))
            //->where(DB::raw('MONTH(licencias.fecha) = 7'))
            //->orderBy('mes')
            //->get();
            $empleados = DB::select('select count(id) as cantidad_empleado from empleados');

            $empleadosPorDepartamento = DB::select('select count(empleados.id) as cantidad_por_departamento,departamento from empleados inner join departamentos on departamentos.id = empleados.departamento_id inner join licencias on empleados.id = licencias.empleado_id group by departamento');

            $licenciasPorDepartamento = DB::select('select departamento,licencias.fecha, count(licencias.fecha) as cantidad, MONTH(licencias.fecha)as mes from departamentos inner join empleados on departamentos.id = empleados.departamento_id inner join licencias on empleados.id = licencias.empleado_id where MONTH(licencias.fecha) = ? group by departamento', [7]);

        return response()->json(['dep'=>$licenciasPorDepartamento,'cnt'=>$empleados,'cnt_per_dep'=>$empleadosPorDepartamento]);
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
        if (Departamento::find($request->input('departamento_id'))) {
            return response()->json(['respuesta'=>'Record existente']);
        }

        $departamento = new GrupoOcupacional([
            'departamento'=> $request->input('departamento')
        ]);
        
        $grupo = GrupoOcupacional::find($request->input('dgrupo'));

        if ($grupo) {
            
            DB::table('departamentos')->insert(array(
                array('departamento' => $request->input('departamento'), 'grupo_id' => $request->input('dgrupo')),
            ));
            //$grupo->departamento()->save($departamento);
            $ok = true;
            return response()->json($grupo);

        }

        $departamento = DB::table('grupo_ocupacionals')
            ->join('departamentos', 'grupo_ocupacionals.id', '=', 'departamentos.grupo_id')
            ->select('departamentos.id', 'departamentos.departamento', 'grupo_ocupacionals.grupo')
            ->get();
        
        return response()->json(['grupos'=>$departamento,'ok'=>$ok]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $licenciasPorDepartamento = DB::table('departamentos')
            ->join('empleados', 'departamentos.id', '=', 'empleados.departamento_id')
            ->join('licencias', 'empleados.id', '=', 'licencias.empleado_id')
            ->select('departamentos.departamento', DB::raw('MONTH(licencias.fecha) as mes'))
            ->orderBy('mes')
            ->get();

        return view('departamento.index',compact('licenciasPorDepartamento'));
    
/*
            ->join('empleados', 'departamentos.id', '=', 'empleados.departamento_id')
            ->join('licencias', 'empleados.id', '=', 'licencias.empleado_id')
            ->select('departamentos.departamento', DB::raw('MONTH(licencias.fecha) as mes, count(fecha) as cantidad_por_mes'))
            ->groupBy('mes')
            ->orderBy('fecha')
            ->get();
        */
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
            if ($request->input('departamento')!=null) {
                $grupo = GrupoOcupacional::find($request->input('dgrupo'));
                if ($grupo) {
                    DB::table('departamentos')
                    ->where('id', $request->input('departamento_id'))
                    ->update(array('departamento' => $request->input('departamento'), 'grupo_id' => $request->input('dgrupo')));
                    $ok = true;
                    return response()->json(['ok'=>$ok]);
                }else{
                    return response()->json(['respuesta'=>'departamento no encontrado']);
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
        $departamentoDel = Departamento::destroy($id);
        if ($departamentoDel) {
            $ok = true;
            return response()->json(['ok'=>$ok]);    
        }
    }
}
