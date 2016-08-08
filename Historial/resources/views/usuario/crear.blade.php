@extends('layout.layout')

@section('contenido')
	<!--formulario para usuarios-->
                <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="glyphicon glyphicon-floppy-disk"></i> Factores de Riesgos
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="/admin">Admin</a>
                                        </li>
                                        <li><a href="/usuario">Usuario</a>
                                        </li>
                                        <li><a href="/empleado">Empleado</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @include('layout.request')
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div id="morris-bar-chart" style="position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                        
                                        {!!Form::open(['route'=>'usuario.store','method'=>'POST','class'=>'form-horizontal'])!!}   
                                             <div class="form-group">
                                                <label for="name" class="col-sm-2 control-label">Nombre</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="name" class="form-control" placeholder="Nombre">
                                                </div>                                
                                            </div>
                                            <div class="form-group">
                                                <label for="email" class="col-sm-2 control-label">Correo</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="email" class="form-control" placeholder="Correo">
                                                </div>                                
                                            </div>
                                            <div class="form-group">
                                                <label for="contrasena" class="col-sm-2 control-label">Contraseña</label>
                                                <div class="col-sm-10">
                                                    <input type="password" name="password" class="form-control" placeholder="Contraseña">
                                                </div>                                
                                            </div>
                                            <div class="form-group">
                                                <label for="tipo" class="col-sm-2 control-label">Rol</label>
                                                <div class="col-sm-10">
                                                    <label class="radio-inline">
                                                        <input id="familiares_tipo_paterna" type="radio" name="roll" value="1" />Administrador
                                                    </label> 
                                                    <label class="radio-inline">
                                                        <input id="familiares_tipo_hijos" type="radio" name="roll" value="2" />Usuario comun
                                                    </label>                
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Agregar</button>
                                                </div>
                                            </div>
                                            
                                        {!!Form::close()!!}
                                    
                                </div>
                                <!-- /.col-lg-8 (nested) -->
                                


                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                   <!-- /formulario para usuarios-->
@stop