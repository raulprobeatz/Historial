@extends('layout.layout')

@section('crear')
	<!-- /.row -->
<!-- Page Heading -->
<div class="row">
<div class="col-sm-12 form-box">
<form action="#" class="form">    	
    <div class="col-lg-6">
        		<input type="hidden" name="Id_antcdt_persnl" />
        	<div class="form-group">
        		<label for="factor">Factor</label>
        		<input type="text" name="Factor" class="form-control" />
        	</div>
        	<div class="form-group">
        		<label for="diagnostico">Diagnostico</label>
        		<input type="text" name="diagnostico" class="form-control" />
        	</div>
        	<div class="form-group">
        		<label for="control">Control</label>
        		<input type="text" name="control" class="form-control" />
        	</div>
        	<div class="form-group">
        		<label for="tratado">Tratado</label>
        		<input type="text" name="tratado" class="form-control" />
        	</div>        	
    </div>
     <div class="table-responsive col-lg-6">
        <table class="table table-bordered">
	        <thead>
	        	<tr>
					<th>Factor</th>
					<th>Diagnostico</th>
					<th>Control</th>
					<th>Tratado</th>
					<th>Opciones</th>
			    </tr>
	        </thead>
	        <tbody>
	        	<tr>
	        		<td>Bolimia</td>
	        		<td>Podridas</td>
	        		<td>No</td>
	        		<td>No</td>
	        		<td>
	        			<a class="btn btn btn-warning btn-xs" href="#" role="button">Edit</a>
	        			<a class="btn btn btn-danger btn-xs" href="#" role="button">Delete</a>
	        		</td>
	        	</tr>
	        	<tr>
	        		<td>Bolimia</td>
	        		<td>Podridas</td>
	        		<td>No</td>
	        		<td>No</td>
	        		<td>
	        			<a class="btn btn btn-warning btn-xs" href="#" role="button">Edit</a>
	        			<a class="btn btn btn-danger btn-xs" href="#" role="button">Delete</a>
	        		</td>
	        	</tr>
	        	<tr>
	        		<td>Bolimia</td>
	        		<td>Podridas</td>
	        		<td>No</td>
	        		<td>No</td>
	        		<td>
	        			<a class="btn btn btn-warning btn-xs" href="#" role="button">Edit</a>
	        			<a class="btn btn btn-danger btn-xs" href="#" role="button">Delete</a>
	        		</td>
	        	</tr>
	        	<tr>
	        		<td>Bolimia</td>
	        		<td>Podridas</td>
	        		<td>No</td>
	        		<td>No</td>
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