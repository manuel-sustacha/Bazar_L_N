<?php

class ControladorUsuarios{

	public function ctrIngresoUsuario(){

		if(isset($_POST["ingUsuario"])){

			if(preg_match("/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/", $_POST["ingUsuario"])){

				$tabla = "usuario";

				$item = "email";
				$valor = $_POST["ingUsuario"];

				$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

				if(is_array($respuesta)){
					//$passwprdEncrypt=password_hash($respuesta["password"],PASSWORD_DEFAULT);
					if(password_verify($_POST["ingPassword"],$respuesta["password"])){

						$_SESSION["iniciarSesion"] = "ok";

						echo '<script>

							window.location = "inicio";

						</script>';
					}else{
						echo '<br><div class="alert alert-danger">Error: correo o contraseña incorrecta</div>';
					}
				
				}else{

					echo '<br><div class="alert alert-danger">El usuario no existe</div>';

				}


			}else{
				echo '<br><div class="alert alert-danger">Digite un correo valido</div>';
			}	

		}

	}

}
	


