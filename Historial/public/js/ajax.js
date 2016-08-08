$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
//-------------------------------------------------------------------------------------
//Manejo de jax para empleados

$('#agregarEmpleado').click(function(){
  $('#metodo_empleado').html("");
	$.ajax({
	 	url: '/empleado',
	 	type: 'POST',
	 	dataType: 'json',
	 	data:new FormData($("#form_empleado")[0]),
	 	processData: false,
    contentType: false,
    success:function(response){
        if (response.existe !== undefined) {
          console.log('existe');
           location.reload();
        }else if (response.agregado !== undefined) {
           window.location = '/empleado';
        }
    },
    error:function(response){       
      var errores = "";
      console.log(response);
      if (response.responseJSON !== undefined) {
         $.each(response.responseJSON,function(key,value){
            errores += "<h6>"+value+"</h6>";    
      });
      $('#alerta_empleados_span').html(errores);
      $('#alerta_empleados').show();
      }
    },
	});  
});
$('#alerta_empleados').click(function(){
   $('#alerta_empleados').hide();
});
$('#modificarEmpleado').click(function(){
  $('#metodo_empleado').html("<input type='hidden' name='_method' value='PUT'>");
  $('#alerta_empleados').hide();
  var id_empleado = $('.id_empleado').val();
  if (id_empleado >= 0) {
    $.ajax({
      url: '/empleado/1',
      type: 'POST',
      dataType: 'json',
      data:new FormData($("#form_empleado")[0]),
      processData: false,
      contentType: false,
      success:function(response){
        console.log(response)
        if (response.respuesta !== undefined) {
           window.location = '/empleado';
        }
        
      },
      error:function(response){       
       //var errores = "";
       //console.log(response.responseJSON);
       //var valores = [response.responseJSON.cedula,response.responseJSON.estado_civil,response.responseJSON.sexo];
       //$.each(valores,function(key,value){
         //  if (value !== undefined) {
         //  errores += "<h6>"+value+"</h6>";
         // }
         console.log(response);
       //});
      
      //$('#alerta_empleados_span').html(errores);
      //$('#alerta_empleados').show();
    },
  });
 }else{
    alert("Debe selecionar un empleado "+id_empleado);
 }  
});

function removerEmpleado(id){
  $.ajax({
    url: '/empleado/'+id,
    type: 'DELETE',
    dataType: 'json',
    success:function(response){
      if (response.respuesta !== undefined) {
          location.reload();
      }
    },
  });  
}


//funciones que cargan los datos del empleado
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
$('#agregarAntecedentesPersonales').click(function(){
  var id_empleado = $('.id_empleado').val();
  if (!isNaN(id_empleado) && id_empleado != 0) {
    $("#metodo_antecentes_personales").html("");
    $('#aPpTbody').text("");
    var fila = "";
    $.ajax({
      url: '/antecedentepersonales',
      type: 'POST',
      dataType: 'json',
      data:new FormData($("#form_antecedentes_patologicos_personales")[0]),
      processData: false,
      contentType: false,
      success:function(response){
        if (response.respuesta == undefined) {
          $(response).each(function(key,value){
            fila += "<tr onclick='cargarAntecedentesPatologicosPersonales(this);'><td  style='display:none;'>"+value.id+"</td>";
            fila += "<td>"+value.factor+"</td>";
            fila += "<td>"+value.diagnostico+"</td>";
            fila += "<td>"+value.control+"</td>";
            fila += "<td>"+value.tratado+"</td>";
            fila += "<td><a onclick='removerPersonales("+value.id+");'><i class='glyphicon glyphicon-remove'></i></a></td></tr>";
            $('#aPpTbody').append(fila);
            fila = "";
            $('#msg-pcontrol').fadeOut();
            $('#msg-ptratado').fadeOut();
            $('#personales-alert').css({"display":"none"});
            
          });
          limpiarAntecentesPersonales();
        }else{
          alert(response.respuesta);
            $('#msg-pcontrol').fadeOut();
            $('#msg-ptratado').fadeOut();
            $('#personales-alert').fadeOut();
        }
      },
      error:function(response){
           if (response.responseJSON.factor !== undefined) {
           $('#personales_factor').attr('placeholder',response.responseJSON.factor);
           $('#personales_factor').css({"border":"solid 1px red"});
          }
          if (response.responseJSON.diagnostico !== undefined) {
            $('#personales_diagnostico').attr('placeholder',response.responseJSON.diagnostico);
            $('#personales_diagnostico').css({"border":"solid 1px red"});
          } 
          if (response.responseJSON.control !== undefined) {
            $('#msg-pcontrol').text('*'+response.responseJSON.control);
            $('#msg-pcontrol').fadeIn();
          }else{
            $('#msg-pcontrol').fadeOut();
          }
          if (response.responseJSON.tratado !== undefined) {
            $('#msg-ptratado').text('*'+response.responseJSON.tratado);
            $('#msg-ptratado').fadeIn();
          }else{
            $('#msg-ptratado').fadeOut();
          }
          $('#personales-alert').css({"display":"block"});
      },
    }); 
  }else{
    alert('Seleccione el empleado');
  }
    
});
function cargarAntecedentesPatologicosPersonales(valor){
  var td = $(valor).find("td");
  $('#personales_id').val($($(td)[0]).html());
  $('#personales_factor').val($($(td)[1]).html());
  $('#personales_diagnostico').val($($(td)[2]).html());
}

