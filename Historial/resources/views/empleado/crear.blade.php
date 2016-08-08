@extends('empleado.index')

@section('crear')
<!-- /.row -->
<!-- Page Heading -->
<div class="row">
<div class="col-sm-12 form-box">
<form action="#" class="form">    	
    <div class="col-lg-6">
        		<input type="hidden" name="Id_empleado" />
        	<div class="form-group">
        		<label for="nombre">Nombre</label>
        		<input type="text" name="nombre" class="form-control" />
        	</div>
        	<div class="form-group">
        		<label for="apellido">Apellido</label>
        		<input type="text" name="apellido" class="form-control" />
        	</div>
        	<div class="form-group">
        		<label for="edad">Edad</label>
        		<input type="text" name="edad" class="form-control" />
        	</div>
        	<div class="form-group">
        		<label for="cedula">Cedula</label>
        		<input type="text" name="cedula" class="form-control" />
        	</div>
        	<div class="form-group">
        		<label for="sexo">Sexo</label>
        		<input type="text" name="sexo" class="form-control" />
        	</div>
        	<div class="form-group">
        		<label for="estdo_cv">Estado Civil</label>
        		<input type="text" name="estdo_cv" class="form-control" />
        	</div>
    </div>

    <div class="col-lg-6">
        	<div class="form-group">
        		<label for="telefono_rcdencial">Telefono Recidencial</label>
        		<input type="text" name="telefono_rcdencial" class="form-control" />
        	</div>
        	<div class="form-group">
        		<label for="telefono_movil">Telefono Movil</label>
        		<input type="text" name="telefono_movil" class="form-control" />
        	</div>
        	<div class="form-group">
        		<label for="direccion">Direccion</label>
        		<input type="text" name="direccion" class="form-control" />
        	</div>
        	<div class="form-group">
        		<label for="n_dependientes">Numero de Dependientes</label>
        		<input type="text" name="n_dependientes" class="form-control" />
        	</div>
        	<div class="form-group">
        		<label for="tmp_traslado">Tiempo de Traslado</label>
        		<input type="text" name="tmp_traslado" class="form-control" />
        	</div>
        	<div class="form-group">
        		<label for="foto">Foto</label>
        		<input type="file" name="foto" class="btn btn-default" />
        	</div>  
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