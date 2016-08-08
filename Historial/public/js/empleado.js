$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
function cargarAntecedentesPatologicosPersonale(response){
    var fila;
     $(response).each(function(key,value){
            fila += "<tr onclick='cargarAntecedentesPatologicosPersonales(this);'><td  style='display:none;'>"+value.id+"</td>";
            fila += "<td>"+value.factor+"</td>";
            fila += "<td>"+value.diagnostico+"</td>";
            fila += "<td>"+value.control+"</td>";
            fila += "<td>"+value.tratado+"</td>";
            fila += "<td><a onclick='removerPersonales("+value.id+");'><i class='glyphicon glyphicon-remove'></i></a></td></tr>";
            $('#aPpTbody').append(fila);
            fila = "";
        });
        limpiarAntecentesPersonales();
}
function cargarAntecedentesPatologicosFamiliares(response){
    var fila;
     $(response).each(function(key,value){
            fila += "<tr onclick='cargarAntecedentesPatologicosFamiliare(this);'><td  style='display:none;'>"+value.id+"</td>";
            fila += "<td>"+value.enfermedad+"</td>";
            fila += "<td>"+value.tipo+"</td>";
            fila += "<td>"+value.diagnosticado+"</td>";
            fila += "<td>"+value.control+"</td>";
            fila += "<td>"+value.tratado+"</td>";
            fila += "<td><a onclick='removerFamiliares("+value.id+");'><i class='glyphicon glyphicon-remove'></i></a></td></tr>";
            $('#aPfTbody').append(fila);
            fila = "";
        });
}
function cargarExperienciasLaborales(response){
    var fila;
     $(response).each(function(key,value){
            fila += "<tr onclick='cargarEsperiencia(this);'><td  style='display:none;'>"+value.id+"</td>";
            fila += "<td>"+value.experiencia+"</td>";
            fila += "<td>"+value.empresa+"</td>";
            fila += "<td>"+value.tiempo+"</td>";
            fila += "<td>"+value.puesto+"</td>";
            fila += "<td>"+value.epp_usados+"</td>";
            fila += "<td>"+value.factores_riesgos+"</td>";
            fila += "<td><a onclick='removerExperiencia("+value.id+");'><i class='glyphicon glyphicon-remove'></i></a></td></tr>";
            $('#exPLTbody').append(fila);
            fila = "";
        });
}
function cargarCarrera(response){
    var fila;
     $(response).each(function(key,value){
            fila += "<tr onclick='cargarCarreras(this);'><td  style='display:none;'>"+value.id+"</td>";
            fila += "<td>"+value.carrera+"</td>";
            fila += "<td>"+value.institucion+"</td>";
            fila += "<td><a onclick='removerCarrera("+value.id+");'><i class='glyphicon glyphicon-remove'></i></a></td></tr>";
            $('#crrTbody').append(fila);
            fila = "";
        });
}
function cargarPuestosDeTrabajo(response){
    var fila;
     $(response).each(function(key,value){

            fila += "<tr onclick='cargarPuesto(this);'><td  style='display:none;'>"+value.id+"</td>";
            fila += "<td>"+value.puesto+"</td>";
            fila += "<td>"+value.jornada+"</td>";
            fila += "<td>"+value.horario+"</td>";
            fila += "<td>"+value.area_vicerrectoria+"</td>";
            fila += "<td><a onclick='removerPuestos("+value.id+");'><i class='glyphicon glyphicon-remove'></i></a></td></tr>";
            $('#psttTbody').append(fila);
            fila = "";
        });
}
function cargarHabitosToxicos(response){
    var fila;
     $(response).each(function(key,value){
            fila += "<tr onclick='cargarHabitos(this);'><td  style='display:none;'>"+value.id+"</td>";
            fila += "<td>"+value.habito+"</td>";
            fila += "<td>"+value.frecuencia+"</td>";
            fila += "<td><a onclick='removerHabitos("+value.id+");'><i class='glyphicon glyphicon-remove'></i></a></td></tr>";
            $('#hbtTTbody').append(fila);
            fila = "";
        });
}
function cargarFactoresDeRiesgos(response){
    var fila;
     $(response).each(function(key,value){
            fila += "<tr onclick='cargarFactores(this);'><td  style='display:none;'>"+value.id+"</td>";
            fila += "<td>"+value.factor+"</td>";
            fila += "<td>"+value.control+"</td>";
            fila += "<td>"+value.diagnosticado+"</td>";
            fila += "<td><a onclick='removerFactores("+value.id+");'><i class='glyphicon glyphicon-remove'></i></a></td></tr>";
            $('#ftrrTTbody').append(fila);
            fila = "";
        });
}

function cargarLicencias(response){
    var fila;
    $(response).each(function(key,value){
        fila += "<tr onclick='cargarLicencia(this);'><td  style='display:none;'>"+value.id+"</td>";
        fila += "<td>"+value.fecha+"</td>";
        fila += "<td>"+value.descripsion+"</td>";
        fila += "<td><a onclick='removerLicencia("+value.id+");'><i class='glyphicon glyphicon-remove'></i></a></td></tr>";
        $('#lccbody').append(fila);
        fila = "";
    });
}

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//manejo de ajax pra cargar un empleado y todos los datos relacionados al mismo

function cargarEmpleadoYrelaciones(){
  var id = $('.id_empleado').val();   
  if (!isNaN(id)) {
    $.get('/servicio/'+id,function(response){
        if (response.respuesta == undefined) {
            cargarLicencias(response.licencias);
            cargarAntecedentesPatologicosPersonale(response.antecedentesPersonales);
            cargarAntecedentesPatologicosFamiliares(response.antecedentesFamiliares);
            cargarCarrera(response.carrera);
            cargarPuestosDeTrabajo(response.puestoDeTrabajo);
            //cargarDocumentos(response.documento);
            cargarExperienciasLaborales(response.experienciasLaborales);
            cargarFactoresDeRiesgos(response.factoresDeRiesgos);
            cargarHabitosToxicos(response.habitosToxicos);
        }else{
            console.log(response.respuesta);
        }
    });
  }
}
//cargar empleado y datos
//empleados
//-------------------------------------------------------------------------------------
//manejo de jax para antecedentes patologicos personales
window.onload=(function(){
  cargarEmpleadoYrelaciones();
});
