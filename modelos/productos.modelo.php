<?php
require_once "conexion.php";
class productosModelo{

    static public function mdlListarproductos(){
        $stmt = Conexion::conectar()->prepare('call prc_ListarProductos');
        $stmt->execute();
        return $stmt->fetchAll();
    }
}