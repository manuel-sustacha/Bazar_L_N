<?php

require_once "conexion.php";

class ModeloUsuarios{
	
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
	
	// MODELO MOSTRAR USUARIOS
	static public function mdlMostrarUsuarios($tabla, $item, $valor){
		if($item != null){
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
		
				$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
		
				$stmt -> execute();
		
				return $stmt -> fetch();
		
		}else{
		
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		
					$stmt -> execute();
		
					return $stmt -> fetchAll();
		
				}
		
			$stmt -> close();
		
				$stmt = null;
		
	}

	// MODELO EDITAR - ACTUALIZAR USUARIOS
	/*	EDITAR */

	static public function mdlEditarUsuario($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_usuario = id_usuario, nombre = :nombre, apellido = :apellido, telefono = :telefono, email = :email,  password = :password, id_rol = :id_rol WHERE id_usuario = :id_usuario");
		$stmt -> bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_STR);
		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
		$stmt -> bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":id_rol", $datos["id_rol"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*	ACTUALIZAR */

	static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2){
		

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
	

}