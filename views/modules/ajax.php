<?php

require_once '../../controllers/controlador.php';
require_once '../../models/usuariosmodelo.php';

class Ajax {
	
	public $usuarioValidar;
	public $emailValidar;

	///METODO PARA VALIDAR USUARIOS REPETIDOS
	public function validarUsuarioAjax() {
		
		$dato = $this->usuarioValidar;

		$respuesta = Controlador::validarUsuarioControlador($dato);

		print $respuesta;
	}

	///METODO PARA VALIDAR EMAIL REPETIDO
	public function validarEmailAjax(){

		$dato = $this->emailValidar;

		$respuesta = Controlador::validarEmailControlador($dato);

		print $respuesta;
	}
}

//////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['varUsuario'])) {
	$ajaxUsuario = new Ajax();
	$ajaxUsuario->usuarioValidar = $_POST['varUsuario'];
	$ajaxUsuario->validarUsuarioAjax();
}

if (isset($_POST['varEmail'])) {
	$ajaxEmail = new Ajax();
	$ajaxEmail->emailValidar = $_POST['varEmail'];
	$ajaxEmail->validarEmailAjax();
}
?>