@extends('layout.layout')

@section('contenido')
<div class="row">
@foreach($empleados as $emp)
    <div class="col-sm-12" style="border:solid 1px #D3D3D3; margin:5px">
        <div class="media">
  <div class="media-left media-middle">
    <a href="#">
      <img class="media-object" width="110" height="110" src="{{$emp->foto}}" alt="...">
    </a>
    
  </div>
  <div class="media-body">
    <h4 class="media-heading">{{$emp->nombre.' '.$emp->apellido}}</h4>
    <p>Edad: {{$emp->edad}}</p>
    <p>Sexo: {{$emp->sexo}}</p>
  <a><i class="glyphicon glyphicon-edit"></i></a> <a href='/empleado/'><i
                                        class="glyphicon glyphicon-search"></i></a> <a href='/documento/'><i class="glyphicon glyphicon-file"></i>
                                </a>
                                <a onclick=><i class='glyphicon glyphicon-remove'></i></a>
                                <form enctype="multipart/form-data" action="/empleado/foto" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="empleado_id" value="{{$emp->id}}">
                                    <input type="file" name="foto">
                                    <input type="submit" name="boton" class="btn btn-primary btn-xs">
                                </form>
  </div>
</div>
    </div>
@endforeach
{!!$empleados->render()!!}
</div>
    
            
       
@stop
@section('script')
    
@endsection 