$('#modificarAntecedentesPersonales').click(function(){
  
  $("#metodo_antecentes_personales").html("<input type='hidden' name='_method' value='PUT'>");
  $('#aPpTbody').text("");
  var fila = "";
  $.ajax({
    url: '/antecedentepersonales/1',
    type: 'POST',
    dataType: 'json',
    data:new FormData($("#form_antecedentes_patologicos_personales")[0]),
    processData: false,
    contentType: false,
    success:function(response){
      if (response.respuesta == undefined) {
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
    }else{
      alert(response.respuesta);
    }
    },
  });  
});
function limpiarAntecentesPersonales(){
  $('#personales_id').val("");
  $('#personales_factor').val("");
  $('#personales_diagnostico').val("");
  $('#personales_control_si').attr("checked",false);
  $('#personales_control_no').attr("checked",false);
  $('#personales_tratado_si').attr("checked",false);
  $('#personales_tratado_no').attr("checked",false);
}
$('#cancelarAntecedentesPersonales').click(function(){
   limpiarAntecentesPersonales();
   $('#msg-pcontrol').fadeOut();
   $('#msg-ptratado').fadeOut();
   $('#personales-alert').css({"display":"none"});
});
function removerPersonales(id){
  $('#aPpTbody').text("");
  var fila = "";
  $.ajax({
    url: '/antecedentepersonales/'+id,
    type: 'POST',
    dataType: 'json',
    success:function(response){
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
    },
  });  
}
//antecedentes patologicos personales
//-------------------------------------------------------------------------------------
//**********************************************************************************
//**********************************************************************************
//-------------------------------------------------------------------------------------
//manejo de ajax para los antecedentes patologicos familiares
$('#agregarAntecedentesFamiliares').click(function(){
  var id_empleado = $('.id_empleado').val();
  if (!isNaN(id_empleado) && id_empleado != 0) {
    $("#metodo_antecentes_familiares").html("");
    $('#aPfTbody').text("");
    var fila = "";
    $.ajax({
      url: '/antecedentefamiliares',
      type: 'POST',
      dataType: 'json',
      data:new FormData($("#form_antecedentes_patologicos_familiares")[0]),
      processData: false,
      contentType: false,
      success:function(response){
        if (response.respuesta == undefined) {
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
          limpiarAntecentesFamiliares();
        }else{
          alert(response.respuesta);
        }
        $('#familiares-alert').css({"display":"none"});
      },
      error:function(response){
        if (response.responseJSON.enfermedad !== undefined) {
          $('#familiares_enfermedad').attr('placeholder',response.responseJSON.enfermedad);
          $('#familiares_enfermedad').css({"border":"solid 1px red"});
        }
        if (response.responseJSON.diagnosticado !== undefined) {
            $('#msg-fdiagnosticado').text('*'+response.responseJSON.diagnosticado);
            $('#msg-fdiagnosticado').fadeIn();
          }else{
            $('#msg-fdiagnosticado').fadeOut();
          }
          if (response.responseJSON.control !== undefined) {
            $('#msg-fcontrol').text('*'+response.responseJSON.control);
            $('#msg-fcontrol').fadeIn();
          }else{
            $('#msg-fcontrol').fadeOut();
          }
          if (response.responseJSON.tratado !== undefined) {
            $('#msg-ftratado').text('*'+response.responseJSON.tratado);
            $('#msg-ftratado').fadeIn();
          }else{
            $('#msg-ftratado').fadeOut();
          }
          if (response.responseJSON.tipo !== undefined) {
            $('#msg-ftipo').text('*'+response.responseJSON.tipo);
            $('#msg-ftipo').fadeIn();
          }else{
            $('#msg-ftipo').fadeOut();
          }
          $('#familiares-alert').css({"display":"block"});
      },
    }); 
  }else{
    alert('Seleccione el empleado');
  }
    
});
function cargarAntecedentesPatologicosFamiliare(valor){
  var td = $(valor).find("td");
  $('#familiares_id').val($($(td)[0]).html());
  $('#familiares_enfermedad').val($($(td)[1]).html());
  switch($($(td)[2]).html()){
      case 'Materna': $('#familiares_tipo_materna').attr("checked",true);
        break;
      case 'Paterna': $('#familiares_tipo_paterna').attr("checked",true);
        break;
      case 'Hijos': $('#familiares_tipo_hijos').attr("checked",true);
        break;
      case 'Otros familiares': $('#familiares_tipo_otros').attr("checked",true);
        break;
  }
  switch($($(td)[3]).html()){
      case 'Si': $('#familiares_diagnosticado_si').attr("checked",true);
        break;
      case 'No': $('#familiares_diagnosticado_no').attr("checked",true);
        break;
  }
  switch($($(td)[4]).html()){
      case 'Si': $('#familiares_control_si').attr("checked",true);
        break;
      case 'No': $('#familiares_control_no').attr("checked",true);
        break;
  }
  switch($($(td)[5]).html()){
      case 'Si': $('#familiares_tratado_si').attr("checked",true);
        break;
      case 'No': $('#familiares_tratado_no').attr("checked",true);
        break;
  }
}

