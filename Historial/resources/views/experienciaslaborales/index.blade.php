@extends('layout.admin')

@section('content')

<!-- Page Heading -->

<!-- /.row -->
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <ul class="nav nav-pills nav-justified">
            <li role="presentation"><a href="/experienciaslaborales/create">CREAR</a></li>
            <li role="presentation"><a href="/experienciaslaborales/show">MOSTRAR</a></li>
            @yield('empdrop')
        </ul>
    </div>
</div>
                <!-- /.row -->

@yield('crear')
@stop

