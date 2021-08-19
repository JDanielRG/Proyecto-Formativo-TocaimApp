<?php

class Controlador {
	
	function __construct(){
		$this->view = new Vista();
	}


	function cargarModelo($modelo){
		$url = "models/" . $modelo . "modelo.php";
		if (file_exists($url)) {

			print $url;
			require_once $url;

			$nombreModelo = $modelo. "Modelo";
			$this->modelo = new $nombreModelo();
		}
	}
}
?>