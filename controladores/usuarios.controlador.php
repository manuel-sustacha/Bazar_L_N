<?php

class ControladorUsuarios
{

	public function ctrIngresoUsuario()
	{

		if (isset($_POST["ingUsuario"])) {

			if (preg_match("/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/", $_POST["ingUsuario"])) {

				$tabla = "usuario";

				$item = "email";
				$valor = $_POST["ingUsuario"];

				$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

				if (is_array($respuesta)) {
					//$passwprdEncrypt=password_hash($respuesta["password"],PASSWORD_DEFAULT);
					if (password_verify($_POST["ingPassword"], $respuesta["password"])) {

						$_SESSION["iniciarSesion"] = "ok";

						echo '<script>
							window.location = "inicio";
						</script>';
					} else {
						//echo '<br><div class="alert alert-danger">Error: correo o contraseña incorrecta</div>';
						echo '<script>alert("Error: correo y contraseña incorrectas")</script>';
					}
				} else {

					//echo '<br><div class="alert alert-danger">El usuario no existe</div>';
					echo '<script>alert("El usuario no existe")</script>';
				}
			} else {
				//echo '<br><div class="alert alert-danger" role="alert">Digite un correo valido</div>';
				echo '<script>alert("Digite un correo valido")</script>';
			}
		}
	}

	//--- CREAR USUARIOS ---//
	static public function ctrCrearUsuario()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
			$tabla = "usuario";

			$encriptar = crypt($_POST["contrasena"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

			$datos = array(
				"nombre" => $_POST["nombre"],
				"apellido" => $_POST["apellido"],
				"telefono" => $_POST["telefono"],
				"email" => $_POST["email"],
				"contrasena" => $encriptar,
				"id_rol" => $_POST["rol"],
				"estado" => $_POST["estadoIna"]
			);

			$respuesta = ModeloUsuarios::mdlCrearUsuario($tabla, $datos);

			if ($respuesta == "ok") {
				echo '<script>

					swal({

						type: "success",
						title: "¡El usuario ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "usuarios";

						}

					});
				

					</script>';
			} else {
				echo '<script>

					swal({

						type: "error",
						title: "El usuario no fue registrado",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "usuarios";

						}

					});
				

				</script>';
			}
		}
	}

	//--- CONTROLADOR MOSTRAR USUARIOS ---// 
	static public function ctrMostrarUsuarios($item, $valor)
	{

		$tabla = "usuario";

		$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

		return $respuesta;
	}

	//--- CONTROLADOR EDITAR USUARIOS ---//
	static public function ctrEditarUsuario()
	{
		if (isset($_POST["id_usuario"])) {

			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])) {

				$tabla = "usuario";

				if ($_POST["editarPassword"] != "") {

					if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])) {

						$encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
					} else {

						echo '<script>

								swal({
									  type: "error",
									  title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!",
									  showConfirmButton: true,
									  confirmButtonText: "Cerrar"
									  }).then(function(result) {
										if (result.value) {

										window.location = "usuarios";

										}
									})

						  	</script>';

						return;
					}
				} else {

					$encriptar = $_POST["passwordActual"];
				}

				$datos = array(
					"id_usuario"=>$_POST["id_usuario"],
					"nombre" => $_POST["editarNombre"],
					"apellido" => $_POST["editarApellido"],
					"telefono" => $_POST["editarTelefono"],
					"password" => $encriptar,
					"id_rol" => $_POST["editarRol"],
					"email" => $_POST["editarEmail"]
				);
				
				$respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

				if ($respuesta == "ok") {

					echo '<script>

					swal({
						  type: "success",
						  title: "El usuario ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "usuarios";

									}
								})

					</script>';
				}
			} else {

				echo '<script>

					swal({
						  type: "error",
						  title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
							if (result.value) {

							window.location = "usuarios";

							}
						})

			  	</script>';
			}
		}
	}

	//--- CONTROLADOR BORRAR USUARIOS ---//
	static public function ctrBorrarUsuario(){

		if(isset($_GET["idUsuario"])){

			$tabla ="usuario";
			$datos = $_GET["idUsuario"];

			$respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El usuario ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "usuarios";

								}
							})

				</script>';

			}		

		}
	}

}
