<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">

	</style>
</head>
<body>
<div style="overflow: scroll; height: 570px;">
<!--formulario para detalles-->
                <!-- /.panel -->
                <div class="row">
                                <div class="col-sm-12">
                                	<ul class="list-group">
  										<li class="list-group-item list-group-item-info">Empleado</li>
  										<li class="list-group-item">
  											<dl style="overflow: hidden;">
  												<div class="col-sm-6" >
                                                <input type="hidden" id="id_empleado" value= {{$empleados->id}}>
  													<dt style="float: left; margin-right: 7px;">Nombre:</dt>
  														<dd> {{$empleados->nombre}}</dd>
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
  												</div>
  												<div class="col-sm-6">
  													<dt style="float: left; margin-right: 7px;">Telefono Casa:</dt>
  														<dd> {{$empleados->telefono_casa}}</dd>
  												
  													<dt style="float: left; margin-right: 7px;">Telefono Movil:</dt>
  													<dd> {{$empleados->movil}}</dd>
  													<dt style="float: left; margin-right: 7px;">Direccion:</dt>
  														<dd> {{$empleados->direccion}}</dd>
  													<dt style="float: left; margin-right: 7px;">Numero de Dependientes:</dt>
  														<dd> {{$empleados->numero_dependientes}}</dd>
  													<dt style="float: left; margin-right: 7px;">Tiempo de Traslado:</dt>
  														<dd> {{$empleados->tiempo_traslado}}</dd>
  												</div>
  											</dl>
   										</li>
   										<li class="list-group-item list-group-item-info">Antecedentes Patologicos Personales</li>
  										<li class="list-group-item">
                                    		<div class="table-responsive">
                                        		<table class="table">
                                            		<thead>
                                                		<tr>
                                                    <th>Factor</th>
                                                    <th>Diagnostico</th>
                                                    <th>Control</th>
                                                    <th>Tratado</th>
                                                		</tr>
                                            		</thead>
                                            		<tbody id="aPpTbody">
                                            		   @foreach($empleados->antecedentesPatologicosPersonales()->get() as $emp)
                                            		      <tr>
                                            		      	<td>{{$emp->id}}</td>
                                            		      </tr>
                                            		   @endforeach
                                                	</tbody>
                                        		</table>
                                    		</div>
                                    		<!-- /.table-responsive -->
              							</li>
              							<li class="list-group-item list-group-item-info">Antecedentes Patologicos Familiares</li>
  										<li class="list-group-item">
                                    		<div class="table-responsive">
                                        		<table class="table">
                                            		<thead>
                                                		<tr>
                                                    		<th>Enfermedad</th>
                                                    		<th>Tipo</th>
                                                    		<th>Diagnosticodo</th>
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
              							<li class="list-group-item list-group-item-info">Experiencias Laborales</li>
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
                                                    <th>Factores de Riesgos</th>
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
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Carrera</th>
                                                    <th>Institucion</th>
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
                                                    <th>Area Vicerrectoria</th>
                                                </tr>
                                            </thead>
                                            <tbody id="psttTbody">
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
              							</li>
              							
              							<li class="list-group-item list-group-item-info">Habitos Toxicos</li>
  										<li class="list-group-item">
                                    		<div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Habito</th>
                                                    <th>Frecuencia</th>
                                                </tr>
                                            </thead>
                                            <tbody id="hbtTTbody">
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
              							</li>
              							<li class="list-group-item list-group-item-info">Factores de Riesgos</li>
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
</body>
</html>