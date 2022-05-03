<?php

class Conexion{

	public static function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=bazar3",
			            "root",
			            "");

		$link->exec("set names utf8");

		return $link;

	}

}