function limpiarAntecentesFamiliares(){
  $('#familiares_id').val("");
  $('#familiares_enfermedad').val("");
  $('#familiares_tipo_materna').attr("checked",false);
  $('#familiares_tipo_paterna').attr("checked",false);
  $('#familiares_tipo_hijos').attr("checked",false);
  $('#familiares_tipo_otros').attr("checked",false);
  $('#familiares_diagnosticado_si').attr("checked",false);
  $('#familiares_diagnosticado_no').attr("checked",false);
  $('#familiares_control_si').attr("checked",false);
  $('#familiares_control_no').attr("checked",false);
  $('#familiares_tratado_si').attr("checked",false);
  $('#familiares_tratado_no').attr("checked",false);
}

$('#modificarAntecedentesFamiliares').click(function(){
  $("#metodo_antecentes_familiares").html("<input type='hidden' name='_method' value='PUT'>");
  $('#aPfTbody').text("");
  var fila = "";
  $.ajax({
    url: '/antecedentefamiliares/1',
    type: 'POST',
    dataType: 'json',
    data:new FormData($("#form_antecedentes_patologicos_familiares")[0]),
    processData: false,
    contentType: false,
    success:function(response){
      if (response.respuesta == undefined) {
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
      limpiarAntecentesFamiliares();
    }else{
      alert(response.respuesta);
    }
    },
  });  
});
$('#cancelarAntecedentesFamiliares').click(function(){
   limpiarAntecentesFamiliares();
   $('#familiares-alert').css({"display":"none"});
});
function removerFamiliares(id){
  $('#aPfTbody').text("");
  var fila = "";
  $.ajax({
    url: '/antecedentefamiliares/'+id,
    type: 'POST',
    dataType: 'json',
    success:function(response){
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
      limpiarAntecentesFamiliares();
    },
  });  
}
/*
function limpiarAntecentesPersonales(){
  $('#personales_id').val("");
  $('#personales_factor').val("");
  $('#personales_diagnostico').val("");
  $('#personales_control_si').attr("checked",false);
  $('#personales_control_no').attr("checked",false);
  $('#personales_tratado_si').attr("checked",false);
  $('#personales_tratado_no').attr("checked",false);
}
$('#cancelarAntecedentesPersonales').click(function(){
   limpiarAntecentesPersonales();
});
//antecedentes patologicos personales
//-------------------------------------------------------------------------------------
/**********************************************************************************/
/**********************************************************************************/

//antecedentes patologicos personales
//-------------------------------------------------------------------------------------
/**********************************************************************************/
/**********************************************************************************/
//-------------------------------------------------------------------------------------
//manejo de ajax para las experiencias laborales
$('#agregar_experiencias').click(function(){
  var id_empleado = $('.id_empleado').val();
  if (!isNaN(id_empleado) && id_empleado != 0) {
    $("#metodo_experiencias").html("");
    $('#exPLTbody').text("");
    var fila = "";
    $.ajax({
      url: '/experienciaslaborales',
      type: 'POST',
      dataType: 'json',
      data:new FormData($("#form_experiencias_laborales")[0]),
      processData: false,
      contentType: false,
      success:function(response){
        if (response.respuesta == undefined) {
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
            $('#experiencia-alert').css({"display":"none"});
          });
          limpiarEsperiencia();
        }else{
          alert(response.respuesta);
        }
      },
      error:function(response){
        if (response.responseJSON.experiencia !== undefined) {
          $('#experiencia').attr('placeholder',response.responseJSON.experiencia);
          $('#experiencia').css({"border":"solid 1px red"});
        }
        if (response.responseJSON.empresa !== undefined) {
          $('#empresa').attr('placeholder',response.responseJSON.empresa);
          $('#empresa').css({"border":"solid 1px red"});
        }
        if (response.responseJSON.tiempo !== undefined) {
          $('#tiempo').attr('placeholder',response.responseJSON.tiempo);
          $('#tiempo').css({"border":"solid 1px red"});
        }
        if (response.responseJSON.puesto !== undefined) {
          $('#puesto').attr('placeholder',response.responseJSON.puesto);
          $('#puesto').css({"border":"solid 1px red"});
        }
        if (response.responseJSON.epp_usado !== undefined) {
          $('#epp_usado').attr('placeholder',response.responseJSON.epp_usado);
          $('#epp_usado').css({"border":"solid 1px red"});
        }
        if (response.responseJSON.factores_riesgos !== undefined) {
          $('#factores_riesgos').attr('placeholder',response.responseJSON.factores_riesgos);
          $('#factores_riesgos').css({"border":"solid 1px red"});
        }
      },
    }); 
  }else{
    alert('Seleccione el empleado');
  }
    
});
function cargarEsperiencia(valor){
  var td = $(valor).find("td");
  $('#experiencias_id').val($($(td)[0]).html());
  $('#experiencia').val($($(td)[1]).html());
  $('#empresa').val($($(td)[2]).html());
  $('#tiempo').val($($(td)[3]).html());
  $('#puesto').val($($(td)[4]).html());
  $('#epp_usado').val($($(td)[5]).html());
  $('#factores_riesgos').val($($(td)[6]).html());  
}

