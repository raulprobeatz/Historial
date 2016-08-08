@extends('layout.layout')

@section('contenido')
<!--formulario para puesto de trabajo-->
                <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="glyphicon glyphicon-floppy-disk"></i> Puestos de trabajo
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Action</a>
                                        </li>
                                        <li><a href="#">Another action</a>
                                        </li>
                                        <li><a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <!-- /.col-lg-8 (nested) -->
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Factor</th>
                                                    <th>Control</th>
                                                    <th>Diagnosticado</th>
                                                    <th>Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>3326</td>
                                                    <td>10/21/2013</td>
                                                    <td>3:29 PM</td>
                                                    <td>$321.33</td>
                                                    <td>
                                                        <a href="#"><i class="glyphicon glyphicon-edit"></i></a>
                                                        <a href="#"><i class="glyphicon glyphicon-remove"></i></a>
                                                        <a href="#"><i class="glyphicon glyphicon-search"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3325</td>
                                                    <td>10/21/2013</td>
                                                    <td>3:20 PM</td>
                                                    <td>$234.34</td>
                                                    <td>
                                                        <a href="#"><i class="glyphicon glyphicon-edit"></i></a>
                                                        <a href="#"><i class="glyphicon glyphicon-remove"></i></a>
                                                        <a href="#"><i class="glyphicon glyphicon-search"></i></a>
                                                    </td>
                                                </tr>
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
                   <!-- /formulario para puesto de trabajo-->
                


@stop