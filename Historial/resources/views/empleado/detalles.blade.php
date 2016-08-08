@extends('layout.layout')

@section('contenido')
<a href="javascript:generar()">generar</a>
<div style="overflow: scroll; height: 570px;" id="contenedor">
<!--formulario para detalles-->
                <!-- /.panel -->
                <div class="row" id="page">
                                <div class="col-sm-12">
                                	<ul class="list-group">
  										<li class="list-group-item list-group-item-info">Empleado</li>
  										<li class="list-group-item">
  											<dl style="overflow: hidden;">
  												<div class="col-sm-2">
                            <div class="media">
  <div class="media-left">
    <a href="#">
      <img class="media-object" src="/img/sidebar_usuario-corporativo.png" width="130" height="130" alt="...">
    </a>
  </div>
</div>            
                          </div>
                          <div class="col-sm-5" >
                                                <input type="hidden" id="id_empleado" value= {{$empleados->id}}>
  													<dt style="float: left; margin-right: 7px;">Nombre:</dt>
  														<dd>{{$empleados->nombre}}</dd>
  													<dt style="float: left; margin-right: 7px;">Apellido:</dt>
  														<dd> {{$empleados->apellido}}</dd>
  													<dt style="float: left; margin-right: 7px;">Edad:</dt>
  														<dd> {{$empleados->edad}}</dd>
  													<dt style="float: left; margin-right: 7px;">Cedula:</dt>
  														<dd> {{$empleados->cedula}}</dd>
  													<dt style="float: left; margin-right: 7px;">Sexo:</dt>
  														<dd> {{$empleados->sexo}}</dd>
  													<dt style="float: left; margin-right: 7px;">Estado Civil:</dt>
  														<dd> {{$empleados->estado_civil}}</dd>
  												  <dt style="float: left; margin-right: 7px;">Posicion actual:</dt>
                              <dd> {{$empleados->donde_esta}}</dd>
                          </div>
  												<div class="col-sm-5">
  													<dt style="float: left; margin-right: 7px;">Teléfono:</dt>
  														<dd> {{$empleados->telefono_casa}}</dd>
  												
  													<dt style="float: left; margin-right: 7px;">Celular:</dt>
  													<dd> {{$empleados->movil}}</dd>
  													<dt style="float: left; margin-right: 7px;">Dirección:</dt>
  														<dd> {{$empleados->direccion}}</dd>
  													<dt style="float: left; margin-right: 7px;">Número de dependientes:</dt>
  														<dd> {{$empleados->numero_dependientes}}</dd>
  													<dt style="float: left; margin-right: 7px;">Tiempo de traslado:</dt>
  														<dd> {{$empleados->tiempo_traslado}}</dd>
                            <dt style="float: left; margin-right: 7px;">Seguro medico:</dt>
                              <dd> {{$empleados->seguro_medico}}</dd>
                            <dt style="float: left; margin-right: 7px;">NSS:</dt>
                              <dd> {{$empleados->nss}}</dd>
                            <dt style="float: left; margin-right: 7px;">Lugar de origen :</dt>
                              <dd> {{$empleados->lugar_origen}}</dd>
  												</div>
  											</dl>
   										</li>
   										<li class="list-group-item list-group-item-info">Antecedentes patológicos personales</li>
  										<li class="list-group-item">
                                    		<div class="table-responsive">
                                        		<table class="table">
                                            		<thead>
                                                		<tr>
                                                    <th>Factor</th>
                                                    <th>Diagnóstico</th>
                                                    <th>Control</th>
                                                    <th>Tratado</th>
                                                		</tr>
                                            		</thead>
                                            		<tbody id="aPpTbody">
                                                	</tbody>
                                        		</table>
                                    		</div>
                                    		<!-- /.table-responsive -->
              							</li>
              							<li class="list-group-item list-group-item-info">Antecedentes patológicos familiares</li>
  										<li class="list-group-item">
                                    		<div class="table-responsive">
                                        		<table class="table">
                                            		<thead>
                                                		<tr>
                                                    		<th>Enfermedad</th>
                                                    		<th>Tipo</th>
                                                    		<th>Diagnosticado</th>
                                                    		<th>Control</th>
                                                    		<th>Tratado</th>
                                                		</tr>
                                            		</thead>
                                            		<tbody id="aPfTbody">
                                                	</tbody>
                                        		</table>
                                   			 </div>
                                    		<!-- /.table-responsive -->
              							</li>
              							<li class="list-group-item list-group-item-info">Experiencias laborales</li>
  										<li class="list-group-item">
                                    		<div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Experiencia</th>
                                                    <th>Empresa</th>
                                                    <th>Tiempo</th>
                                                    <th>Puesto</th>
                                                    <th>EPP Usados</th>
                                                    <th>Factores de riesgos</th>
                                                </tr>
                                            </thead>
                                            <tbody id="exPLTbody">
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
              							</li>
              							<li class="list-group-item list-group-item-info">Carrera</li>
  										<li class="list-group-item">
                                    	<div class="table-responsive">
                                        <table class="table" id="enerardor">
                                            <thead>
                                                <tr>
                                                    <th>Carrera</th>
                                                    <th>Institución</th>
                                                 </tr>
                                            </thead>
                                            <tbody id="crrTbody">
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
              							</li>
              							<li class="list-group-item list-group-item-info">Puestos de Trabajo</li>
  										<li class="list-group-item">
                                    		<div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Puesto</th>
                                                    <th>Jornada</th>
                                                    <th>Horario</th>
                                                    <th>Dependencia</th>
                                                </tr>
                                            </thead>
                                            <tbody id="psttTbody">
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
              							</li>
              							
              							<li class="list-group-item list-group-item-info">Hábitos Tóxicos</li>
  										<li class="list-group-item">
                                    		<div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Hábito</th>
                                                    <th>Frecuencia</th>
                                                </tr>
                                            </thead>
                                            <tbody id="hbtTTbody">
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
              							</li>
              							<li class="list-group-item list-group-item-info">Factores de riesgos</li>
  										<li class="list-group-item">
                                    		<div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                   <th>Factor</th>
                                                    <th>Control</th>
                                                    <th>Diagnosticado</th>
                                                </tr>
                                            </thead>
                                            <tbody id="ftrrTTbody">
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
              							</li>
									</ul>
								</div>
                                </div>
                                <!-- /.col-lg-8 (nested) -->
                                
                                </div>
                                <!-- /.col-lg-4 (nested) -->
                            </div>
                            <!-- /.row -->
</div>           
@stop
@section('script')
    {!!Html::script('/js/detalles.js')!!}
    <script type="text/javascript">
      function generar(){    

    var doc = new jsPDF();

    // We'll make our own renderer to skip this editor
    var specialElementHandlers = {
      '#editor': function(element, renderer){
        return true;
      }
    };

    // All units are in the set measurement for the document
    // This can be changed to "pt" (points), "mm" (Default), "cm", "in"
    doc.fromHTML($('#enerardor').get(0), 15, 15, {
    'width': 170, 
    'elementHandlers': specialElementHandlers
    });
    doc.save();

  }

    
    </script>
@endsection