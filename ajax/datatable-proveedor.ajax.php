<?php
require_once "../controladores/proveedores.controlador.php";
require_once "../modelos/proveedores.modelo.php";

class TablaProductos{

	public function mostrarTablaProductos(){

		$item = null;
    	$valor = null;
    	$orden = "id";

  		$proveedores = ControladorProveedores::ctrMostrarProveedor($item, $valor, $orden);	

  		if(count($proveedores) == 0){

  			echo '{"data": []}';

		  	return;
  		}
		
  		$datosJson = '{
		  "data": [';

		  for($i = 0; $i < count($proveedores); $i++){

		  	$imagen = "<img src='".$proveedores[$i]["imagen"]."' width='40px'>";

		  	$item = "id";
		  	$valor = $proveedores[$i]["id_categoria"];

		  	$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

  			if($proveedores[$i]["stock"] <= 10){

  				$stock = "<button class='btn btn-danger'>".$proveedores[$i]["stock"]."</button>";

  			}else if($proveedores[$i]["stock"] > 11 && $proveedores[$i]["stock"] <= 15){

  				$stock = "<button class='btn btn-warning'>".$proveedores[$i]["stock"]."</button>";

  			}else{

  				$stock = "<button class='btn btn-success'>".$proveedores[$i]["stock"]."</button>";

  			}


  			if(isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Especial"){

  				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='".$proveedores[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button></div>"; 

  			}else{

  				 $botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='".$proveedores[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProducto' idProducto='".$proveedores[$i]["id"]."' codigo='".$proveedores[$i]["codigo"]."' imagen='".$proveedores[$i]["imagen"]."'><i class='fa fa-times'></i></button></div>"; 

  			}

		  	$datosJson .='[
			      "'.($i+1).'",
			      "'.$imagen.'",
			      "'.$proveedores[$i]["codigo"].'",
			      "'.$proveedores[$i]["descripcion"].'",
			      "'.$categorias["categoria"].'",
			      "'.$stock.'",
			      "'.$proveedores[$i]["precio_compra"].'",
			      "'.$proveedores[$i]["precio_venta"].'",
			      "'.$proveedores[$i]["fecha"].'",
			      "'.$botones.'"
			    ],';

		  }
		  $datosJson = substr($datosJson, 0, -1);
		 $datosJson .=   '] 
		 }';		
		echo $datosJson;
	}
}

$activarProductos = new TablaProductos();
$activarProductos -> mostrarTablaProductos();

