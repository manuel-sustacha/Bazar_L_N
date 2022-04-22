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


					if($respuesta["email"] == $_POST["ingUsuario"] && $respuesta["password"] == $_POST["ingPassword"]){

						$_SESSION["iniciarSesion"] = "ok";

						echo '<script>

							window.location = "inicio";

						</script>';
					}else{
						//echo '<br><div class="alert alert-danger">Error: correo o contraseña incorrecta</div>';
						echo '<script>alert("Error: correo y contraseña incorrectas")</script>';
					}
				
				}else{

					//echo '<br><div class="alert alert-danger">El usuario no existe</div>';
					echo '<script>alert("El usuario no existe")</script>';
				}


			}else{
				//echo '<br><div class="alert alert-danger" role="alert">Digite un correo valido</div>';
				echo '<script>alert("Digite un correo valido")</script>';
			}	

		}

	}

}
	


