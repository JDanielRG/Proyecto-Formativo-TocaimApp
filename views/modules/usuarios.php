<script type="text/javascript" src="views/js/bootstrap.min.js"></script>
<style type="text/css">
</style>
<?php

session_start();
if (!$_SESSION['validado']) {
	header('location:ingresar');
	exit();
}

$control = new UsuarioControlador();

?>
<h5 class="recort">Página de Usuarios</h5>


<table style="width: 1090px;">
	<th><h6 style="text-align: left; padding-top: 0;">Usuario Actual: &nbsp;<b><?php print strtolower($_SESSION['usuario']); ?></h6></th>
	</table>


	<table class="table table-hover table-dark"  style="width: 1090px;">

		<thead>
			<th>Nombre</th>
			<th>Email</th>
			<th>Constraseña</th>
			<th colspan="2">&nbsp;&nbsp;Opciones&nbsp;&nbsp;</th>
		</thead>
		<tbody>
			<?php 

			$control->consultarUsuariosControlador();
			$control->eliminarUsuarioControlador();

			?>
		</tbody>
	</table>

	<?php 

	if (isset($_GET['action'])) {
		if($_GET['action'] == "upok"){
			print "<div align='center'><p class='alert alert-primary' role='alert' style='width: 1090px;'>Usuario Actualizado correctamente
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			<span aria-hidden='true'>&times;</span></button></p></div>";
		}
		elseif ($_GET['action'] == 'delok') {
			print "<div align='center'><p class='alert alert-success' role='alert' style='width: 1090px;'>Usuario eliminado correctamente
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			<span aria-hidden='true'>&times;</span></button></p></div>";
		}
	}

	?>

	<script>
		window.setTimeout(function() {
			$(".alert").fadeTo(1500, 0).slideDown(1000, function(){
				$(this).remove(); 
			});
		}, 3000); //2 segundos y desaparece
	</script>