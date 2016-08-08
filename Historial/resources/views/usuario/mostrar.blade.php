@extends('layout.layout')

@section('contenido')
<!--formulario para puesto de trabajo-->
                <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="glyphicon glyphicon-floppy-disk"></i> Usuarios
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
                                        <li><a href="/empleado">Empleado</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                            @include('layout.alert')
                                <!-- /.col-lg-8 (nested) -->
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Correo</th>
                                                    <th>Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($users as $user)
                                                <tr>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>
                                                        <a href=<?php echo '/usuario/'.$user->id.'/edit'?>><i class="glyphicon glyphicon-edit"></i></a>
                                                        <a href=""><i class='glyphicon glyphicon-user'></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                                </tbody>
                                        </table>
                                        {!!$users->render()!!}
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
                   <!-- /formulario para puesto de trabajo-->
                


@stop