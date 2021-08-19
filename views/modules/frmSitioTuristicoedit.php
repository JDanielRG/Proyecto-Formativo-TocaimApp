<?php

session_start();
if (!$_SESSION['validado']) {
	header('location:index.php?action=ingresar');
	exit();
}

?>
<br>
<form method="post" class="form extend" onsubmit="return validarDatos();">
	<h5>Modificar Sitio Turístico</h5>
	<div class="container centradoP">
	<?php 
	$editar = new SitioTuristicoControlador();
	$editar->consultarSitioTuristicoIdControlador();
	$editar->actualizarSitioTuristicoControlador();
	?>
</form>