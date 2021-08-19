<?php

session_start();
if (!$_SESSION['validado']) {
	header('location:ingresar');
	exit();
}

$control = new SitioTuristicoControlador();

?>
<br>
<form method="post" class="form extend" onsubmit="return validarDatos();">
	<h5>Registrar Sitio Turístico</h5>

	<div class="container centradoP">
		<div class="row">
			<div class="col-4"><label for="nombre">Nombre</label>
				<input class="form-control" type="text" id="nombre" name="nombre" placeholder="Máximo 40 Caracteres" maxlength="40" required><br></div>

			<div class="col-4"><label for="direccion">Dirección</label>
				<input class="form-control" type="text" id="direccion" name="direccion" placeholder="Máximo 40 Caracteres" maxlength="40" required><br></div>

			<div class="col-4"><label for="correo">Correo</label>
			<input class="form-control" type="email" id="correo" name="correo" placeholder="Correo electrónico del lugar" maxlength="40" required><br></div>
		</div>


		<div class="row">

			<div class="col-3"><label for="telefono">Teléfono</label>
				<input class="form-control" type="number" id="telefono" name="telefono" placeholder="línea o celular" maxlength="20" required><br></div>

			<div class="col-3"><label>Categoría</label><br>
				<select class="form-control" name="categoria">
					<option value="Piscinas" selected>Piscinas</option>
					<option value="Hoteles">Hoteles</option>
					<option value="Restaurantes">Restaurantes</option>
					<option value="Quebradas">Quebradas</option>
				</select><br></div>


			<div class="col-3"><label>Propietario</label>
				<input class="form-control" type="text" id="propietario" name="propietario" placeholder="nombres y apellidos" maxlength="40" required><br></div>

			<div class="col-3"><label>Año</label>
			<input class="form-control" type="date" id="year" name="year" placeholder="Correo electrónico del lugar" maxlength="10" required><br></div>

		</div>
		<div class="row">
				<div class="col-12"><label>Descripción</label><br>
					<textarea class="form-control" id="descripcion" name="descripcion" placeholder="Escriba una descripción la cual podrán ver los visitantes"></textarea><br></div>
		</div>

		<div class="row justify-content-center">
				<input class="button" type="submit" name="registrarcons" value="Registrar Sitio Turistico">
				</div>
			<br>
		</div>
</form>

	<?php

	$control = new SitioTuristicoControlador();
	$control->registrarSitioTuristicoControlador();

	if(isset($_GET['action'])){
		if($_GET['action'] == 'okincons'){
		}
		elseif ($_GET['action'] == 'falloincons') {
			print "Error al registrar el Sitio Turistico";
		}
	}

	?>