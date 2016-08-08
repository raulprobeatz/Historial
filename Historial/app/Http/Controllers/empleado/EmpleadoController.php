<?php

namespace HistoriaOcupacional\Http\Controllers\empleado;

use Illuminate\Http\Request;
use HistoriaOcupacional\Http\Controllers\Controller;
use HistoriaOcupacional\Http\Requests;
use HistoriaOcupacional\Empleado;
use HistoriaOcupacional\AntecedentesPatologicosPersonales;
use HistoriaOcupacional\Http\Requests\InsertEmpleadoRequest;
use HistoriaOcupacional\Documento;
use HistoriaOcupacional\Departamento;
use Storage;
use Session;
use DB;

class EmpleadoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleado = Empleado::paginate(5);
        return view('empleado.mostrar',compact('empleado'));
    }

    public function perfil($id){
        $empleados = DB::table('empleados')
            ->select('id', 'nombre','apellido','edad','sexo','foto')
            ->paginate(4);
        return view('empleado.perfil',compact('empleados'));
    }
    public function subirFoto(Request $request){
         return response()->json($request->file('foto'));
    }

    public function filtrar($dato){
        //$empleado = Empleado::paginate(5)
        if (empty($dato)) {
            return response()->json(['respuesta'=>'vacio']);
        }else{
            $empleado = DB::table('empleados')->where('nombre','like','%'.$dato.'%')->paginate(5);
            return response()->json($empleado);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamento = Departamento::all();
        return view('empleado.formulario',compact('departamento'));
    }

    public function servicio(Request $request, $id){
        
        //debo preguntar si el empleado con ese id es econtrado.
        //si no los es, mandar un response de que no los es.
        $empleado = Empleado::find($id);
        if ($empleado) {
            return response()->json(
                ['antecedentesPersonales'=>$empleado->antecedentesPatologicosPersonales()->get(),
                'antecedentesFamiliares'=>$empleado->antecedentesPatologicosFamiliares()->get(),
                'carrera'=>$empleado->carrera()->get(),
                'documento'=>$empleado->documento()->get(),
                'licencias'=>$empleado->licencia()->get(),
                'experienciasLaborales'=>$empleado->experienciasLaborales()->get(),
                'factoresDeRiesgos'=>$empleado->factoresDeRiesgos()->get(),
                'habitosToxicos'=>$empleado->habitosToxicos()->get(),
                'puestoDeTrabajo'=>$empleado->puestoDeTrabajo()->get()
                ]    
            );
        }else{
            return response()->json([
                'respuesta' => 'no encontrado'
                ]
            );
        }
    }
    public function guardarDocumentos(Request $request){
        
        $id = 0;
        if ($request->hasFile('documentofile')) {
            $file = $request->file('documentofile');
            $filename = $file->getClientOriginalName();
            $destinoDoc = 'doc/'.$filename;
            
            $empleado = Empleado::find($request->input('id_empleado'));
            
            if (file_exists($destinoDoc)) {
                $uploaded = Storage::put($destinoDoc,file_get_contents($file->getRealPath()));
            }else{
                $uploaded = Storage::put($destinoDoc,file_get_contents($file->getRealPath()));
                $doc = new Documento([
               'ruta' => $destinoDoc,
               'descripsion' => $request->input('descripsion'),                    
                ]);
                if ($uploaded) {
                    $empleado->documento()->save($doc);
                }    
            }
            //return response()->json(['af'=>$empleado,'as'=>$request->input('id_empleado')]);
            $documento = $empleado->documento()->paginate(2);
            $documento->setPath('documento/'.$request->input('id_empleado'));
            return view('empleado.documentos',compact('documento','id','empleado'));
            
        }
        
              
        /*

        $empleado = Empleado::find($request->input('id_empleado'));
             
        if ($empleado) {
            $doc = new Documento([
                'descripsion' => $request->input('descripsion'),
                'ruta' => '',
                'empleado_id' => $request->input('id_empleado'),
                
            ]);
            $empleado->documento()->save($experiencias);
        }else{
            return response()->json([
               'respuesta'=>'empleado no econtrado'
            ]);    
        }*/

    }
    public function subirDocumentos($id){
        //return response()->json($id);
        $empleado = Empleado::find($id);
        $documento = $empleado->documento()->paginate(2);
        $documento->setPath($id);
        return view('empleado.documentos',compact('documento','id','empleado')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InsertEmpleadoRequest $request)
    {
        $emp = Empleado::find($request->input('id_empleado'));
        if ($request->input('id_empleado') == 0 || $emp === null) {
            $emp = new Empleado([
            'nombre'=>$request->input('nombre'),'apellido'=>$request->input('apellido'),'edad'=>$request->input('edad'),
            'cedula'=>$request->input('cedula'),'sexo'=>$request->input('sexo'),'estado_civil'=>$request->input('estado_civil'),
            'telefono_casa'=>$request->input('telefono_casa'),'telefono_movil'=>$request->input('telefono_movil'),'numero_dependientes'=>$request->input('numero_dependientes'),
            'direccion'=>$request->input('direccion'),'tiempo_traslado'=>$request->input('tiempo_traslado'),
            'seguro_medico'=>$request->input('seguro_medico'),
            'nss'=>$request->input('nss'),'lugar_origen'=>$request->input('lugar_origen'),'donde_esta'=>$request->input('donde_esta'),
            ]);
                
            $dep = Departamento::find($request->input('departamento'));
            if ($dep){
                $dep->empleado()->save($emp);
                if ($dep) {
                    Session::flash('msg','Empleado agregado correctamente');
                    return response()->json(["agregado"=>"ok"]);
                }
            }    
        }else{
            Session::flash('msg-err','Esta intentando agregar el mismo empleado intente agregarlo ahora');
            return response()->json(['existe'=>'existe']);
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
        $empleados = Empleado::find($id);
        return view('empleado.detalles',compact('empleados'));

        //$empleados = Empleado::find($id);
        //$vista = \View::make('empleado.reporte',compact('empleados'))->render();
        //$pdf = \App::make('dompdf.wrapper');
        //$pdf->loadHTML($vista);
        //return $pdf->stream();
    }
    


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departamento = Departamento::all();
        $empleados = Empleado::find($id);   
        return view('empleado.formulario',compact('empleados','departamento'));
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
        $empleado = Empleado::find($request->input('id_empleado'));
        if ($empleado) {
            $empleado->fill([
            'nombre'=>$request->input('nombre'),'apellido'=>$request->input('apellido'),'edad'=>$request->input('edad'),
            'cedula'=>$request->input('cedula'),'sexo'=>$request->input('sexo'),'estado_civil'=>$request->input('estado_civil'),
            'telefono_casa'=>$request->input('telefono_casa'),'telefono_movil'=>$request->input('telefono_movil'),'numero_dependientes'=>$request->input('numero_dependientes'),
            'direccion'=>$request->input('direccion'),'tiempo_traslado'=>$request->input('tiempo_traslado'),
            'seguro_medico'=>$request->input('seguro_medico'),
            'nss'=>$request->input('nss'),'lugar_origen'=>$request->input('lugar_origen'),'donde_esta'=>$request->input('donde_esta'),
            ]);
            $empleado->save();
            if ($empleado) {
                Session::flash('msg','Empleado modificado correctamente');
                return response()->json(['respuesta'=>'Empleado modificado']);
            }
        }else{
            Session::flash('msg-err','Debe seleccionar un empleado a modifcar');
            return response()->json(['no-empleado'=>'Empleado no seleccionado']);
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
        Empleado::destroy($id);
        Session::flash('msg','Empleado eliminado correctamente');
        return response()->json(['respuesta'=>'Empleado eliminado']);
    }
}
