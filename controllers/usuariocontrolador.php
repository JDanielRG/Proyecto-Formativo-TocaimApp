<?php

class UsuarioControlador {

	///método para registrar usuarios///
	public function registrarUsuarioControlador(){
		if(isset($_POST['nombre'])){

			/*VALIDAR USUARIO*/
			if (preg_match('/^[A-Za-z0-9]*$/', $_POST['nombre']) &&
				preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/', $_POST['clave']) &&
				preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/', $_POST['email'])) {

				$encriptado = crypt($_POST['clave'],'$2a$07$usesomesillystringforsalt$');

			$datos = array('nombre'	=> $_POST['nombre'],
				'email'	=>	$_POST['email'],
				'clave'	=>	$encriptado);

			$respuesta = new UsuariosModelo;
			$respuesta->registrarUsuariosModelo($datos, 'usuarios');

			if($respuesta == 'success'){
				header('Location:ok');
			}
			else{
				header("location:index.php");
			}
		}
	}
}

public function loginUsuarioControlador(){

	if (isset($_POST['nombreIngreso'])) {

		$encriptado = crypt($_POST['claveIngreso'],'$2a$07$usesomesillystringforsalt$');

		$datos = array("nombre" => $_POST['nombreIngreso'],
			"clave" => $encriptado);

		$respuesta = UsuariosModelo::loginUsuarioModelo($datos,'usuarios');

		$usuario = $_POST['nombreIngreso'];
		$intentos = $respuesta['intentos'];
		$maxIntentos = 3;

		if ($intentos < $maxIntentos) {

			if ($respuesta['usuNombre'] == $_POST['nombreIngreso'] && 
				$respuesta['usuPassword'] == $encriptado) {

				session_start();

			$_SESSION['validado'] = true;
			$_SESSION['usuario'] = $respuesta['usuNombre'];
			$_SESSION['idUsuario'] = $respuesta['idUsuario'];

					///ACTUALIZAR LA BASE DE DATOS EN EL CAMPO INTENTOS = 0
			$intentos = 0;
			$datos = array('usuario' => $usuario, 'numIntentos' => $intentos);

			$objIntentos = UsuariosModelo::actualizarIntentosModelo($datos,'usuarios');	

			header("location:inicio");
		}
		else{
			///INCREMENTAR LA VARIABLE $intentos en 1
			$intentos++;
			///ACTUALIZAR EN LA BASE DE DATOS EL # DE INTENTOS
			$datos = array('usuario' => $usuario, 'numIntentos' => $intentos);

			$objIntentos = UsuariosModelo::actualizarIntentosModelo($datos,'usuarios');					

			header("location:logout");
		}
	}
		else{
			////ACTUALIZAR NUEVAMEENTE LOS INTENTOS EN LA BASEDATOS A CERO
			$datos = array('usuario' => $usuario, 'numIntentos' => 0);

			//REDIRECCIONARLO A UNA PAGINA DE CAPTCHA
			header('location:fallointentos');
		}
	}
}

		public function consultarUsuariosControlador(){

			$obj = new UsuariosModelo();
			$respuesta = $obj->consultarUsuariosModelo('usuarios');

			foreach ($respuesta as $row => $valor){

				print "<tr>
				<td>{$valor['usuNombre']}</td>
				<td>{$valor['usuEmail']}</td>
				<td>{$valor['usuPassword']}</td>

				<td align='center'>
					<a href='index.php?action=editarusuario&idusuario={$valor['idUsuario']}'>
					<button class='btn btn-primary' style='width: 41px;'><span class='fas fa-edit'></span></button></a>
					
					<a href='index.php?action=usuarios&del={$valor['idUsuario']}'>
					<button class='btn btn-danger'><span class='fas fa-trash'></button></a>
				</td>
				</tr>";		
			}
		}


		public function consultarUsuarioIdControlador(){
			$id = $_GET['idusuario'];
			$obj = new UsuariosModelo;
			$datos = $obj -> consultarUsuarioIdModelo($id, 'usuarios');
			print '	 
			<input type="hidden" name="idModificar" value="'. $datos["idUsuario"].'">	
			<label for="nombre">Nombre De Turista</label>
			<input class="form-control" type="text" name="nombreModificar" value="' . $datos["usuNombre"] . '" placeholder="Edite su nombre de Turista" required style="margin-bottom: 18px">

			<label for="email">Correo Electronico</label>
			<input class="form-control" type="email" name="emailModificar" value="' . $datos["usuEmail"] . '" placeholder="Edite su correo electronico" required style="margin-bottom: 18px">

			<label for="clave">Contraseña</label>
			<input class="form-control" type="password" name="claveModificar" value="'. $datos["usuPassword"] . '" placeholder="Edite su contraseña" required style="margin-bottom: 28px">
			<button class="button_succes" style="margin-bottom: 28px">Actualizar</span></button>
			';
		}

		public function actualizarUsuarioControlador(){
			if (isset($_POST['nombreModificar'])) {

				$encriptado = crypt($_POST['claveModificar'],'$2a$07$usesomesillystringforsalt$');

				$datos = array('id' => $_POST['idModificar'],
					'nombre'		=> $_POST['nombreModificar'],
					'email' 		=> $_POST['emailModificar'],
					'clave' 		=> $encriptado
				);

				$respuesta = UsuariosModelo::actualizarUsuarioModelo($datos, 'usuarios');

				if($respuesta == 'success'){
					header("location:upok");
				}
				else{
					print "error";
				}
			}
		}

		public function eliminarUsuarioControlador(){
			if (isset($_GET['del'])) {
				$id = $_GET['del'];

				$obj = new UsuariosModelo;
				$respuesta = $obj -> eliminarUsuarioModelo($id,'usuarios');

				if ($respuesta == 'success') {
					header('location:delok');
				}
			}
		}

		///METOD PARA VALIDAR USUARIOS REPETIDOS:
		public function validarUsuarioControlador($dato){

			$respuesta = UsuariosModelo::validarUsuarioModelo($dato,'usuarios');

			if($respuesta){
				return 1;
			}
			else{
				return 0;
			}
		}

		///METODO PARA VALIDAR EL CORREO REPETIDO.
		public function validarEmailControlador($dato){

			$respuesta = UsuariosModelo::validarEmailModelo($dato,'usuarios');

			if ($respuesta) {
				return 1;
			}
			else{
				return 0;
		}
	}
}

?>