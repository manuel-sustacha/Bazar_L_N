/*EDITAR */
$(".tablas").on("click", ".btnEditarUsuario", function(){

	var idUsuario = $(this).attr("idUsuario");
	
	var datos = new FormData();
	datos.append("idUsuario", idUsuario);
	$.ajax({

		url:"ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			$("#id_usuario").val(respuesta["id_usuario"]);
			$("#editarNombre").val(respuesta["nombre"]);
			$("#editarApellido").val(respuesta["apellido"]);
			$("#editarTelefono").val(respuesta["telefono"]);
			$("#editarEmail").val(respuesta["email"]);
			$("#editarRol").html(respuesta["id_rol"]);
			$("#editarRol").val(respuesta["id_rol"]);
			$("#passwordActual").val(respuesta["password"]);
		}
	});

})

/*ACTIVAR USUARIO*/
$(".tablas").on("click", ".btnActivar", function(){

	var idUsuario = $(this).attr("idUsuario");
	var estadoUsuario = $(this).attr("estadoUsuario");
	var datos = new FormData();
 	datos.append("activarId", idUsuario);
  	datos.append("activarUsuario", estadoUsuario);	  
  	$.ajax({
	  url:"ajax/usuarios.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){

      		if(window.matchMedia("(max-width:767px)").matches){

	      		 swal({
			      title: "El usuario ha sido actualizado",
			      type: "success",
			      confirmButtonText: "¡Cerrar!"
			    }).then(function(result) {
			        if (result.value) {

			        	window.location = "usuarios";

			        }


				});

	      	}

      }

  	})

  	if(estadoUsuario == 'act'){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('INACTIVO');
  		$(this).attr('estadoUsuario','ina');

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('ACTIVO');
  		$(this).attr('estadoUsuario','act');

  	}

})