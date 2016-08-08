@extends('layout.layout')

@section('contenido')
    <nav class="navbar navbar-primary">
        <div class="container-fluid">
            <div class="navbar-header">
                @if(isset($empleados)) <a class="navbar-brand" href=<?php echo
                    '/empleado/'.$empleados->id;?>> <i
                    class="glyphicon glyphicon-search"></i>
                </a>
                <a class="navbar-brand" href='/empleado/create'>
                    <i
                    class="glyphicon glyphicon-plus-sign"></i>
                </a>
                <p class="navbar-text">/</p>
                <p class="navbar-text">{{isset($empleados->nombre)?
                    $empleados->nombre:'' }}</p>
                <p class="navbar-text">{{isset($empleados->apellido)?
                    $empleados->apellido:''}}</p>
                <p class="navbar-text">{{isset($empleados->cedula)?
                    $empleados->cedula:''}}</p>
                @endif
            </div>
        </div>
    </nav>
    <div id="alerta_empleados" class="alert alert-danger" role="alert" style="display:none;position:static;z-index:5px;">
    <span id="alerta_empleados_span"></span></div>
    <div class="panel-group" id="accordion"
        style="overflow: scroll; height: 510px;" role="tablist"
        aria-multiselectable="true">
        <div class="panel panel-primary">
            <!--panel heading-->
            <div class="panel-heading" role="tab">
                <h6 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion"
                        href="#collapseOne" aria-expanded="true"
                        aria-controls="collapseOne">Empleado </a>
                </h6>
            </div>
            <!-- /.panel-heading -->
            <div id="collapseOne" class="panel-collapse collapse in"
                role="tabpanel" aria-labelledby="headingOne">
                <!-- .panel-body -->
                <div class="panel-body">
                    <form class="form-horizontal" role="form" id="form_empleado">
                        @if(isset($empleados->id))
                            @if($empleados->id>0)
                              <div id="metodo_empleado">
                                  <input type='hidden' name='_method' value='PUT'>
                              </div>  
                            @endif
                        @endif
                        
                        <input type="hidden" id="token" name="_token"
                            value="{{ csrf_token() }}" /> 
                            <input type="hidden"
                            class="id_empleado" name="id_empleado"
                            value="{{isset($empleados->id)? $empleados->id : '0' }}" />
                        <div class="form-group">
                            <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-6">
                                <input type="text" id="emp_nombre" name="nombre"
                                    class="form-control" placeholder="Nombre"
                                    value="{{isset($empleados->nombre)? $empleados->nombre:'' }}">
                            </div>
                            <span id="msg-nombre" style="color: red;"></span>
                        </div>
                        <div class="form-group">
                            <label for="apellido" class="col-sm-2 control-label">Apellido</label>
                            <div class="col-sm-6">
                                <input type="text" id="emp_apellido" name="apellido"
                                    class="form-control" placeholder="Apellido"
                                    value="{{isset($empleados->apellido)? $empleados->apellido:''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="edad" class="col-sm-2 control-label">Edad</label>
                            <div class="col-sm-3">
                                <input type="text" id="emp_edad" name="edad"
                                    class="form-control" placeholder="Edad"
                                    value="{{isset($empleados->edad)? $empleados->edad:''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cedula" class="col-sm-2 control-label">Cédula</label>
                            <div class="col-sm-3">
                                <input type="text" id="emp_cedula" name="cedula"
                                    class="form-control" placeholder="Cédula"
                                    value="{{isset($empleados->cedula)? $empleados->cedula:''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="departamento" class="col-sm-2 control-label">Departamento</label>
                            <div class="col-sm-3">
                                <select id="departamento" name="departamento"
                                    class="form-control"> @foreach($departamento as $dep)
                                    <option value="{{$dep->id}}">{{$dep->departamento}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sexo" class="col-sm-2 control-label">Sexo</label>
                            <div class="col-sm-6">
                                <label class="radio-inline"> <input type="radio"
                                    id="emp_sexo_m" name="sexo" value="M" />Masculino
                                </label> <label class="radio-inline"> <input type="radio"
                                    id="emp_sexo_f" name="sexo" value="F" />Femenino
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="estado_civil" class="col-sm-2 control-label">Estado
                                Civil</label>
                            <div class="col-sm-6">
                                <label class="radio-inline"> <input type="radio"
                                    id="emp_estado_civil_c" name="estado_civil" value="casado" />Casado
                                </label> <label class="radio-inline"> <input type="radio"
                                    id="emp_estado_civil_s" name="estado_civil" value="soltero" />Soltero
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telefono_recidencial" class="col-sm-2 control-label">Teléfono</label>
                            <div class="col-sm-3">
                                <input type="text" id="emp_telefono_casa" name="telefono_casa"
                                    class="form-control" placeholder="Teléfono"
                                    value="{{isset($empleados->telefono_casa)? $empleados->telefono_casa:''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telefono_movil" class="col-sm-2 control-label">Celular</label>
                            <div class="col-sm-3">
                                <input type="text" id="emp_telefono_movil" name="telefono_movil"
                                    class="form-control" placeholder="Celular"
                                    value="{{isset($empleados->telefono_movil)? $empleados->telefono_movil:''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="direccion" class="col-sm-2 control-label">Dirección</label>
                            <div class="col-sm-6">
                                <input type="text" id="emp_direccion" name="direccion"
                                    class="form-control" placeholder="Dirección"
                                    value="{{isset($empleados->direccion)? $empleados->direccion:''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="numero_dependientes" class="col-sm-2 control-label">Número
                                de dependientes</label>
                            <div class="col-sm-3">
                                <input type="text" id="emp_numero_dependientes"
                                    name="numero_dependientes" class="form-control"
                                    placeholder="Número de dependientes"
                                    value="{{isset($empleados->numero_dependientes)? $empleados->numero_dependientes:''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tiempo_traslado" class="col-sm-2 control-label">Tiempo
                                de traslado</label>
                            <div class="col-sm-3">
                                <input type="text" id="emp_tiempo_traslado"
                                    name="tiempo_traslado" class="form-control"
                                    placeholder="Tiempo de traslado"
                                    value="{{isset($empleados->tiempo_traslado)? $empleados->tiempo_traslado:''}}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="numero_dependientes" class="col-sm-2 control-label">Seguro
                                médico</label>
                            <div class="col-sm-3">
                                <input type="text" id="seguro_medico" name="seguro_medico"
                                    class="form-control" placeholder="Seguro médico"
                                    value="{{isset($empleados->seguro_medico)? $empleados->seguro_medico:''}}">
                            </div>
                            <span id="msg-seguro_medico" style="color: red;"></span>
                        </div>
                        <div class="form-group">
                            <label for="nss" class="col-sm-2 control-label">NSS</label>
                            <div class="col-sm-3">
                                <input type="text" id="nss" name="nss" class="form-control"
                                    placeholder="Numero NSS"
                                    value="{{isset($empleados->nss)? $empleados->nss:''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lugar_origen" class="col-sm-2 control-label">Lugar
                                de origen</label>
                            <div class="col-sm-3">
                                <input type="text" id="lugar_origen" name="lugar_origen"
                                    class="form-control" placeholder="Lugar de origen"
                                    value="{{isset($empleados->lugar_origen)? $empleados->lugar_origen:''}}">
                            </div>
                            <span id="msg-lugar_origen" style="color: red;"></span>
                        </div>
                        <div class="form-group">
                            <label for="donde_esta" class="col-sm-2 control-label">Donde
                                esta</label>
                            <div class="col-sm-3">
                                <input type="text" id="donde_esta" name="donde_esta"
                                    class="form-control" placeholder="Donde esta"
                                    value="{{isset($empleados->donde_esta)? $empleados->donde_esta:''}}">
                            </div>
                        </div>



                        <!-- div class="form-group">
                            <label for="foto" class="col-sm-2 control-label">Foto</label>
                            <div class="col-sm-6">
                                <input type="file" name="foto">
                            </div>
                            <span id="msg-foto" style="color: red;"></span>
                        </div -->
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
                                <button type="button" class="btn btn-primary"
                                    id="agregarEmpleado">Agregar</button>
                                <button id="modificarEmpleado" type="button" class="btn btn-primary" id="">Modificar</button>
                                <button type="submit" class="btn btn-primary">Cancelar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /formulario para empleados-->

        <!--formulario para antecedentes patologicos personales-->
        <!-- /.panel -->
        <div class="panel panel-primary">
            <!-- .panel-heading -->
            <div class="panel-heading" role="tab">
                <h6 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse"
                        data-parent="#accordion" href="#collapseTwo" aria-expanded="false"
                        aria-controls="collapseTwo">Antecedentes patologicos
                        personales </a>
                </h6>
            </div>
            <!-- /.panel-heading -->
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                aria-labelledby="headingTwo">
                <div class="panel-body">
                    <div id="personales-alert" style="display: none;"
                        class="alert alert-danger" role="alert">
                        <span id="msg-pcontrol" style="color: red;"></span> <span
                            id="msg-ptratado" style="color: red;"></span>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <form class="form-horizontal" role="form"
                                id="form_antecedentes_patologicos_personales">
                                <input type="hidden" id="token" name="_token"
                                    value="{{ csrf_token() }}" />
                                <div id="metodo_antecentes_personales">
                                    <input type='hidden' name='_method' value='PUT'>
                                </div>
                                <input type="hidden" class="id_empleado" name="id_empleado"
                                    value={{isset($empleados->id)? $empleados->id:''}} /> <input
                                    type="hidden" id="personales_id" name="personales_id" />
                                <div class="form-group">
                                    <label for="factor" class="col-sm-3 control-label">Patología</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="personales_factor" name="factor"
                                            class="form-control" placeholder="Patología">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="diagnostico" class="col-sm-3 control-label">Diagnóstico</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="personales_diagnostico"
                                            name="diagnostico" class="form-control"
                                            placeholder="Diagnóstico">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="control" class="col-sm-3 control-label">Control</label>
                                    <div class="col-sm-8">
                                        <label class="radio-inline"> <input type="radio"
                                            id="personales_control_si" name="control" value="Si" />Sí
                                        </label> <label class="radio-inline"> <input type="radio"
                                            id="personales_control_no" name="control" value="No" />No
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tratado" class="col-sm-3 control-label">Tratado</label>
                                    <div class="col-sm-8">
                                        <label class="radio-inline"> <input type="radio"
                                            name="tratado" id="personales_tratado_si" value="Si" />Sí
                                        </label> <label class="radio-inline"> <input type="radio"
                                            name="tratado" value="No" id="personales_tratado_no" />No
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-3"></div>
                                    <div id="grupo_antecedentes_personales" class="col-sm-8">
                                        <button id="agregarAntecedentesPersonales" type="button"
                                            class="btn btn-primary">Agregar</button>
                                        <button id="modificarAntecedentesPersonales" type="button"
                                            class="btn btn-primary">modificar</button>
                                        <button id="cancelarAntecedentesPersonales" type="button"
                                            class="btn btn-primary">Cancelar</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="col-sm-7">
                            <div class="table-responsive">
                                <table
                                    class="table-bordered table-condensed table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Patología</th>
                                            <th>Diagnóstico</th>
                                            <th>Control</th>
                                            <th>Tratado</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="aPpTbody">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
        <!-- /.panel -->
        <!-- /formulario para antecedentes patologicos personales-->

        <!--formulario para antecedentes patologicos familiares-->
        <div class="panel panel-primary">
            <div class="panel-heading" role="tab">
                <h6 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse"
                        data-parent="#accordion" href="#collapseThree"
                        aria-expanded="false" aria-controls="collapseThree">Antecedentes
                        patológicos familiares </a>
                </h6>
            </div>
            <!-- /.panel-heading -->
            <div id="collapseThree" class="panel-collapse collapse"
                role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                    <div id="familiares-alert" style="display: none;"
                        class="alert alert-danger" role="alert">
                        <span id="msg-ftipo" style="color: red;"></span> <span
                            id="msg-fdiagnosticado" style="color: red;"></span> <span
                            id="msg-fcontrol" style="color: red;"></span> <span
                            id="msg-ftratado" style="color: red;"></span>
                    </div>

                    <div class="row">
                        <div class="col-sm-5">
                            <form class="form-horizontal" method="POST" role="form"
                                id="form_antecedentes_patologicos_familiares">
                                <div id="metodo_antecentes_familiares">
                                    <input type='hidden' name='_method' value='PUT'>
                                </div>
                                <input type="hidden" class="id_empleado" name="id_empleado"
                                    value={{isset($empleados->id)? $empleados->id:''}} /> <input
                                    type="hidden" id="familiares_id" name="familiares_id" />
                                <div class="form-group">
                                    <label for="enfermedad" class="col-sm-3 control-label">Enfermedad</label>
                                    <div class="col-sm-8">
                                        <input id="familiares_enfermedad" type="text"
                                            name="enfermedad" class="form-control"
                                            placeholder="Enfermedad">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tipo" class="col-sm-3 control-label">Tipo</label>
                                    <div class="col-sm-8">
                                        <label class="radio-inline"> <input
                                            id="familiares_tipo_materna" type="radio" name="tipo"
                                            value="Materna" />Materna
                                        </label> <label class="radio-inline"> <input
                                            id="familiares_tipo_paterna" type="radio" name="tipo"
                                            value="Paterna" />Paterna
                                        </label> <label class="radio-inline"> <input
                                            id="familiares_tipo_hijos" type="radio" name="tipo"
                                            value="hijos" />Hijos
                                        </label> <label class="radio-inline"> <input
                                            id="familiares_tipo_otros" type="radio" name="tipo"
                                            value="Otros familiares" />Otros familiares
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="diagnosticado" class="col-sm-3 control-label">Diagnosticado
                                    </label>
                                    <div class="col-sm-8">
                                        <label class="radio-inline"> <input
                                            id="familiares_diagnosticado_si" type="radio"
                                            name="diagnosticado" value="Si" />Sí
                                        </label> <label class="radio-inline"> <input
                                            id="familiares_diagnosticado_no" type="radio"
                                            name="diagnosticado" value="No" />No
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="control" class="col-sm-3 control-label">Control</label>
                                    <div class="col-sm-8">
                                        <label class="radio-inline"> <input
                                            id="familiares_control_si" type="radio" name="control"
                                            value="Si" />Sí
                                        </label> <label class="radio-inline"> <input
                                            id="familiares_control_no" type="radio" name="control"
                                            value="No" />No
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tratado" class="col-sm-3 control-label">Tratado</label>
                                    <div class="col-sm-8">
                                        <label class="radio-inline"> <input
                                            id="familiares_tratado_si" type="radio" name="tratado"
                                            value="Si" />Sí
                                        </label> <label class="radio-inline"> <input
                                            id="familiares_tratado_no" type="radio" name="tratado"
                                            value="No" />No
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-8">
                                        <button id="agregarAntecedentesFamiliares" type="button"
                                            class="btn btn-primary">Agregar</button>
                                        <button id="modificarAntecedentesFamiliares" type="button"
                                            class="btn btn-primary">Modificar</button>
                                        <button id="cancelarAntecedentesFamiliares" type="button"
                                            class="btn btn-primary">Cancelar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.col-lg-8 (nested) -->
                        <div class="col-sm-7">
                            <div class="table-responsive">
                                <table
                                    class="table-bordered table-condensed table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Enfermedad</th>
                                            <th>Tipo</th>
                                            <th>Diagnosticodo</th>
                                            <th>Control</th>
                                            <th>Tratado</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="aPfTbody">
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.col-lg-4 (nested) -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
        <!-- /.panel -->
        <!-- /formulario para antecedentes patologicos familiares-->

        <!--formulario para experiencias laborales-->
        <!-- /.panel -->
        <div class="panel panel-primary">
            <div class="panel-heading" role="tab">
                <h6 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse"
                        data-parent="#accordion" href="#collapseFour"
                        aria-expanded="false" aria-controls="collapseFour">Experiencia
                        Laboral</a>
                </h6>
            </div>
            <!-- /.panel-heading -->
            <div id="collapseFour" class="panel-collapse collapse"
                role="tabpanel" aria-labelledby="headingFour">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-5">
                            <form class="form-horizontal" role="form"
                                id="form_experiencias_laborales">
                                <div id="metodo_experiencias">
                                    <input type='hidden' name='_method' value='PUT'>
                                </div>
                                <input type="hidden" class="id_empleado" name="id_empleado"
                                    value={{isset($empleados->id)? $empleados->id:''}} /> <input
                                    type="hidden" id="experiencias_id" name="experiencias_id" />
                                <div class="form-group">
                                    <label for="experiencia" class="col-sm-3 control-label">Experiencia</label>
                                    <div class="col-sm-8">
                                        <input id="experiencia" type="text" name="experiencia"
                                            class="form-control" placeholder="Experiencia">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="empresa" class="col-sm-3 control-label">Empresa</label>
                                    <div class="col-sm-8">
                                        <input id="empresa" type="text" name="empresa"
                                            class="form-control" placeholder="Empresa">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tiempo" class="col-sm-3 control-label">Tiempo</label>
                                    <div class="col-sm-8">
                                        <input id="tiempo" type="text" name="tiempo"
                                            class="form-control" placeholder="Tiempo">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="puesto" class="col-sm-3 control-label">Puesto</label>
                                    <div class="col-sm-8">
                                        <input id="puesto" type="text" name="puesto"
                                            class="form-control" placeholder="Puesto">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="epp_usado" class="col-sm-3 control-label">EPP
                                        Usados</label>
                                    <div class="col-sm-8">
                                        <input id="epp_usado" type="text" name="epp_usado"
                                            class="form-control" placeholder="EPP Usados">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="factores_riesgos" class="col-sm-3 control-label">Factores
                                        de riesgos</label>
                                    <div class="col-sm-8">
                                        <textarea id="factores_riesgos" name="factores_riesgos"
                                            class="form-control" cols="10" rows="7"
                                            placeholder="Factores de riesgos"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-8">
                                        <button type="button" id="agregar_experiencias"
                                            class="btn btn-primary">Agregar</button>
                                        <button id="modificarExperiencias" type="button"
                                            class="btn btn-primary">Modificar</button>
                                        <button id="cancelarExperiencias" type="button"
                                            class="btn btn-primary">Cancelar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.col-lg-8 (nested) -->
                        <div class="col-sm-7">
                            <div class="table-responsive">
                                <table
                                    class="table-bordered table-condensed table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Experiencia</th>
                                            <th>Empresa</th>
                                            <th>Tiempo</th>
                                            <th>Puesto</th>
                                            <th>EPP Usados</th>
                                            <th>Factores de Riesgos</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="exPLTbody">
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.col-lg-4 (nested) -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </div>
        <!-- /.panel-body -->
        <!-- /.panel -->
        <!-- /formulario para experiencias laborales-->

        <!--formulario para carrera-->
        <!-- /.panel -->
        <div class="panel panel-primary">
            <div class="panel-heading" role="tab">
                <h6 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse"
                        data-parent="#accordion" href="#collapseFive"
                        aria-expanded="false" aria-controls="collapseFive">Carrera</a>
                </h6>
            </div>
            <!-- /.panel-heading -->
            <div id="collapseFive" class="panel-collapse collapse"
                role="tabpanel" aria-labelledby="headingFive">
                <div class="panel-body">
                    <div id="personales-alert" style="display: none;"
                        class="alert alert-danger" role="alert">
                        <span id="msg-pcontrol" style="color: red;"></span> <span
                            id="msg-ptratado" style="color: red;"></span>
                    </div>

                    <div class="row">
                        <div class="col-sm-5">
                            <form id="form_carreras" class="form-horizontal" role="form">
                                <div id="metodo_carreras">
                                    <input type='hidden' name='_method' value='PUT'>
                                </div>
                                <input type="hidden" class="id_empleado" name="id_empleado"
                                    value={{isset($empleados->id)? $empleados->id:''}} /> <input
                                    type="hidden" id="carreras_id" name="carreras_id" />

                                <div class="form-group">
                                    <label for="carrera" class="col-sm-3 control-label">Carrera</label>
                                    <div class="col-sm-8">
                                        <input id="carrera" type="text" name="carrera"
                                            class="form-control" placeholder="Carrera">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="institucion" class="col-sm-3 control-label">Institución</label>
                                    <div class="col-sm-8">
                                        <input id="institucion" type="text" name="institucion"
                                            class="form-control" placeholder="Institución">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-8">
                                        <button id="agregar_carreras" type="button"
                                            class="btn btn-primary">Agregar</button>
                                        <button id="modificarCarrera" type="button"
                                            class="btn btn-primary">Modificar</button>
                                        <button id="cancelarCarreras" type="button"
                                            class="btn btn-primary">Cancelar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.col-lg-8 (nested) -->
                        <div class="col-sm-7">
                            <div class="table-responsive">
                                <table
                                    class="table-bordered table-condensed table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Carrera</th>
                                            <th>Institución</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="crrTbody">
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.col-lg-4 (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>
        </div>
        <!-- /.panel -->
        <!-- /formulario para carrera-->

        <!--formulario para puesto de trabajo-->
        <!-- /.panel -->
        <div class="panel panel-primary">
            <div class="panel-heading" role="tab">
                <h6 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse"
                        data-parent="#accordion" href="#collapseSix" aria-expanded="false"
                        aria-controls="collapseSix">Puesto de trabajo</a>
                </h6>
            </div>
            <!-- /.panel-heading -->
            <div id="collapseSix" class="panel-collapse collapse" role="tabpanel"
                aria-labelledby="headingSix">
                <div class="panel-body">
                    <div id="puesto-alert" style="display: none;"
                        class="alert alert-danger" role="alert">
                        <span id="msg-phorario" style="color: red;"></span>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <form id="form_puestos" class="form-horizontal" role="form">
                                <div id="metodo_puestos">
                                    <input type='hidden' name='_method' value='PUT'>
                                </div>
                                <input type="hidden" class="id_empleado" name="id_empleado"
                                    value="{{isset($empleados->id)? $empleados->id:''}}" /> <input
                                    type="hidden" id="puestos_id" name="puestos_id" />

                                <div class="form-group">
                                    <label for="puesto" class="col-sm-3 control-label">Puesto</label>
                                    <div class="col-sm-8">
                                        <input id="puestos" type="text" name="puestos"
                                            class="form-control" placeholder="Puesto">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jornada" class="col-sm-3 control-label">Jornada</label>
                                    <div class="col-sm-8">
                                        <input id="jornada" type="text" name="jornada"
                                            class="form-control" placeholder="Jornada">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="horario" class="col-sm-3 control-label">Horario</label>
                                    <div class="col-sm-8">
                                        <label class="radio-inline"> <input id="horario_fijo"
                                            type="radio" name="horario" value="Fijo" />Fijo
                                        </label> <label class="radio-inline"> <input
                                            id="horario_variado" type="radio" name="horario"
                                            value="Variado" />Variado
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="area_vicerrectoria" class="col-sm-3 control-label">Dependencia</label>
                                    <div class="col-sm-8">
                                        <input id="area_vicerrectoria" type="text"
                                            name="area_vicerrectoria" class="form-control"
                                            placeholder="Dependencia">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-8">
                                        <button id="agregar_puestos" type="button"
                                            class="btn btn-primary">Agregar</button>
                                        <button id="modificarPuesto" type="button"
                                            class="btn btn-primary">Modificar</button>
                                        <button id="cancelarPuesto" type="button"
                                            class="btn btn-primary">Cancelar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.col-lg-8 (nested) -->
                        <div class="col-sm-7">
                            <div class="table-bordered table-responsive">
                                <table class="table-condensed table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Puesto</th>
                                            <th>Jornada</th>
                                            <th>Horario</th>
                                            <th>Dependencia</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="psttTbody">
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.col-lg-4 (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>
        </div>
        <!-- /.panel -->
        <!-- /formulario para puesto de trabajo-->

        <!--formulario para habitos toxico-->
        <!-- /.panel -->
        <div class="panel panel-primary">
            <div class="panel-heading" role="tab">
                <h6 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse"
                        data-parent="#accordion" href="#collapseSeven"
                        aria-expanded="false" aria-controls="collapseSeven">Hábitos
                        Toxicos</a>
                </h6>
            </div>
            <!-- /.panel-heading -->
            <div id="collapseSeven" class="panel-collapse collapse"
                role="tabpanel" aria-labelledby="headingSeven">
                <div class="panel-body">
                    <div id="personales-alert" style="display: none;"
                        class="alert alert-danger" role="alert">
                        <span id="msg-pcontrol" style="color: red;"></span> <span
                            id="msg-ptratado" style="color: red;"></span>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <form id="form_habitos" class="form-horizontal" role="form">
                                <div id="metodo_habitos">
                                    <input type='hidden' name='_method' value='PUT'>
                                </div>
                                <input type="hidden" class="id_empleado" name="id_empleado"
                                    value={{isset($empleados->id)? $empleados->id:''}} /> <input
                                    type="hidden" id="habitos_id" name="habitos_id" />

                                <div class="form-group">
                                    <label for="habito" class="col-sm-3 control-label">Hábito</label>
                                    <div class="col-sm-8">
                                        <input id="habito" type="text" name="habito"
                                            class="form-control" placeholder="Hábito">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="frecuencia" class="col-sm-3 control-label">Frecuencia</label>
                                    <div class="col-sm-8">
                                        <select id="frecuencia" name="frecuencia" class="form-control">
                                            <option value="Nunca">Nuca</option>
                                            <option value="Ex practicante">Ex practicante</option>
                                            <option value="Esporadico">Esporadico</option>
                                            <option value="Habitual">Habitual</option>
                                            <option value="Fines de semana">Fines de semana</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-8">
                                        <button id="agregar_habitos" type="button"
                                            class="btn btn-primary">Agregar</button>
                                        <button id="modificar_habitos" type="button"
                                            class="btn btn-primary">Modificar</button>
                                        <button id="cancelar_habitos" type="button"
                                            class="btn btn-primary">Cancelar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.col-lg-8 (nested) -->
                        <div class="col-sm-7">
                            <div class="table-bordered table-responsive">
                                <table class="table-condensed table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Hábito</th>
                                            <th>Frecuencia</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="hbtTTbody">
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.col-lg-4 (nested) -->
                    </div>
                    <!-- /.row -->
                    <!-- /.panel-body -->
                </div>
            </div>
            <!-- /.panel -->
            <!-- /formulario para habitos toxico-->
            <!--formulario para factores de riesgos-->
            <!-- /.panel -->
            <div class="panel panel-primary">
                <div class="panel-heading" role="tab">
                    <h6 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse"
                            data-parent="#accordion" href="#collapseEight"
                            aria-expanded="false" aria-controls="collapseEight">Factores
                            de riesgos </a>
                    </h6>
                </div>
                <!-- /.panel-heading -->
                <div id="collapseEight" class="panel-collapse collapse"
                    role="tabpanel" aria-labelledby="headingEight">
                    <div class="panel-body">
                        <div id="factores-alert" style="display: none;"
                            class="alert alert-danger" role="alert">
                            <span id="msg-ffdiagnosticado" style="color: red;"></span> <span
                                id="msg-ffcontrol" style="color: red;"></span>
                        </div>

                        <div class="row">
                            <div class="col-sm-5">
                                <form id="form_factores" class="form-horizontal" role="form">
                                    <div id="metodo_factores">
                                        <input type='hidden' name='_method' value='PUT'>
                                    </div>
                                    <input type="hidden" class="id_empleado" name="id_empleado"
                                        value={{isset($empleados->id)? $empleados->id:''}} />
                                    <input type="hidden" id="factores_id" name="factores_id" />

                                    <div class="form-group">
                                        <label for="factor" class="col-sm-3 control-label">Factor</label>
                                        <div class="col-sm-8">
                                            <select id="factor" name="factor" class="form-control">
                                                <option value="Mayor de 45 años">Mayor de 45 años</option>
                                                <option value="Hipertension arterial">Hipertensión
                                                    arterial</option>
                                                <option value="Tabaco">Tabaco</option>
                                                <option value="Trauma ocular">Trauma ocular</option>
                                                <option value="Mala alimentacion">Mala alimentación</option>
                                                <option value="Glaucoma">Glaucoma</option>
                                                <option value="Diabetes">Diabetes</option>
                                                <option value="Uso corticoesteroides">Uso
                                                    corticoesteroides</option>
                                                <option value="Infecciones de transmision sexual">Infecciones
                                                    de transmision sexual</option>
                                                <option value="Exposicion al sol">Exposición al sol</option>
                                                <option
                                                    value="Exposicion a particulas al viajar a altas velocidades">Exposición
                                                    a particulas al viajar a altas velocidades</option>
                                                <option value="Exposicion a la luz ultravioleta">Exposición
                                                    a la luz ultravioleta</option>
                                                <option value="Exposicion a la luz inflarroja">Exposición
                                                    a la luz inflarroja</option>
                                                <option value="Exposicion a la luz intensa">Exposición
                                                    a la luz intensa</option>
                                                <option value="Uso de drogas ilegales">Uso de
                                                    drogas ilegales</option>
                                                <option value="Sustancias quimicas acidas">Sustancias
                                                    químicas ácidas</option>
                                                <option value="Sustancias quimicas bases fuertes">Sustancias
                                                    químicas bases fuertes</option>
                                                <option value="Extres">Extres</option>
                                                <option value="Anticonceptivos orales">Anticonceptivos
                                                    orales</option>
                                                <option value="Extres">Antecedentes familiares
                                                    muerte súbita</option>
                                                <option value="Uso de drogas">Uso de drogas</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="control" class="col-sm-3 control-label">Control</label>
                                        <div class="col-sm-8">
                                            <label class="radio-inline"> <input
                                                id="factor_control_si" type="radio" name="control"
                                                value="Si" />Sí
                                            </label> <label class="radio-inline"> <input
                                                id="factor_control_no" type="radio" name="control"
                                                value="No" />No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="diagnosticado" class="col-sm-3 control-label">Diagnosticado</label>
                                        <div class="col-sm-8">
                                            <label class="radio-inline"> <input
                                                id="factor_diagnosticado_si" type="radio"
                                                name="diagnosticado" value="Si" />Sí
                                            </label> <label class="radio-inline"> <input
                                                id="factor_diagnosticado_no" type="radio"
                                                name="diagnosticado" value="No" />No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-8">
                                            <button id="agregar_factores" type="button"
                                                class="btn btn-primary">Agregar</button>
                                            <button id="modificar_factores" type="button"
                                                class="btn btn-primary">Modificar</button>
                                            <button id="cancelar_factores" type="button"
                                                class="btn btn-primary">Cancelar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.col-lg-8 (nested) -->
                            <div class="col-sm-7">
                                <div class="table-responsive">
                                    <table
                                        class="table-bordered table-condensed table table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Factor</th>
                                                <th>Control</th>
                                                <th>Diagnosticado</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="ftrrTTbody">
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.col-lg-4 (nested) -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
                <!-- /formulario para factores de riesgos-->
            </div>
            <!--formulario para licencias medicas-->
            <!-- /.panel -->
            <div class="panel panel-primary">
                <div class="panel-heading" role="tab">
                    <h6 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse"
                            data-parent="#accordion" href="#collapseNine"
                            aria-expanded="false" aria-controls="collapseNine">Licencia
                            médica</a>
                    </h6>
                </div>
                <!-- /.panel-heading -->
                <div id="collapseNine" class="panel-collapse collapse"
                    role="tabpanel" aria-labelledby="headingNine">
                    <div class="panel-body">
                        <div id="licencia-alert" style="display: none;"
                            class="alert alert-danger" role="alert">
                            <span id="msg-licencia-fecha" style="color: red;"></span> <span
                                id="msg-licencia-descripcion" style="color: red;"></span>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <form id="form_licencia" class="form-horizontal" role="form">
                                    <div id="metodo_licencia">
                                        <input type='hidden' name='_method' value='PUT'>
                                    </div>
                                    <input type="hidden" class="id_empleado" name="id_empleado"
                                        value={{isset($empleados->id)? $empleados->id:''}} />
                                    <input type="hidden" id="licencia_id" name="licencia_id" />
                                    <div class="form-group">
                                        <label for="fecha" class="col-sm-3 control-label">Fecha</label>
                                        <div class="col-sm-8">
                                            <input id="fecha" type="date" name="fecha"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="licencia_descripsion"
                                            class="col-sm-3 control-label">Descripsión</label>
                                        <div class="col-sm-8">
                                            <textarea id="licencia_descripsion"
                                                name="licencia_descripsion" class="form-control" cols="10"
                                                rows="7" placeholder="Descripsión"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-8">
                                            <button id="agregar_licencia" type="button"
                                                class="btn btn-primary">Agregar</button>
                                            <button id="modificar_licencia" type="button"
                                                class="btn btn-primary">Modificar</button>
                                            <button id="cancelar_licencia" type="button"
                                                class="btn btn-primary">Cancelar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.col-lg-8 (nested) -->
                            <div class="col-sm-7">
                                <div class="table-responsive">
                                    <table
                                        class="table-bordered table-condensed table table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Descripsion</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="lccbody">
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.col-lg-4 (nested) -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
                <!-- /formulario para factores de riesgos-->
            </div>
        </div>
    </div>
@stop
@section('script')
    {!!Html::script('/js/empleado.js')!!}
@endsection 