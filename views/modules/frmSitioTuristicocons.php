<?php

session_start();
if (!$_SESSION['validado']) {
	header('location:ingresar');
	exit();
}

$control = new SitioTuristicoControlador();

?>
<h5>Listado De Sitios Turisticos</h5><br>

<table class="table table-hover table-dark" style="width: 1290px;">
	<thead>
		<th>Nombre</th>
		<th>Dirección</th>
		<th>Teléfono</th>
		<th>Categoría</th>
		<th>Correo</th>
		<th>Propietario</th>
		<th>Descripción</th>
		<th>Año</th>
		<th colspan="2">&nbsp;&nbsp;Opciones&nbsp;&nbsp;</th>
	</thead>
	<?php 

	$control->consultarSitioTuristicoControlador();
	$control->eliminarSitioTuristicoControlador();
	?>
</table>
<?php 

if(isset($_GET['action'])){
	if($_GET['action'] == 'okay'){
		print "<div align='center' style='padding-top: 10px;'><p class='alert alert-primary' role='alert' style='width: 1290px;'>Sitio Turistico actualizado correctamente
		<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		<span aria-hidden='true'>&times;</span></button></p></div>";
	}
	elseif ($_GET['action'] == 'delokay'){
		print "<div align='center'><p class='alert alert-success' role='alert' style='width: 1290px;'>Sitio Turistico eliminado correctamente
		<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		<span aria-hidden='true'>&times;</span></button></p></div>";
	}
}

?>