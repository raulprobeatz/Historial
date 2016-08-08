@extends('layout.layout')

@section('contenido')
<!--div class="panel panel-primary">
    <div class="panel-heading">
        Empleados 
        <div class="pull-right">
            <div class="btn-group">
                <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                    data-toggle="dropdown">
                    Opciones <span class="caret"></span>
                </button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="/admin">Inicio</a></li>
                    <li><a href="/usuario">Usuario</a></li>
                    <li><a href="/empleado/create">Crear empleado</a></li>
                </ul>
            </div>
        </div>
    </div>-->
    @include('layout.alert')
        <div class="row">
            <div class="col-sm-12">
      <ol class="breadcrumb">
  <li><a href="/departamento/create">Inicio</a></li>
  <li><a href="/empleado/create">Nuevo</a></li>
  <li><a href="/empleado/perfil/1">Perfiles</a></li>
  <li><a href="/empleado"> <i class="glyphicon glyphicon-refresh"></i></a></li>
</ol>
    </div>
            <div class="col-sm-12">
                <input type="text" class="form-control" aria-label="..."
                        placeholder="Buscar" id="buscar-empleado">
                <!-- /input-group -->
            </div>
            <!-- /.col-lg-6 -->

            <!-- /.col-lg-8 (nested) -->
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Edad</th>
                                <th>Cédula</th>
                                <th>Sexo</th>
                                <th>Teléfono</th>
                                <th>Celular</th>
                                <th>Dirección</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody id="tbdEmpleados">
                            @foreach($empleado as $emp)
                            <tr>
                                <td>{{$emp->nombre}}</td>
                                <td>{{$emp->apellido}}</td>
                                <td>{{$emp->edad}}</td>
                                <td>{{$emp->cedula}}</td>
                                <td>{{$emp->sexo}}</td>
                                <td>{{$emp->telefono_casa}}</td>
                                <td>{{$emp->telefono_movil}}</td>
                                <td>{{$emp->direccion}}</td>
                                <td><a href=<?php echo
                                        '/empleado/'.$emp->id.'/edit';?>><i
                                        class="glyphicon glyphicon-edit"></i>
                                </a> <a href=<?php echo '/empleado/'.$emp->id;?>><i
                                        class="glyphicon glyphicon-search"></i></a> <a href=<?php echo
                                        '/documento/'.$emp->id;?>><i class="glyphicon glyphicon-file"></i>
                                </a>
                                <a onclick="removerEmpleado({{$emp->id}});"><i class='glyphicon glyphicon-remove'></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!!$empleado->render()!!}
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.col-lg-4 (nested) -->

        </div>
        <!-- /.row -->
@stop