function limpiarEsperiencia(){
  $('#experiencias_id').val('');
  $('#experiencia').val('');
  $('#empresa').val('');
  $('#tiempo').val('');
  $('#puesto').val('');
  $('#epp_usado').val('');
  $('#factores_riesgos').val(''); 
}

$('#modificarExperiencias').click(function(){
  $("#metodo_experiencias").html("<input type='hidden' name='_method' value='PUT'>");
  $('#exPLTbody').text("");
  var fila = "";
  $.ajax({
    url: '/experienciaslaborales/1',
    type: 'POST',
    dataType: 'json',
    data:new FormData($("#form_experiencias_laborales")[0]),
    processData: false,
    contentType: false,
    success:function(response){
      if (response.respuesta == undefined) {
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
      limpiarEsperiencia();
    }else{
      alert(response.respuesta);
    }
    },
  });  
});
$('#cancelarExperiencias').click(function(){
   limpiarEsperiencia();
   $('#experiencia-alert').css({"display":"none"});
});
function removerExperiencia(id){
  $('#exPLTbody').text("");
  var fila = "";
  $.ajax({
    url: '/experienciaslaborales/'+id,
    type: 'POST',
    dataType: 'json',
    success:function(response){
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
        console.log('asfd');
      limpiarEsperiencia();
    },
  });  
}
//-------------------------------------------------------------------------------------
/**********************************************************************************/
/**********************************************************************************/
//-------------------------------------------------------------------------------------
//manejo de ajax para las carrera
$('#agregar_carreras').click(function(){
  var id_empleado = $('.id_empleado').val();
  if (!isNaN(id_empleado) && id_empleado != 0) {
    $("#metodo_carreras").html("");
    $('#crrTbody').text("");
    var fila = "";
    $.ajax({
      url: '/carreras',
      type: 'POST',
      dataType: 'json',
      data:new FormData($("#form_carreras")[0]),
      processData: false,
      contentType: false,
      success:function(response){
        if (response.respuesta == undefined) {
            $(response).each(function(key,value){
            fila += "<tr onclick='cargarCarreras(this);'><td  style='display:none;'>"+value.id+"</td>";
            fila += "<td>"+value.carrera+"</td>";
            fila += "<td>"+value.institucion+"</td>";
            fila += "<td><a onclick='removerCarrera("+value.id+");'><i class='glyphicon glyphicon-remove'></i></a></td></tr>";
            $('#crrTbody').append(fila);
            fila = "";
          });
          limpiarCarrera();
        }else{
          alert(response.respuesta);
        }
      },error:function(response){
          if (response.responseJSON.carrera !== undefined) {
          $('#carrera').attr('placeholder',response.responseJSON.carrera);
          $('#carrera').css({"border":"solid 1px red"});
        }
        if (response.responseJSON.institucion !== undefined) {
          $('#institucion').attr('placeholder',response.responseJSON.institucion);
          $('#institucion').css({"border":"solid 1px red"});
        }
      },
    }); 
  }else{
    alert('Seleccione el empleado');
  }
});

function cargarCarreras(valor){
  var td = $(valor).find("td");
  $('#carreras_id').val($($(td)[0]).html());
  $('#carrera').val($($(td)[1]).html());
  $('#institucion').val($($(td)[2]).html()); 
}

function limpiarCarrera(){
  $('#carreras_id').val('');
  $('#carrera').val('');
  $('#institucion').val('');  
}

