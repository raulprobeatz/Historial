@extends('layout.layout')

@section('contenido')
<div class="row">
<div class="col-sm-12">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        Inicio
      </a>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="number" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
  </div>
</nav>
</div>
<?php
$departamentoLicencias = array();
 
//*****************resume las licencias por mes************************************************************
foreach($licenciasPorDepartamento as $licencias){
  $meses[$licencias->mes][$licencias->departamento] = 0;
}
foreach($licenciasPorDepartamento as $licencias){
  $meses[$licencias->mes][$licencias->departamento] = $meses[$licencias->mes][$licencias->departamento]+=1;
}
//*********************************************************************************************************


$meses_literales = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');

?>
   <div class="col-sm-12">
    <?php
     
      foreach ($meses as $key => $value) {
        echo<<<CABECERA
        <div class="list-group col-sm-3">
          <a href="#" class="list-group-item active">
            {$meses_literales[$key-1]}
          </a>
CABECERA;
        echo '<ul class="list-group">';
        foreach ($value as $key1 => $value1) {
          echo<<<DEPARTAMENTOS
          
            <li class="list-group-item">
              <span class="badge">{$value1}</span>
                {$key1}
              </li>
            
DEPARTAMENTOS;
        }
        echo '</ul>';
        echo '</div>';
      }
    ?>
    </div>

   </div> 
</div>    
<?php
/*<?php
     $meses_literales = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
     $first = 0;
     $next = 0;
     $step = 0;
     $round = 0;
     $departamento_temp = '';
     $lastColumn = 0;
     echo '<th>Departamento</th>';     
     foreach ($licenciasPorDepartamento as $value) {
        $lastColumn += 1;
        echo<<<CABECERA
        <th>{$meses_literales[$value->mes-1]}</th>
CABECERA;
        }
      echo '</tr>';
      foreach ($licenciasPorDepartamento as $value) {
          echo '<tr id='.$next.'>';
           $round +=1;
           if ($first == 0) {
             $first = $value->mes;
           }
           echo '<td>'.$value->departamento.'</td>';
           for ($i=0; $i < $step; $i++) { 
               echo '<td> </td>';               
           }
           echo "<td>{$value->cantidad_por_mes}</td>";
           
           $c = 0;
           foreach ($licenciasPorDepartamento as $v) {
              if ($c == $round) {
                $next = $v->mes;
                break;
              }
              $c+=1;
           } 

           $step = $next - $first;
        echo '</tr>';
      echo var_dump($value);
      }
      echo $lastColumn;

    ?>
    </table>
      <?php
      $licenciasPormesesYdepartamento = array();

      foreach ($licenciasPorDepartamento as $value) {
         $licenciasPormesesYdepartamento[$value->departamento][$value->mes] = [
          'departamento' => '',
          'cantidad' => 0,
          'mes'=> 0
         ];
      } 

      foreach ($licenciasPorDepartamento as $value) {
         $licenciasPormesesYdepartamento[$value->departamento][$value->mes] = [
          'departamento' => $value->departamento,
          'cantidad' => $licenciasPormesesYdepartamento[$value->departamento][$value->mes]['cantidad']+1,
          'mes'=> $value->mes
         ];
      }
      echo var_dump($licenciasPormesesYdepartamento);
      
      foreach ($licenciasPorDepartamento as $value) {
                     echo<<<DEPARTAMENTOS
      <div class="list-group">
  <a href="#" class="list-group-item active">
    {$meses_literales[$value->mes-1]}
  </a>
            <li class="list-group-item">
              <span class="badge">{$value->cantidad_por_mes}</span>
                {$value->departamento}
              </li>
            
DEPARTAMENTOS;

      }
        
        echo '</ul>';
        echo '</div>';
      



      ?>*/


?>
@stop

@section('script')
@endsection