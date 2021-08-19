<form method="post" class="form" onsubmit="return validarDatos();">
	<h5>Registrar Turistas</h5>
	<div class=" centradoR">
	<label for="nombre">Nombre De Turista<span></span></label>
	<input class="form-control" type="text" id="nombre" name="nombre" minlength="5" placeholder="5-8 Caracteres, letras y números" maxlength="8" required><br>

	<label for="email">Correo Electronico<span></span></label>
	<input class="form-control" type="email" id="email" name="email" placeholder="Ingrese su Email" required><br>

	<label for="clave">Contraseña</label>
	<input class="form-control" type="password" id="clave" name="clave" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" max="40" placeholder="8-40 caracteres, 1 letra mayuscula"><br>
	
	<div class="form-check">
    <input type="checkbox" class="form-check-input" id="Check1" required="">
    <label class="form-check-label" for="Check1" style="width: 225px;">He leído y acepto los términos y condiciones</label>
  	</div><br>
	<input class="button" type="submit" name="enviar" value="Registrarme">
	
	<br><br>
	</div>
</form>
<?php

$control = new UsuarioControlador();
$control->registrarUsuarioControlador();

if(isset($_GET['action'])){
	if($_GET['action'] == 'ok'){
		header("location:ingresar");
	}
  }
?>