$('#modificarCarrera').click(function(){
  $("#metodo_carreras").html("<input type='hidden' name='_method' value='PUT'>");
  $('#crrTbody').text("");
  var fila = "";
  $.ajax({
    url: '/carreras/1',
    type: 'POST',
    dataType: 'json',
    data:new FormData($("#form_carreras")[0]),
    processData: false,
    contentType: false,
    success:function(response){
      if (response.respuesta == undefined) {
          $(response).each(function(key,value){
            fila += "<tr onclick='cargarCarreras(this);'><td  style='display:none;'>"+value.id+"</td>";
            fila += "<td>"+value.carrera+"</td>";
            fila += "<td>"+value.institucion+"</td>";
            fila += "<td><a onclick='removerCarrera("+value.id+");'><i class='glyphicon glyphicon-remove'></i></a></td></tr>";
            $('#crrTbody').append(fila);
            fila = "";
        });
      limpiarCarrera();
    }else{
      alert(response.respuesta);
    }
    },
  });  
});
$('#cancelarCarreras').click(function(){
   limpiarCarrera();
});
function removerCarrera(id){
  $('#crrTbody').text("");
  var fila = "";
  $.ajax({
    url: '/carreras/'+id,
    type: 'POST',
    dataType: 'json',
    success:function(response){
          $(response).each(function(key,value){
            fila += "<tr onclick='cargarCarreras(this);'><td  style='display:none;'>"+value.id+"</td>";
            fila += "<td>"+value.carrera+"</td>";
            fila += "<td>"+value.institucion+"</td>";
            fila += "<td><a onclick='removerCarrera("+value.id+");'><i class='glyphicon glyphicon-remove'></i></a></td></tr>";
            $('#crrTbody').append(fila);
            fila = "";
        });
      limpiarCarrera();
    },
  });  
}
//-------------------------------------------------------------------------------------
/**********************************************************************************/
/**********************************************************************************/
//-------------------------------------------------------------------------------------
//manejo de ajax para puestos de trabajo
$('#agregar_puestos').click(function(){
  var id_empleado = $('.id_empleado').val();
  if (!isNaN(id_empleado) && id_empleado != 0) {
    $("#metodo_puestos").html("");
    $('#psttTbody').text("");
    var fila = "";
    $.ajax({
      url: '/puestosdetrabajo',
      type: 'POST',
      dataType: 'json',
      data:new FormData($("#form_puestos")[0]),
      processData: false,
      contentType: false,
      success:function(response){
        if (response.respuesta == undefined) {
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
          $('#puesto-alert').css({"display":"none"});
          limpiarPuesto();
        }else{
          alert(response.respuesta);
        }
      },error:function(response){
          if (response.responseJSON.puestos !== undefined) {
          $('#puestos').attr('placeholder',response.responseJSON.puestos);
          $('#puestos').css({"border":"solid 1px red"});
        }
        if (response.responseJSON.jornada !== undefined) {
          $('#jornada').attr('placeholder',response.responseJSON.jornada);
          $('#jornada').css({"border":"solid 1px red"});
        }
        if (response.responseJSON.area_vicerrectoria !== undefined) {
          $('#area_vicerrectoria').attr('placeholder',response.responseJSON.area_vicerrectoria);
          $('#area_vicerrectoria').css({"border":"solid 1px red"});
        }
        if (response.responseJSON.horario !== undefined) {
          $('#msg-phorario').text('*'+response.responseJSON.horario);
          $('#msg-phorario').fadeIn();
        }else{
          $('#msg-phorario').fadeOut();
        }

        $('#puesto-alert').css({"display":"block"});

      },
    }); 
  }else{
    alert('Seleccione el empleado');
  }
});

function cargarPuesto(valor){
  var td = $(valor).find("td");
  $('#puestos_id').val($($(td)[0]).html());
  $('#puestos').val($($(td)[1]).html());
  $('#jornada').val($($(td)[2]).html()); 
  $('#area_vicerrectoria').val($($(td)[4]).html());
}

function limpiarPuesto(){
  $('#puestos_id').val('');
  $('#puestos').val('');
  $('#jornada').val('');
  $('#horario_fijo').attr('checked',false);
  $('#horario_variado').attr('checked',false); 
  $('#area_vicerrectoria').val('');  
}

$('#modificarPuesto').click(function(){
  $("#metodo_puestos").html("<input type='hidden' name='_method' value='PUT'>");
  $('#psttTbody').text("");
  var fila = "";
  $.ajax({
    url: '/puestosdetrabajo/1',
    type: 'POST',
    dataType: 'json',
    data:new FormData($("#form_puestos")[0]),
    processData: false,
    contentType: false,
    success:function(response){
        if (response.respuesta == undefined) {
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
      limpiarPuesto();
    }else{
      alert(response.respuesta);
    }
    },
  });  
});

