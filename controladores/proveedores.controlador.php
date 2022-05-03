<?php

class ControladorProveedores{

	static public function ctrMostrarProveedores($item, $orden){

		$tabla = "proveedor";

		$respuesta = ModeloProveedores::mdlMostrarProveedores($tabla, $item, $orden);

		return $respuesta;

	}



	static public function ctrCrearProveedor(){

		if(isset($_POST["nuevoProveedor"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoProveedor"]) &&
			   preg_match('/^[0-9]+$/', $_POST["nuevoTelefono"]) &&	
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDireccion"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["nuevoTelefonoRepartidor"])){

				$tabla = "proveedor";

				$datos = array(
							   "nombre" => $_POST["nuevoProveedor"],
							   "telefono" => $_POST["nuevoTelefono"],
							   "direccion" => $_POST["nuevaDireccion"],
							   "telefono_repartidor" => $_POST["nuevoTelefonoRepartidor"]);

				$respuesta = ModeloProveedores::mdlIngresarProveedor($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "El proveedor ha sido guardado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "proveedores";

										}
									})

						</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El proveedor no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "proveedores";

							}
						})

			  	</script>';
			}
		}

	}


	static public function ctrEditarProveedor(){
			//echo("".json_encode($_POST));
		if(isset($_POST["editarNombre"])){

			if($_POST["editarNombre"] &&
			   preg_match('/^[0-9]+$/', $_POST["editarTelefono"]) &&	
				$_POST["editarDireccion"] &&
			   preg_match('/^[0-9.]+$/', $_POST["editarTelefonoRepartidor"])){


			   	
				$tabla = "proveedor";

				$datos = array("id_proveedor" => intval($_POST["idProveedor"]),
							   "nombre" => $_POST["editarNombre"],
							   "telefono" => $_POST["editarTelefono"],
							   "direccion" => $_POST["editarDireccion"],
							   "telefono_repartidor" => $_POST["editarTelefonoRepartidor"]);

				$respuesta = ModeloProveedores::mdlEditarProveedor($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "El proveedor ha sido editado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "proveedores";

										}
									})

						</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Verifique que los datos sean llenado de manera correcta!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "proveedores";

							}
						})

			  	</script>';
			}
		}

	}

	static public function ctrEliminarProveedor(){

		if(isset($_GET["idProveedor"])){

			$tabla ="proveedor";
			$datos = $_GET["idProveedor"];

			$respuesta = ModeloProveedores::mdlEliminarProveedor($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El proveedor ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "proveedores";

								}
							})

				</script>';

			}		
		}


	}

	static public function ctrMostrarSumaVentas(){

		$tabla = "proveedor";

		$respuesta = ModeloProveedores::mdlMostrarSumaVentas($tabla);

		return $respuesta;

	}


}