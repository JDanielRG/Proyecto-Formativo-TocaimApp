<?php

	require_once('controllers/paginacontrolador.php');
	require_once('controllers/usuariocontrolador.php');
	require_once('controllers/SitioTuristicoControlador.php');
	require_once('models/paginamodelo.php');
	require_once('models/usuariosmodelo.php');
	require_once('models/SitioTuristicomodelo.php');
	$controlador = new PaginaControlador();
	$controlador->template();

?>