$('#cancelarPuesto').click(function(){
   limpiarPuesto();
   $('#puesto-alert').css({"display":"none"});
});
function removerPuestos(id){
  $('#psttTbody').text("");
  var fila = "";
  $.ajax({
    url: '/puestosdetrabajo/'+id,
    type: 'POST',
    dataType: 'json',
    success:function(response){
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
      limpiarPuesto();
    },
  });  
}
//-------------------------------------------------------------------------------------
/**********************************************************************************/
/**********************************************************************************/
//-------------------------------------------------------------------------------------
//manejo de ajax para habitos toxicos
$('#agregar_habitos').click(function(){
  var id_empleado = $('.id_empleado').val();
  if (!isNaN(id_empleado) && id_empleado != 0) {
    $("#metodo_habitos").html("");
    $('#hbtTTbody').text("");
    var fila = "";
    $.ajax({
      url: '/habitos',
      type: 'POST',
      dataType: 'json',
      data:new FormData($("#form_habitos")[0]),
      processData: false,
      contentType: false,
      success:function(response){
        if (response.respuesta == undefined) {
            $(response).each(function(key,value){
            fila += "<tr onclick='cargarHabitos(this);'><td  style='display:none;'>"+value.id+"</td>";
            fila += "<td>"+value.habito+"</td>";
            fila += "<td>"+value.frecuencia+"</td>";
            fila += "<td><a onclick='removerHabitos("+value.id+");'><i class='glyphicon glyphicon-remove'></i></a></td></tr>";
            $('#hbtTTbody').append(fila);
            fila = "";
          });
          limpiarHabitos();
        }else{
          alert(response.respuesta);
        }
      },error:function(response){
           console.log(response.responseJSON);
          if (response.responseJSON.habito !== undefined) {
          $('#habito').attr('placeholder',response.responseJSON.habito);
          $('#habito').css({"border":"solid 1px red"});
          }
      },
    }); 
  }else{
    alert('Seleccione el empleado');
  }
});

function cargarHabitos(valor){
  var td = $(valor).find("td");
  $('#habitos_id').val($($(td)[0]).html());
  $('#habito').val($($(td)[1]).html());
  $('#frecuencia').val($($(td)[2]).html());
}

function limpiarHabitos(){
  $('#habitos_id').val('');
  $('#habito').val('');
  $('#frecuencia').val('');
}
$('#modificar_habitos').click(function(){
  $("#metodo_habitos").html("<input type='hidden' name='_method' value='PUT'>");
  $('#hbtTTbody').text("");
  var fila = "";
  $.ajax({
    url: '/habitos/1',
    type: 'POST',
    dataType: 'json',
    data:new FormData($("#form_habitos")[0]),
    processData: false,
    contentType: false,
    success:function(response){
       if (response.respuesta == undefined) {
          $(response).each(function(key,value){
            fila += "<tr onclick='cargarHabitos(this);'><td  style='display:none;'>"+value.id+"</td>";
            fila += "<td>"+value.habito+"</td>";
            fila += "<td>"+value.frecuencia+"</td>";
            fila += "<td><a onclick='removerHabitos("+value.id+");'><i class='glyphicon glyphicon-remove'></i></a></td></tr>";
            $('#hbtTTbody').append(fila);
            fila = "";
        });
     limpiarHabitos();
    }else{
      alert(response.respuesta);
    }
    },
  });  
});
$('#cancelar_habitos').click(function(){
   limpiarHabitos();
});
function removerHabitos(id){
  $('#hbtTTbody').text("");
  var fila = "";
  $.ajax({
    url: '/habitos/'+id,
    type: 'POST',
    dataType: 'json',
    success:function(response){
          $(response).each(function(key,value){
            fila += "<tr onclick='cargarHabitos(this);'><td  style='display:none;'>"+value.id+"</td>";
            fila += "<td>"+value.habito+"</td>";
            fila += "<td>"+value.frecuencia+"</td>";
            fila += "<td><a onclick='removerHabitos("+value.id+");'><i class='glyphicon glyphicon-remove'></i></a></td></tr>";
            $('#hbtTTbody').append(fila);
            fila = "";
        });
     limpiarHabitos();
    },
  });  
}
//-------------------------------------------------------------------------------------
/**********************************************************************************/
/**********************************************************************************/
//-------------------------------------------------------------------------------------
//manejo de ajax para factores de riesgos
$('#agregar_factores').click(function(){
  var id_empleado = $('.id_empleado').val();
  if (!isNaN(id_empleado) && id_empleado != 0) {
    $("#metodo_factores").html("");
    $('#ftrrTTbody').text("");
    var fila = "";
    $.ajax({
      url: '/factoresderiesgos',
      type: 'POST',
      dataType: 'json',
      data:new FormData($("#form_factores")[0]),
      processData: false,
      contentType: false,
      success:function(response){
        if (response.respuesta == undefined) {
            $(response).each(function(key,value){
            fila += "<tr onclick='cargarFactores(this);'><td  style='display:none;'>"+value.id+"</td>";
            fila += "<td>"+value.factor+"</td>";
            fila += "<td>"+value.control+"</td>";
            fila += "<td>"+value.diagnosticado+"</td>";
            fila += "<td><a onclick='removerFactores("+value.id+");'><i class='glyphicon glyphicon-remove'></i></a></td></tr>";
            $('#ftrrTTbody').append(fila);
            fila = "";
          });
          limpiarFactores();
        }else{
          alert(response.respuesta);
        }
      },error:function(response){
          if (response.responseJSON.control !== undefined) {
          $('#msg-ffcontrol').text('*'+response.responseJSON.control);
          $('#msg-ffcontrol').fadeIn();
          }else{
          $('#msg-ffcontrol').fadeOut();
          }

          if (response.responseJSON.diagnosticado !== undefined) {
          $('#msg-ffdiagnosticado').text('*'+response.responseJSON.diagnosticado);
          $('#msg-ffdiagnosticado').fadeIn();
          }else{
          $('#msg-ffdiagnosticado').fadeOut();
          }

          $('#factores-alert').css({"display":"block"});
      },
    }); 
  }else{
    alert('Seleccione el empleado');
  }
});

