<?php

require_once "conexion.php";

class ModeloUsuarios{

	static public function mdlMostrarUsuarios($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();



	}
	
	//---- CREAR USUARIOS ----// 
	static public function mdlCrearUsuario($tabla, $datos){
		
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, apellido, telefono, email, password, id_rol, estado) VALUES ( :nombre, :apellido, :telefono, :email, :contrasena, :rol, :estado)");
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":contrasena", $datos["contrasena"], PDO::PARAM_STR);
		$stmt->bindParam(":rol", $datos["id_rol"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";	
		}else{
			return "error";
		}
		$stmt = null;
	}	

	//---- MODIFICAR USUARIOS ----//

	//---- LISTAR USUARIOS ----// 
	static public function mdlListarUsuarios($tabla, $item, $valor){


			$stmt = Conexion::conectar()->prepare("SELECT 
			                                       usuario.id_usuario,
												   usuario.nombre,
												   usuario.apellido,
												   usuario.telefono,
												   usuario.email,
												   roles.nombre AS rol,
												   usuario.estado,
												   IF(usuario.estado='ina','inactivo','activo') AS usuario_estado
												   FROM usuario
												   INNER JOIN roles ON usuario.id_rol = roles.id_rol;");

			$stmt = Conexion::conectar()->prepare("SELECT 
												   usuario.id_usuario,
												   usuario.nombre,
			                                       usuario.apellido,
			                                       usuario.telefono,
			                                       usuario.email,
			                                       roles.nombre AS rol,
												   usuario.estado, 
			                                       IF(usuario.estado='ina','inactivo','activo') AS usuarioest
			                                       FROM usuario
			                                       INNER JOIN roles ON usuario.id_rol = roles.id_rol;");

			$stmt -> execute();

			return $stmt -> fetchAll();

		

		
	}

	

}