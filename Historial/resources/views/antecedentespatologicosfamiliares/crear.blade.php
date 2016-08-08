@extends('antecedentespatologicosfamiliares.index')

@section('crear')
	<!-- /.row -->
<!-- Page Heading -->
<div class="row">
<div class="col-sm-12 form-box">
<form action="#" class="form">    	
    <div class="col-lg-6">
        		<input type="hidden" name="Id_antcdt_fmlires" />
        	<div class="form-group">
        		<label for="enfermedad">Enfermedad</label>
        		<input type="text" name="enfermedad" class="form-control" />
        	</div>
        	<div class="form-group">
        		<label for="tipo">Tipo</label>
        		<select class="form-control">
        			<option>Materna</option>
        			<option>Paterna</option>
        			<option>Hijo</option>
        		</select>
        	</div>       	
    </div>
     <div class="table-responsive col-lg-6">
        <table class="table table-bordered">
	        <thead>
	        	<tr>
					<th>Enfermedad</th>
					<th>Tipo</th>
					<th>Opciones</th>
			    </tr>
	        </thead>
	        <tbody>
	        	<tr>
	        		<td>Sida</td>
	        		<td>Paterna</td>
	        		<td>
	        			<a class="btn btn btn-warning btn-xs" href="#" role="button">Edit</a>
	        			<a class="btn btn btn-danger btn-xs" href="#" role="button">Delete</a>
	        		</td>
	        	</tr>
	        	<tr>
	        		<td>Gonorea</td>
	        		<td>Paterna</td>
	        		<td>
	        			<a class="btn btn btn-warning btn-xs" href="#" role="button">Edit</a>
	        			<a class="btn btn btn-danger btn-xs" href="#" role="button">Delete</a>
	        		</td>
	        	</tr>
	        	<tr>
	        		<td>Sarampion</td>
	        		<td>Materna</td>
	        		<td>
	        			<a class="btn btn btn-warning btn-xs" href="#" role="button">Edit</a>
	        			<a class="btn btn btn-danger btn-xs" href="#" role="button">Delete</a>
	        		</td>
	        	</tr>
	        	<tr>
	        		<td>Bolimia</td>
	        		<td>Materna</td>
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