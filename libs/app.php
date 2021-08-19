<?php
require_once 'controllers/error.php';

class App{
	function __construct(){
	////recepcion variable url

		if(isset($_GET['url'])){
			$url = $_GET['url'];
			$url = rtrim($url);
			$url = explode("/", $url);
		}

		if (empty($url[0])){
			$archivo = 'controllers/main.php';
			require_once $archivo;
			$controlador = new Main();
			$controlador->cargarModelo('main');
			$controlador->mostrarVista();
			return false;
		}

		$archivo = 'controllers/' . $url[0] . '.php';

	//validar archivos
		if (file_exists($archivo))
		{

			require_once $archivo;

			$controlador = new $url[0];
			$controlador->cargarModelo($url[0]);
		//obtener el numero de elementos de la variable URL
			$numParametros = sizeof($url);
			if($numParametros > 1){
				if($numParametros > 2){
					$param = [];

					for($i = 2; $i < $numParametros; $i++){
						array_push($param, $url[$i]);

					}
					$controlador->{$url[1]}($param);
				}
				else{
					$controlador->{$url[1]}();
				}
			}
		//si existe un metodo se carga aqui.
		/*if (isset($url[1]))
		{
			$controlador->{$url[1]}();
		}*/
		
		else{
			$controlador->mostrarVista();
		}
	}
	else{
		$controlador = new Errores();


		}
	}
}

?>