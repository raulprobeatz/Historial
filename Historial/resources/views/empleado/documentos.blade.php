@extends('layout.layout')

@section('contenido')
<div class="row">
    
	<div class="col-sm-12">
		<img src="{{URL::to('/img/sidebar_usuario-corporativo.png')}}" style="width:140px;height:140px;" alt="..." class="img-thumbnail">
		<h4>{{isset($empleado)?$empleado->nombre.' '.$empleado->apellido:''}}</h4>
	</div>
	<div class="col-sm-12">
	    <form enctype="multipart/form-data" action="{{URL::to('documento')}}" method="POST" class="form" style="padding:5px;">
	   		<div class="form-group">
   				<input type="file" name="documentofile">
  			</div>
  			<div class="form-group" class="col-sm-10">
   				<input type="text" class="form-control" name="descripsion" placeholder="Descripcion">
 			</div>
 			<input type="hidden" id="token" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" class="id_empleado" name="id_empleado" value="{{isset($documento[0]->empleado_id)?$documento[0]->empleado_id:$id}}" />
  			<button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>
	<hr style="border:solid 1px black;">
	<div class="col-sm-12">
	@if(isset($documento))
  @foreach($documento as $doc)
    <div class="media">
        <div class="media-left">
          <a href="#">
              <img class="media-object" src="{{URL::to('/img/images.png')}}" alt="...">
          </a>
        </div>
        <div class="media-body">
          <h4 class="media-heading">{{$doc->descripsion}}</h4>
          <p>{{$doc->created_at}}</p>
          <a href=""><i class="glyphicon glyphicon glyphicon-download"></i></a>
          <a href=""><i class="glyphicon glyphicon glyphicon-trash"></i></a>
          <a href=""><i class="glyphicon glyphicon glyphicon glyphicon-eye-open"></i></a>
          
        </div>
    </div>      
  @endforeach
  {!!$documento->render()!!}
  @endif
	</div>
</div>
@stop
@section('script')
@endsection