//funciones que cargan los datos del empleado
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
$('#agregarGrupo').click(function(){
    $("#metodo_grupo").html("");
    $('#Gtbody').text("");
    var fila = "";
    $.ajax({
      url: '/grupo',
      type: 'POST',
      dataType: 'json',
      data:new FormData($("#form_grupo")[0]),
      processData: false,
      contentType: false,
      success:function(response){
        if (response.respuesta == undefined) {
          $(response.grupos).each(function(key,value){
            fila += "<tr onclick='llenarGrupos(this);'><td  style='display:none;'>"+value.id+"</td>";
            fila += "<td>"+value.grupo+"</td>";
            fila += "<td><a><i class='glyphicon glyphicon-edit'></i></a>";
            fila += "<a href='#' onclick='removerGrupos("+value.id+");'><i class='glyphicon glyphicon-remove'></i></a></td></tr>";
            $('#Gtbody').append(fila);
            fila = "";
                      
          });
          if (response.ok == true) {
              $('#grupo-alert').css({"display":"block"});
               $('#msg-grupo').text('Grupo agregado'); 
               $('#msg-grupo').fadeIn(); 
          }
        }else{
          alert(response.respuesta);
            $('#msg-grupo').fadeOut();
        }
        limpiarGrupos();
        window.location = '/grupo';
      },
      error:function(response){
          control.log(response);
           if (response.responseJSON.grupo !== undefined) {
           $('#personales_grupo').attr('placeholder',response.responseJSON.grupo);
           $('#personales_grupo').css({"border":"solid 1px red"});
          }
          $('#grupo-alert').css({"display":"block"});
          limpiarGrupos();
      },
    });     
});

function cargarGrupos(){
    var fila = "";
    $('#Gtbody').html(fila);
    $.get('/cargarGrupos',function(response){
        $(response.grupo).each(function(key,value){
            fila += "<tr onclick='llenarGrupos(this);'><td  style='display:none;'>"+value.id+"</td>";
            fila += "<td>"+value.grupo+"</td>";
            fila += "<td><a><i class='glyphicon glyphicon-edit'></i></a>";
            fila += "<a href='#' onclick='removerGrupos("+value.id+");'><i class='glyphicon glyphicon-remove'></i></a></td></tr>";
            $('#Gtbody').append(fila);
            fila = "";
        });
    });
}
cargarGrupos();

function llenarGrupos(valor){
  var td = $(valor).find("td");
  $('#grupo_id').val($($(td)[0]).html());
  $('#grupo').val($($(td)[1]).html());
}

function limpiarGrupos(){
  $('#grupo_id').val('');
  $('#grupo').val('');
}

$('#modificarGrupo').click(function(){
  
  $("#metodo_grupo").html("<input type='hidden' name='_method' value='PUT'>");
  $('#Gtbody').text("");
  var fila = "";
  $.ajax({
    url: '/grupo/1',
    type: 'POST',
    dataType: 'json',
    data:new FormData($("#form_grupo")[0]),
    processData: false,
    contentType: false,
    success:function(response){
      if (response.respuesta == undefined) {
          cargarGrupos();
      }else if(response.ok !== undefined && response.ok == true){
          $('#grupo-alert').css({"display":"block"});
          $('#msg-grupo').text('Actualizado'); 
          $('#msg-grupo').fadeIn(); 
      }else{
          alert(response.respuesta);
      }
      limpiarGrupos();
    },
  });  
});
function removerGrupos(id){
  $("#metodo_grupo").html("<input type='hidden' name='_method' value='DELETE'>");
  $('#Gtbody').text("");
  var fila = "";
  $.ajax({
    url: '/grupo/'+id,
    type: 'POST',
    dataType: 'json',
    data:new FormData($("#form_grupo")[0]),
    processData: false,
    contentType: false,
    success:function(response){
      if (response.ok == true) {
          $('#grupo-alert').css({"display":"block"});
          $('#msg-grupo').text('Removido'); 
          $('#msg-grupo').fadeIn(); 
      }
      cargarGrupos();
      limpiarGrupos();
    },
  });  
}
//antecedentes patologicos personales
//-------------------------------------------------------------------------------------
//**********************************************************************************
//**********************************************************************************
//-------------------------------------------------------------------------------------
//departamento
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
$('#agregarDepartamento').click(function(){
    $("#metodo_departamento").html("");
    $('#dpTbody').text("");
    var fila = "";
    $.ajax({
      url: '/departamento',
      type: 'POST',
      dataType: 'json',
      data:new FormData($("#form_departamento")[0]),
      processData: false,
      contentType: false,
      success:function(response){
        if (response.respuesta == undefined) {
          $(response).each(function(key,value){
            cargarDepartamentos();    
          });
          if (response.ok == true) {
              $('#departamento-alert').css({"display":"block"});
              $('#msg-departamento').text('Departamento agregado'); 
              $('#msg-departamento').fadeIn(); 
          }
        }else{
          alert(response.respuesta);
            $('#msg-departamento').fadeOut();
        }
      },
      error:function(response){
           console.log(response);
           //if (response.r.departamento !== undefined) {
           //$('#departamento').attr('placeholder',response.responseJSON.departamento);
           //$('#departamento').css({"border":"solid 1px red"});
          //}
          //$('#departamento-alert').css({"display":"block"});
      },
    });     
});

