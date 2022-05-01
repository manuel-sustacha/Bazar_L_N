<?php
require_once "conexion.php";
class productosModelo{

    static public function mdlListarProductos(){
        $stmt = Conexion::conectar()->prepare('call prc_ListarProductos');
        $stmt->execute();
        return $stmt->fetchAll();
    }
}