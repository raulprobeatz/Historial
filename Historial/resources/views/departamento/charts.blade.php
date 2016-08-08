@extends('layout.layout')

@section('contenido')
<div style="overflow:scroll; max-height:570px; padding-top:10px;">
  <div class="row">
    <div class="col-sm-12">
      <h3>Departamentos y grupos</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Library</a></li>
  <li class="active">Data</li>
</ol>
    </div>
    <div class="col-sm-12" style="background:#FFFAF0;">
                    <!-- /.panel-heading -->
                        <div class="panel-body" id="panel_departamentos">
                          
                        </div>
                        <!-- /.panel-body -->
                    
                    <!-- /.panel -->
                </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-12">
      <h3>Dias no laborados por departamento</h3>
    </div>
  </div>

<div class="row">
<div class="col-sm-12" style="background:#FFFAF0;">
                        <div class="panel-body">
                            <div id="bar-example"></div>
                    <!-- /.panel -->
                </div>
                </div>
</div>
</div>
@stop

@section('script')
<script type="text/javascript">
  /*
 * Play with this code and it'll update in the panel opposite.
 *
 * Why not try some of the options above?
 */
$.get('/departamentos/cantidad',function(response){
    console.log(response);

    $(response.departamentos).each(function(key,value){
      var html = "<div class='col-lg-3 col-md-6'><div class='panel panel-primary'>";
      html += "<div class='panel-heading'><div class='row'><div class='col-xs-3'>";
      html += "<i class='fa fa-suitcase fa-2x'></i></div>";
      html += "<div class='col-xs-9 text-right'><div class='big'>"+value.cantidad+"</div>";
      html += "<div>"+value.departamento+"</div></div></div></div><a href='#''>";
      html += "<div class='panel-footer'><span class='pull-left'>"+value.grupo+" </span>";
      html += "<span class='pull-right'><i class='fa fa-arrow-circle-right'></i></span>";
      html += "<div class='clearfix'></div></div></a></div></div>";
      $('#panel_departamentos').append(html);
    });
    /*$(response).each(function(){
      
    });*/
});



 $.get('/departamento/faltas/3',function(response){
      var datos = [];
      var cnt_lcn_per_dep = new Array();
      console.log(response);

      $(response.dep).each(function(key,value){
         //cantidad de licencias por departamento
         cnt_lcn_per_dep[value.departamento] = value.cantidad;
      });

      //cantidad de empleados en la institucion
      var cnt_emp_en_la_institucion = response.cnt[0].cantidad_empleado;
      console.log('--------------------------------------');
      
      $(response.cnt_per_dep).each(function(key,value){
        //calculo de los dias no trabajados durante el mes.
        datos[key] = {"y":value.departamento,a:diasNoLaborables(cnt_emp_en_la_institucion,value.cantidad_por_departamento,cnt_lcn_per_dep[value.departamento])};
      });
        console.log(datos);
      Morris.Bar({
        element: 'bar-example',
        data: datos,
        xkey: 'y',
        ykeys: ['a'],
        labels: ['No laborados A']
      });
    });

 //calcula la cantidad de dis no laborados por los departamentos
 function diasNoLaborables(cnt_emp,cnt_emp_dep,cnt_esc){
  return ((cnt_esc*cnt_emp_dep)/cnt_emp);
 }
</script>
@endsection