function cargarFactores(valor){
  var td = $(valor).find("td");
  $('#factores_id').val($($(td)[0]).html());
  $('#factor').val($($(td)[1]).html());
}

function limpiarFactores(){
  $('#factores_id').val('');
  $('#factor').val('');
  $('#factor_control_si').attr('checked',false);
  $('#factor_control_no').attr('checked',false);
  $('#factor_diagnosticado_si').attr('checked',false);
  $('#factor_diagnosticado_no').attr('checked',false);
}

$('#modificar_factores').click(function(){
  $("#metodo_factores").html("<input type='hidden' name='_method' value='PUT'>");
  $('#ftrrTTbody').text("");
  var fila = "";
  $.ajax({
    url: '/factoresderiesgos/1',
    type: 'POST',
    dataType: 'json',
    data:new FormData($("#form_factores")[0]),
    processData: false,
    contentType: false,
    success:function(response){
       if (response.respuesta == undefined) {
          $(response).each(function(key,value){
            fila += "<tr onclick='cargarFactores(this);'><td  style='display:none;'>"+value.id+"</td>";
            fila += "<td>"+value.factor+"</td>";
            fila += "<td>"+value.control+"</td>";
            fila += "<td>"+value.diagnosticado+"</td>";
            fila += "<td><a onclick='removerFactores("+value.id+");'><i class='glyphicon glyphicon-remove'></i></a></td></tr>";
            $('#ftrrTTbody').append(fila);
            fila = "";
        });
    $('#factores-alert').css({"display":"none"});
    limpiarFactores();
    }else{
      alert(response.respuesta);
    }
    },
  });  
});
$('#cancelar_factores').click(function(){
   limpiarFactores();
   $('#factores-alert').css({"display":"none"});
});

function removerFactores(id){
  $('#ftrrTTbody').text("");
  var fila = "";
  $.ajax({
    url: '/factoresderiesgos/'+id,
    type: 'POST',
    dataType: 'json',
    success:function(response){
          $(response).each(function(key,value){
            fila += "<tr onclick='cargarFactores(this);'><td  style='display:none;'>"+value.id+"</td>";
            fila += "<td>"+value.factor+"</td>";
            fila += "<td>"+value.control+"</td>";
            fila += "<td>"+value.diagnosticado+"</td>";
            fila += "<td><a onclick='removerFactores("+value.id+");'><i class='glyphicon glyphicon-remove'></i></a></td></tr>";
            $('#ftrrTTbody').append(fila);
            fila = "";
        });
     limpiarFactores();
    },
  });  
}

//**************************************************************************************************************************88
/*
      licencias mediccas
*/
//funciones que cargan los datos del empleado
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
$('#agregar_licencia').click(function(){
  var id_empleado = $('.id_empleado').val();
  if (!isNaN(id_empleado) && id_empleado != 0) {
    $("#metodo_licencia").html("");
    $('#lccbody').text("");
    var fila = "";
    $.ajax({
      url: '/licencia',
      type: 'POST',
      dataType: 'json',
      data:new FormData($("#form_licencia")[0]),
      processData: false,
      contentType: false,
      success:function(response){
        console.log(response);
        if(response.respuesta == undefined) {
          $(response).each(function(key,value){
            fila += "<tr onclick='cargarLicencia(this);'><td  style='display:none;'>"+value.id+"</td>";
            fila += "<td>"+value.fecha+"</td>";
            fila += "<td>"+value.descripsion+"</td>";
            fila += "<td><a onclick='removerLicencia("+value.id+");'><i class='glyphicon glyphicon-remove'></i></a></td></tr>";
            $('#lccbody').append(fila);
            fila = "";            
          });
          $('#msg-pcontrol').fadeOut();
          $('#msg-ptratado').fadeOut();
          $('#personales-alert').css({"display":"none"});
        //  limpiarAntecentesPersonales();
        }else{
          alert(response.respuesta);
            $('#msg-licencia-fecha').fadeOut();
            $('#msg-licencia-descripcion').fadeOut();
            $('#licencia-alert').fadeOut();
        }
        limpiarLicencia();
      },
      error:function(response){
          if (response.responseJSON.fecha !== undefined) {
            $('#msg-licencia-fecha').text('*'+response.responseJSON.fecha);
            $('#msg-licencia-fecha').fadeIn();
          }else{
            $('#msg-licencia-fecha').fadeOut();
          }

          if (response.responseJSON.licencia !== undefined) {
            $('#msg-licencia-descripcion').text('*'+response.responseJSON.licencia);
            $('#msg-licencia-descripcion').fadeIn();
          }else{
            $('#msg-licencia-descripcion').fadeOut();
          }
          $('#licencia-alert').css({"display":"block"});
          limpiarLicencia();
      },
    }); 
  }else{
    alert('Seleccione el empleado');
    limpiarLicencia();
  }
    
});


