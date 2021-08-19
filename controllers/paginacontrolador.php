<?php

class PaginaControlador {

	///METODO PARA CARGAR PLANTILLA///
	
	public function template() {
		include "views/template.php";
	}

	public function enlacesPaginasControlador(){
		
		if (isset($_GET['action'])) {
			$enlace = $_GET['action'];
		}
		else{
			$enlace = 'ingresar';
		}

		if(isset($_SESSION['rol'])){
			$rol = $_SESSION['rol'];
		}
		else{
			$rol = 1;
		}

		$respuesta = new PaginaModelo();
		$pagina = $respuesta->enlacesPaginasModelo($enlace);


		include("$pagina");
	}
}

?>