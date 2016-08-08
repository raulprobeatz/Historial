@extends('layout.layout')

@section('contenido')
<div class="row">
<div class="panel-group" style="overflow: scroll; height: 570px;"
    role="tablist" aria-multiselectable="true">
    <div class="panel-group" id="accordion" role="tablist"
        aria-multiselectable="true">
        <!--formulario para antecedentes patologicos personales-->
        <!-- /.panel -->
        <div class="panel panel-primary">
            <!-- .panel-heading -->
            <div class="panel-heading" role="tab">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse"
                        data-parent="#accordion" href="#collapseTwo" aria-expanded="true"
                        aria-controls="collapseTwo">Grupos institucionales</a>
                </h4>
                <div class="pull-right">
                    <div class="btn-group">
                        <button type="button"
                            class="btn btn-default btn-xs dropdown-toggle"
                            data-toggle="dropdown">
                            Opciones<span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.panel-heading -->
            <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel"
                aria-labelledby="headingTwo">
                <div class="panel-body">
                    <div class="panel-body">
                        <div id="grupo-alert" style="display: none;"
                            class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong><i class="glyphicon glyphicon-ok"></i></strong><span id="msg-grupo"></span>
                            
                        </div>
                        <div class="row">
                               <div class="col-sm-5">
                                <form class="form-horizontal" role="form"
                                    id="form_grupo">
                                    <input type="hidden" id="token" name="_token"
                                        value="{{ csrf_token() }}" />
                                    <div id="metodo_grupo">
                                        <input type='hidden' name='_method' value='PUT'>
                                    </div>
                                    <input type="hidden" id="grupo_id" name="grupo_id" />
                                    <div class="form-group">
                                        <label for="grupo" class="col-sm-3 control-label">Grupo</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="grupo"
                                                name="grupo" class="form-control"
                                                placeholder="Grupo ocupacional">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-3"></div>
                                        <div id="grupo_antecedentes_personales"
                                            class="col-sm-8">
                                            <button id="agregarGrupo" type="button"
                                                class="btn btn-primary">Agregar</button>
                                            <button id="modificarGrupo" type="button"
                                                class="btn btn-primary">modificar</button>
                                            <button id="cancelarGrupo" type="button"
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
                                                <th>Grupo</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="Gtbody">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
        <!-- /.panel -->
        <!-- /formulario para antecedentes patologicos personales-->

        <!--formulario para antecedentes patologicos personales-->
        <!-- /.panel -->
        <div class="panel panel-primary">
            <!-- .panel-heading -->
            <div class="panel-heading" role="tab">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse"
                        data-parent="#accordion" href="#collapseThree" aria-expanded="false"
                        aria-controls="collapseThree">Departamento
                    </a>
                </h4>
                <div class="pull-right">
                    <div class="btn-group">
                        <button type="button"
                            class="btn btn-default btn-xs dropdown-toggle"
                            data-toggle="dropdown">
                            Opciones<span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                                                        
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.panel-heading -->
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                aria-labelledby="headingThree">
                <div class="panel-body">
                    <div class="panel-body">
                        <div id="personales-alert" style="display: none;"
                            class="alert alert-danger" role="alert">
                            <span id="msg-departamento" style="color: red;"></span> <span
                                id="msg-departamento" style="color: red;"></span>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <form class="form-horizontal" role="form"
                                    id="form_departamento">
                                    <input type="hidden" id="token" name="_token"
                                        value="{{ csrf_token() }}" />
                                    <div id="metodo_departamento">
                                        <input type='hidden' name='_method' value='PUT'>
                                    </div>
                                    <input type="hidden" id="departamento_id" name="departamento_id" />
                                    <div class="form-group">
                                        <label for="departamento" class="col-sm-3 control-label">Departamento</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="departamento"
                                                name="departamento" class="form-control"
                                                placeholder="Departamento">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label for="dgrupo" class="col-sm-3 control-label">Grupo</label>
                                        <div class="col-sm-8">
                                            <select id="dgrupo" name="dgrupo" class="form-control">
                                                @foreach($grupo as $grup)
                                                    <option value="{{$grup->id}}">{{$grup->grupo}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-3"></div>
                                        <div id="grupo_antecedentes_personales"
                                            class="col-sm-8">
                                            <button id="agregarDepartamento" type="button"
                                                class="btn btn-primary">Agregar</button>
                                            <button id="modificarDepartamento" type="button"
                                                class="btn btn-primary">modificar</button>
                                            <button id="cancelarDepartamento" type="button"
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
                                                <th>Grupo</th>
                                                <th>Departamento</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="dpTbody">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
        <!-- /.panel -->
        <!-- /formulario para antecedentes patologicos personales-->

    </div>
</div>
@stop
@section('script')
    {!!Html::script('/js/grupoocupacional.js')!!}
@endsection