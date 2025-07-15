<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";


class TablaAlertas{

 	/*=============================================
 	 MOSTRAR LA TABLA DE Alertas
  	=============================================*/ 

	public function mostrarTablaAlertas(){
		

  		$Alertas = ControladorProductos::ctrMostrarAlertas();	

  		if(count($Alertas) == 0){

  			//echo '{"data": []}';

		  	return;
  		}
		
  		$datosJson = '{
		  "data": [';

		  for($i = 0; $i < count($Alertas); $i++){

		  	

		  	/*=============================================
 	 		TRAEMOS LA CATEGORÍA
  			=============================================*/ 

		  	$item = "id";
		  	$valor = $Alertas[$i]["id_categoria"];

		  	$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

		  	/*=============================================
 	 		STOCK
  			=============================================*/ 

  			if($Alertas[$i]["stock"] <= 10){

  				$stock = "<button class='btn btn-danger'>".$Alertas[$i]["stock"]."</button>";

  			}else if($Alertas[$i]["stock"] > 11 && $Alertas[$i]["stock"] <= 15){

  				$stock = "<button class='btn btn-warning'>".$Alertas[$i]["stock"]."</button>";

  			}else{

  				$stock = "<button class='btn btn-success'>".$Alertas[$i]["stock"]."</button>";

  			}

		  	/*=============================================
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/ 


  				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='".$Alertas[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button></div>"; 


  		

		 
		  	$datosJson .='[
			      "'.($i+1).'",			     
			      "'.$Alertas[$i]["codigo"].'",
			      "'.$Alertas[$i]["descripcion"].'",
				  "'.$categorias["nombre"].'",	
				  "'.$Alertas[$i]["lote"].'",
				  "'.$Alertas[$i]["fechav"].'",			      				 
			      "'.$stock.'",
			      "'.$Alertas[$i]["precio_compra"].'",
			      "'.$Alertas[$i]["precio_venta"].'",
			      "'.$Alertas[$i]["fecha"].'",
			      "'.$botones.'"
			    ],';

		  }

		  $datosJson = substr($datosJson, 0, -1);

		 $datosJson .=']}';
		
		echo $datosJson;
        exit();

	}

}

/*=============================================
ACTIVAR TABLA DE Alertas
=============================================*/ 
$activarAlertas = new TablaAlertas();
$activarAlertas -> mostrarTablaAlertas();

