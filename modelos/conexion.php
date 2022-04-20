<?php

class Conexion{

	public function conectar(){

		$link = new PDO("mysql:host=XXXXXX;dbname=XXXX",
			            "XXXXX",
			            "XXXXX");

		$link->exec("set names utf8");

		return $link;

	}

}