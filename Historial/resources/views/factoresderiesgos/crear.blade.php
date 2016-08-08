@extends('factoresderiesgos.index')

@section('crear')
	<!-- /.row -->
<!-- Page Heading -->
<div class="row">
<div class="col-sm-12 form-box">
<form action="#" class="form">    	
    <div class="col-lg-6">
        		<input type="hidden" name="Id_factor_r" />
        	<div class="form-group">
        	<label for="factor">Factor</label>
        	<select class="form-control">
        		<option>algo</option>
        	</select>
        	</div>
        	<div class="form-group">
        		<label for="control">Control</label>
        		<input type="check" name="control" class="form-control" />
        	</div>
        	<div class="form-group">
        		<label for="diagnosticado">Diagnosticado</label>
        		<input type="check" name="diagnosticado" class="form-control" />
        	</div>        	
    </div>
     <div class="table-responsive col-lg-6">
        <table class="table table-bordered">
	        <thead>
	        	<tr>
					<th>Factor</th>
					<th>Control</th>
					<th>Diagnosticado</th>
					<th>Opciones</th>
			    </tr>
	        </thead>
	        <tbody>
	        	<tr>
	        		<td>Viejo</td>
	        		<td>NO</td>
	        		<td>NO</td>
	        		<td>
	        			<a class="btn btn btn-warning btn-xs" href="#" role="button">Edit</a>
	        			<a class="btn btn btn-danger btn-xs" href="#" role="button">Delete</a>
	        		</td>
	        	</tr>
	        	<tr>
	        		<td>Enano</td>
	        		<td>NO</td>
	        		<td>NO</td>
	        		<td>
	        			<a class="btn btn btn-warning btn-xs" href="#" role="button">Edit</a>
	        			<a class="btn btn btn-danger btn-xs" href="#" role="button">Delete</a>
	        		</td>
	        	</tr>
	        	<tr>
	        		<td>Loco</td>
	        		<td>NO</td>
	        		<td>NO</td>
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