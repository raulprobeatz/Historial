@extends('carreras.index')

@section('crear')
	<!-- /.row -->
<!-- Page Heading -->
<div class="row">
<div class="col-sm-12 form-box">
<form action="#" class="form">    	
    <div class="col-lg-6">
        		<input type="hidden" name="Id_carrera" />
        	<div class="form-group">
        		<label for="carrera">Carrera</label>
        		<input type="text" name="carrera" class="form-control" />
        	</div>
        	<div class="form-group">
        		<label for="insitucion">Institucion</label>
        		<input type="text" name="institucion" class="form-control" />
        	</div>        	
    </div>
     <div class="table-responsive col-lg-6">
        <table class="table table-bordered">
	        <thead>
	        	<tr>
					<th>Carrera</th>
					<th>Institucion</th>
					<th>Opciones</th>
			    </tr>
	        </thead>
	        <tbody>
	        	<tr>
	        		<td>Derecho</td>
	        		<td>US</td>
	        		<td>
	        			<a class="btn btn btn-warning btn-xs" href="#" role="button">Edit</a>
	        			<a class="btn btn btn-danger btn-xs" href="#" role="button">Delete</a>
	        		</td>
	        	</tr>
	        	<tr>
	        		<td>Agronomia</td>
	        		<td>El campo</td>
	        		<td>
	        			<a class="btn btn btn-warning btn-xs" href="#" role="button">Edit</a>
	        			<a class="btn btn btn-danger btn-xs" href="#" role="button">Delete</a>
	        		</td>
	        	</tr>
	        	<tr>
	        		<td>Delincuencia</td>
	        		<td>Gualey</td>
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