function cargarDepartamentos(){
    var fila = "";
    $('#dpTbody').html("");
    $.get('/departamento',function(response){
      $(response).each(function(key,value){
        fila += "<tr onclick='llenarDepartamento(this);'><td  style='display:none;'>"+value.id+"</td>";
        fila += "<td>"+value.grupo+"</td>";
        fila += "<td>"+value.departamento+"</td>";
        fila += "<td><a><i class='glyphicon glyphicon-edit'></i></a>";
        fila += "<a href='#' onclick='removerDepartamento("+value.id+");'><i class='glyphicon glyphicon-remove'></i></a></td></tr>";
        $('#dpTbody').append(fila);
        fila = "";
      });
    });
}
cargarDepartamentos();

function llenarDepartamento(valor){
  var td = $(valor).find("td");
  $('#departamento_id').val($($(td)[0]).html());
  $('#departamento').val($($(td)[2]).html());
}

function limpiarDepartamento(){
  $('#departamento_id').val('');
  $('#departamento').val('');
}

$('#modificarDepartamento').click(function(){
  
  $("#metodo_departamento").html("<input type='hidden' name='_method' value='PUT'>");
  $.ajax({
    url: '/departamento/1',
    type: 'POST',
    dataType: 'json',
    data:new FormData($("#form_departamento")[0]),
    processData: false,
    contentType: false,
    success:function(response){
      if (response.respuesta == undefined) {
          cargarDepartamentos();
      }else if(response.ok !== undefined && response.ok == true){
          $('#departamento-alert').css({"display":"block"});
          $('#msg-departamento').text('Actualizado'); 
          $('#msg-departamento').fadeIn(); 
      }else{
          alert(response.respuesta);
      }
      limpiarDepartamento();
    },
  });  
});

function removerDepartamento(id){
  $("#metodo_departamento").html("<input type='hidden' name='_method' value='DELETE'>");
  $('#dpTbody').text("");
  var fila = "";
  $.ajax({
    url: '/departamento/'+id,
    type: 'POST',
    dataType: 'json',
    data:new FormData($("#form_departamento")[0]),
    processData: false,
    contentType: false,
    success:function(response){
      if (response.respuesta == undefined) {
        cargarDepartamentos();
      }else if(response.ok !== undefined && response.ok == true){
        $('#departamento-alert').css({"display":"block"});
        $('#msg-departamento').text('Eliminado'); 
        $('#msg-departamento').fadeIn(); 
      }else{
        alert(response.respuesta);
      }
      limpiarDepartamento();
    },
  });  
}
//antecedentes patologicos personales
//-------------------------------------------------------------------------------------
//**********************************************************************************
//**********************************************************************************
//-------------------------------------------------------------------------------------
