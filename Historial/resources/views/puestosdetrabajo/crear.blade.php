@extends('puestosdetrabajo.index')

@section('crear')
	<!-- /.row -->
<!-- Page Heading -->
<div class="row">
<div class="col-sm-12 form-box">
<form action="#" class="form">    	
    <div class="col-lg-4">
        		<input type="hidden" name="Id_puesto" />
        	<div class="form-group">
        		<label for="puesto">Puesto</label>
        		<input type="text" name="puesto" class="form-control" />
        	</div>
        	<div class="form-group">
        		<label for="jornada">Jornada</label>
        		<input type="text" name="jornada" class="form-control" />
        	</div> 
        	<div class="form-group">
        	<label for="horario">Horario</label>
        		<select class="form-control">
        			<option>Fijo</option>
        			<option>Variado</option>
        		</select>
        	</div>
        	<div class="form-group">
        		<label for="area_vicerrec">Area de vicerectoria</label>
        		<input type="text" name="area_vicerrec" class="form-control" />
        	</div> 
    </div>
     <div class="table-responsive col-lg-8">
        <table class="table table-bordered">
	        <thead>
	        	<tr>
					<th>Puesto</th>
					<th>Jornada</th>
					<th>Horario</th>
					<th>Area de Vicerrectoria</th>
					<th>Opciones</th>
			    </tr>
	        </thead>
	        <tbody>
	        	<tr>
	        		<td>Contable</td>
	        		<td>1:00 PM a 2:00 PM</td>
	        		<td>Fijo</td>
	        		<td>Academica</td>
	        		<td>
	        			<a class="btn btn btn-warning btn-xs" href="#" role="button">Edit</a>
	        			<a class="btn btn btn-danger btn-xs" href="#" role="button">Delete</a>
	        		</td>
	        	</tr>
	        	<tr>
	        		<td>Contable</td>
	        		<td>1:00 PM a 2:00 PM</td>
	        		<td>Fijo</td>
	        		<td>Academica</td>
	        		<td>
	        			<a class="btn btn btn-warning btn-xs" href="#" role="button">Edit</a>
	        			<a class="btn btn btn-danger btn-xs" href="#" role="button">Delete</a>
	        		</td>
	        	</tr>
	        	<tr>
	        		<td>Contable</td>
	        		<td>1:00 PM a 2:00 PM</td>
	        		<td>Fijo</td>
	        		<td>Academica</td>
	        		<td>
	        			<a class="btn btn btn-warning btn-xs" href="#" role="button">Edit</a>
	        			<a class="btn btn btn-danger btn-xs" href="#" role="button">Delete</a>
	        		</td>
	        	</tr>
	        </tbody>
		</table>
    </div>
    <div class="col-lg-12">
    	<button type="submit" class="btn btn-default btn-lg active">Agregar</button>
        <button type="submit" class="btn btn-default btn-lg active">Cancelar</button>
    </div>
    </form>	
</div>
</div>
<!-- /.row -->
@stop