@extends('layout.layout')

@section('contenido')
    <!--formulario para usuarios-->
                <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Usuarios
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="/admin">Admin</a>
                                        </li>
                                        <li><a href="/usuario/create">Crear usuario</a>
                                        </li>
                                        <li><a href="/empleado/create">Empleado</a>
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
                                        
                                        {!!Form::model($user,['route'=>['usuario.update',$user->id],'method'=>'PUT','class'=>'form-horizontal','id'=>'form-editar-usuario'])!!}   
                                             <div class="form-group">
                                                <label for="name" class="col-sm-2 control-label">Nombre</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="name" class="form-control" placeholder="Nombre" value=<?php echo $user->name;?>>
                                                </div>                                
                                            </div>
                                            <div class="form-group">
                                                <label for="email" class="col-sm-2 control-label">Correo</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="email" class="form-control" placeholder="Correo" value=<?php echo $user->email;?>>
                                                </div>                                
                                            </div>
                                            <div class="form-group">
                                                <label for="contrasena" class="col-sm-2 control-label">Contraseña</label>
                                                <div class="col-sm-10">
                                                    <input type="password" name="password" class="form-control" placeholder="Contraseña" >
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
                                        {!!Form::open(['route'=>['usuario.destroy',$user->id],'method'=>'DELETE','class'=>'form-horizontal'])!!}   
                                             <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Eliminar</button>
                                                </div>
                                            </div>
                                        {!!Form::close()!!}
                                    </div>
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
@section('script')
    <script type="text/javascript">
        $('#form-editar-usuario').validate({
            rules:{
                email:{
                    required:true,
                    email:true
                }
            },
            messages:{
                email:{
                    required: 'El correo es obligatorio',
                    email: 'El correo debe ser valido'
                }
            }
        });

    </script>
@endsection