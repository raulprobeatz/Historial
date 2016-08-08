@extends('experienciaslaborales.index')

@section('crear')
<!-- /.row -->
<!-- Page Heading -->
<div class="row">
<div class="col-sm-12 form-box">
<form action="#" class="form">    	
    <div class="col-lg-6">
        		<input type="hidden" name="Id_empleado" />
        	<div class="form-group">
                <label for="experiencias">Experiencia</label>
                <input type="text" name="experiencias" class="form-control" />
            </div>
            <div class="form-group">
        		<label for="empresa">Empresa</label>
        		<input type="text" name="empresa" class="form-control" />
        	</div>
        	<div class="form-group">
        		<label for="tiempo">Tiempo</label>
        		<input type="text" name="tiempo" class="form-control" />
        	</div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
                <label for="puesto">Puesto</label>
                <input type="text" name="puesto" class="form-control" />
            </div>
            <div class="form-group">
                <label for="factores_d_rsg">Factores de Riesgos</label>
                <input type="text" name="factores_d_rsg" class="form-control" />
            </div>
            <div class="form-group">
                <label for="epp">EPP usados</label>
                <input type="text" name="epp" class="form-control" />
            </div>    
    </div>
    <div class="col-lg-12">
        <button type="submit" class="btn btn-default btn-ms active">Agregar</button>
        <button type="submit" class="btn btn-default btn-ls active">Cancelar</button>
    </div>
    <div class="col-lg-12">
        <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Experiencia Laboral</th>
                    <th>Empresa</th>
                    <th>Tiempo</th>
                    <th>Puesto</th>
                    <th>Factor de Riesgo</th>
                    <th>EPP usados</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Guachiman</td>
                    <td>Banco popular</td>
                    <td>1 semana</td>
                    <td>La puerda del banco</td>
                    <td>Era alergico a estar despierto</td>
                    <td>Una doce</td>
                    <td>
                        <a class="btn btn btn-warning btn-xs" href="#" role="button">Edit</a>
                        <a class="btn btn btn-danger btn-xs" href="#" role="button">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Guachiman</td>
                    <td>Banco popular</td>
                    <td>1 semana</td>
                    <td>La puerda del banco</td>
                    <td>Era alergico a estar despierto</td>
                    <td>Una doce</td>
                    <td>
                        <a class="btn btn btn-warning btn-xs" href="#" role="button">Edit</a>
                        <a class="btn btn btn-danger btn-xs" href="#" role="button">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Guachiman</td>
                    <td>Banco popular</td>
                    <td>1 semana</td>
                    <td>La puerda del banco</td>
                    <td>Era alergico a estar despierto</td>
                    <td>Una doce</td>
                    <td>
                        <a class="btn btn btn-warning btn-xs" href="#" role="button">Edit</a>
                        <a class="btn btn btn-danger btn-xs" href="#" role="button">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Guachiman</td>
                    <td>Banco popular</td>
                    <td>1 semana</td>
                    <td>La puerda del banco</td>
                    <td>Era alergico a estar despierto</td>
                    <td>Una doce</td>
                    <td>
                        <a class="btn btn btn-warning btn-xs" href="#" role="button">Edit</a>
                        <a class="btn btn btn-danger btn-xs" href="#" role="button">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>>
    </form>	
</div>
</div>
<!-- /.row -->
@stop