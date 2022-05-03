
$(".tablas").on("click", ".btnEditarProveedor", function(){
    //alert("ver")
	var idProveedor = $(this).attr("idProveedor");

	var datos = new FormData();
    datos.append("idProveedor", idProveedor);
    //alert("ver"+idProveedor);
    $.ajax({

      url:"ajax/proveedores.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      //alert(JSON.stringify(respuesta));
      	   $("#idProveedor").val(respuesta["id_proveedor"]);
	       $("#editarNombre").val(respuesta["nombre"]);
	       $("#editarTelefono").val(respuesta["telefono"]);
	       $("#editarDireccion").val(respuesta["direccion"]);
	       $("#editarTelefonoRepartidor").val(respuesta["telefono_repartidor"]);
	  },
      error: function (request, status, error) {
        //alert(request.responseText);
    }
  	})

})


$(".tablas").on("click", ".btnEliminarProveedor", function(){

	var idProveedor = $(this).attr("idProveedor");
	
	swal({
        title: '¿Está seguro de borrar el cliente?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar cliente!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=proveedores&idProveedor="+idProveedor;
        }

  })

})