function cargarLicencia(valor){
  var td = $(valor).find("td");
  $('#licencia_id').val($($(td)[0]).html());
  $('#fecha').val($($(td)[1]).html());
  $('#licencia_descripsion').val($($(td)[2]).html());
}

$('#modificar_licencia').click(function(){
  
  $("#metodo_licencia").html("<input type='hidden' name='_method' value='PUT'>");
  $('#lccbody').text("");
  var fila = "";
  $.ajax({
    url: '/licencia/1',
    type: 'POST',
    dataType: 'json',
    data:new FormData($("#form_licencia")[0]),
    processData: false,
    contentType: false,
    success:function(response){
      if (response.respuesta == undefined) {
        $(response).each(function(key,value){
          fila += "<tr onclick='cargarLicencia(this);'><td  style='display:none;'>"+value.id+"</td>";
          fila += "<td>"+value.fecha+"</td>";
          fila += "<td>"+value.descripsion+"</td>";
          fila += "<td><a onclick='removerLicencia("+value.id+");'><i class='glyphicon glyphicon-remove'></i></a></td></tr>";
          $('#lccbody').append(fila);
          fila = "";            
      });
    }else{
      alert(response.respuesta);
    }
    limpiarLicencia();
    },
  });  
});

function limpiarLicencia(){
  $('#licencia_id').val('');
  $('#fecha').val('');
  $('#licencia_descripsion').val('');
}

$('#cancelar_licencia').click(function(){
   limpiarLicencia();
});

function removerLicencia(id){
  $('#lccbody').text("");
  var fila = "";
  $.ajax({
    url: '/licencia/'+id,
    type: 'DELETE',
    dataType: 'json',
    success:function(response){
        $(response).each(function(key,value){
          fila += "<tr onclick='cargarLicencia(this);'><td  style='display:none;'>"+value.id+"</td>";
          fila += "<td>"+value.fecha+"</td>";
          fila += "<td>"+value.descripsion+"</td>";
          fila += "<td><a onclick='removerLicencia("+value.id+");'><i class='glyphicon glyphicon-remove'></i></a></td></tr>";
          $('#lccbody').append(fila);
          fila = "";            
      });
      limpiarLicencia();
    },
  });  
}


//opciones para el filtrado
//*********************************************************************************
//*********************************************************************************
//*********************************************************************************
//*********************************************************************************
    $('#buscar-empleado').keyup(function(){
        var regex = /^[a-zA-Z\s]+$/;  
        
        var fila = '';
        var datos = ($('#buscar-empleado').val());
        if (regex.test(datos)) {
           $('#tbdEmpleados').html('');
          $.get('/empleado/filtrar/'+datos,function(response){
            if (response.respuesta == undefined) {
            $(response.data).each(function(key,value){
                $(value).each(function(k,v){
                    fila = "<tr><td>"+v.nombre+"</td><td>"+v.apellido+"</td><td>"+v.edad+"</td><td>"+v.cedula+"</td><td>"+v.sexo+"</td>";
                    fila += "<td>"+v.telefono_casa+"</td><td>"+v.telefono_movil+"</td><td>"+v.direccion+"</td>"; 

                    fila += "<td><a href='/empleado/"+v.id+"/edit'> <i class='glyphicon glyphicon-edit'></i>";
                    fila += "</a><a href='/empleado/"+v.id+"'> <i class='glyphicon glyphicon-search'></i></a>";
                    fila += "<a href='/documento/"+v.id+"'> <i class='glyphicon glyphicon-file'></i></a></td></tr>";
                    $('#tbdEmpleados').html(fila);      
                });
            });

            datos = '';
          }else{
            console.log(response.data);
            location.reload();
            datos = '';
          }
        });
        }else{
          console.log('no letra');
        }
    }); 

