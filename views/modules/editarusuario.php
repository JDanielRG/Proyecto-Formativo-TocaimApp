<?php

session_start();
if (!$_SESSION['validado']) {
	header('location:index.php?action=ingresar');
	exit();
}

?>
<br>
<form method="post" class="form">
	<h5>Edicion De Turistas</h5>
	<div class="centradoR">
	<?php
	$editar = new UsuarioControlador();
	$editar->consultarUsuarioIdControlador();
	$editar->actualizarUsuarioControlador();
	?>
	</div>
</form>