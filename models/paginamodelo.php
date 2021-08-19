<?php

class PaginaModelo {
	
	function enlacesPaginasModelo($enlace){

		//VALIDAR LOS ENLACES - LITA BLANCA
		if ($enlace == 'ingresar' ||  
			$enlace == 'inicio' ||  
			$enlace == 'registrar' ||
			$enlace == 'salir' ||   
			$enlace == 'usuarios' ||
			$enlace == 'editarusuario' ||
			$enlace == 'frmSitioTuristico' ||
			$enlace == 'frmSitioTuristicocons' ||
			$enlace == 'frmSitioTuristicoedit') {
			$modulo = 'views/modules/' . $enlace . '.php';
	}
	elseif ($enlace == 'index') {
		$modulo = 'views/modules/registrar.php';
	}
	elseif ($enlace == 'ok') {
		$modulo = 'views/modules/registrar.php';
	}
	elseif ($enlace == 'fallo') {
		$modulo = 'views/modules/ingresar.php';
	}
	elseif ($enlace == 'fallointento') {
		$modulo = 'views/modules/ingresar.php';
	}
	elseif ($enlace == 'upok' || $enlace == 'delok') {
		$modulo = 'views/modules/usuarios.php';
	}
	elseif ($enlace == 'okincons' || $enlace == 'falloincons') {
		$modulo = "views/modules/frmSitioTuristico.php";
	}
	elseif ($enlace == 'okay' || $enlace == 'delokay') {
		$modulo = "views/modules/frmSitioTuristicocons.php";
	}
	else{
		$modulo = 'views/modules/inicio.php';
	}
	return $modulo; 
	}
}

?>