$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
function cargarAntecedentesPatologicosPersonale(response){
    var fila;
     $(response).each(function(key,value){
            fila += "<tr><td  style='display:none;'>"+value.id+"</td>";
            fila += "<td>"+value.factor+"</td>";
            fila += "<td>"+value.diagnostico+"</td>";
            fila += "<td>"+value.control+"</td>";
            fila += "<td>"+value.tratado+"</td></tr>";
            $('#aPpTbody').append(fila);
            fila = "";
        });
        limpiarAntecentesPersonales();
}
function cargarAntecedentesPatologicosFamiliares(response){
    var fila;
     $(response).each(function(key,value){
            fila += "<tr><td  style='display:none;'>"+value.id+"</td>";
            fila += "<td>"+value.enfermedad+"</td>";
            fila += "<td>"+value.tipo+"</td>";
            fila += "<td>"+value.diagnosticado+"</td>";
            fila += "<td>"+value.control+"</td>";
            fila += "<td>"+value.tratado+"</td></tr>";
            $('#aPfTbody').append(fila);
            fila = "";
        });
}
function cargarExperienciasLaborales(response){
    var fila;
     $(response).each(function(key,value){
            fila += "<tr><td  style='display:none;'>"+value.id+"</td>";
            fila += "<td>"+value.experiencia+"</td>";
            fila += "<td>"+value.empresa+"</td>";
            fila += "<td>"+value.tiempo+"</td>";
            fila += "<td>"+value.puesto+"</td>";
            fila += "<td>"+value.epp_usados+"</td>";
            fila += "<td>"+value.factores_riesgos+"</td></tr>";
            $('#exPLTbody').append(fila);
            fila = "";
        });
}
function cargarCarrera(response){
    var fila;
     $(response).each(function(key,value){
            fila += "<tr><td  style='display:none;'>"+value.id+"</td>";
            fila += "<td>"+value.carrera+"</td>";
            fila += "<td>"+value.institucion+"</td></tr>";
            $('#crrTbody').append(fila);
            fila = "";
        });
}
function cargarPuestosDeTrabajo(response){
    var fila;
     $(response).each(function(key,value){

            fila += "<tr><td  style='display:none;'>"+value.id+"</td>";
            fila += "<td>"+value.puesto+"</td>";
            fila += "<td>"+value.jornada+"</td>";
            fila += "<td>"+value.horario+"</td>";
            fila += "<td>"+value.area_vicerrectoria+"</td></tr>";
            $('#psttTbody').append(fila);
            fila = "";
        });
}
function cargarHabitosToxicos(response){
    var fila;
     $(response).each(function(key,value){
            fila += "<tr><td  style='display:none;'>"+value.id+"</td>";
            fila += "<td>"+value.habito+"</td>";
            fila += "<td>"+value.frecuencia+"</td></tr>";
            $('#hbtTTbody').append(fila);
            fila = "";
        });
}
function cargarFactoresDeRiesgos(response){
    var fila;
     $(response).each(function(key,value){
            fila += "<tr><td  style='display:none;'>"+value.id+"</td>";
            fila += "<td>"+value.factor+"</td>";
            fila += "<td>"+value.control+"</td>";
            fila += "<td>"+value.diagnosticado+"</td></tr>";
            $('#ftrrTTbody').append(fila);
            fila = "";
        });
}
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//manejo de ajax pra cargar un empleado y todos los datos relacionados al mismo

function cargarEmpleadoYrelaciones(){
  var id = $('#id_empleado').val();   
  $.get('/servicio/'+id,function(response){
    cargarAntecedentesPatologicosPersonale(response.antecedentesPersonales);
    cargarAntecedentesPatologicosFamiliares(response.antecedentesFamiliares);
    cargarCarrera(response.carrera);
    cargarPuestosDeTrabajo(response.puestoDeTrabajo);
    cargarExperienciasLaborales(response.experienciasLaborales);
    cargarFactoresDeRiesgos(response.factoresDeRiesgos);
    cargarHabitosToxicos(response.habitosToxicos);      
  });
}
//cargar empleado y datos
//empleados
//-------------------------------------------------------------------------------------
//manejo de jax para antecedentes patologicos personales
window.onload=(function(){
  cargarEmpleadoYrelaciones();
});
