<form method="post" class="form">
	<h5>Iniciar Sesión</h5>
	<div class="centradoR">
	<label for="nombre">Nombre De Turista</label><br>
	<input class="form-control" type="text" name="nombreIngreso" placeholder=""><br>

	<label for="clave">Contraseña</label><br>
	<input class="form-control" type="password" name="claveIngreso" placeholder=""><br>
	<input class="button" type="submit" name="enviar" value="Ingresar">
	<br>
	<label class="centro" style="padding-top: 10px;"><a href="#">Olvide mi contraseña</a><br><a href="registrar">Registrarme</a></label>
	</div><br>
</form>
<?php

$control = new UsuarioControlador();
$control->loginUsuarioControlador();

if(isset($_GET['action'])){
	if ($_GET['action'] == 'logout') {
		print "El usuario y contraseña no es correcto";
	}

	if ($_GET['action'] == 'fallointentos') {
		print "<p>Usted ha realizado 3 intentos Fallidos</P>";
		print "<p>Por favor ponerse en contacto con el administrador del sitio</p>";
		print "<p>Por favor diligencie el captcha</p>";
	}
}

?>