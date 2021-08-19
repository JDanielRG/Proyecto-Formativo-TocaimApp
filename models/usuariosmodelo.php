<?php

require_once('conexion.php');

class UsuariosModelo extends Conexion {
	
	public function registrarUsuariosModelo($datos, $tabla)	{
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (usuNombre, usuEmail, usuPassword) VALUES (:nombre, :email, :clave)");

		$stmt->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
		$stmt->bindParam("email", $datos['email'], PDO::PARAM_STR);
		$stmt->bindParam(":clave", $datos['clave'], PDO::PARAM_STR);

		try {
			if($stmt->execute()){
				return "success";
			}
			else{
				return "error";
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}

		$stmt->close();
	}

	public function loginUsuarioModelo($datos, $tabla){

		$stmt= Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE usuNombre = :nombre");
		$stmt->bindParam(":nombre", $datos['nombre']);

		try {
			
			$stmt->execute();

			return $stmt->fetch();

		} catch (PDOException $e) {
			print_r($e->getMessage());
		}

		$stmt->close();
	}


	public function consultarUsuariosModelo($tabla){
		
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$stmt->bindParam(':id', $id, PDO::PARAM_INT);

		try{
			if($stmt->execute()){
				return $stmt->fetchAll();
			}
			else{
				return[];
			}
		}catch (PDOException $e) {
			print_r($e->getMessage());
		}
		$stmt->close();
	}

	public function consultarUsuarioIdModelo($id, $tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idUsuario = :id");
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);

		try {
			$stmt->execute();
			return $stmt->fetch();			
		} catch (PDOException $e) {
			print_r("error ".$e->getMessage());
		}

		$stmt->close();
	}

	public function actualizarUsuarioModelo($datos, $tabla){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuNombre = :nombre, usuEmail = :email, usuPassword = :clave WHERE idUsuario = :id");

		$stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
		$stmt->bindParam(':email', $datos['email'], PDO::PARAM_STR);
		$stmt->bindParam(':clave', $datos['clave'], PDO::PARAM_STR);
		$stmt->bindParam(':id', $datos['id'], PDO::PARAM_INT);

		try {
			if ($stmt->execute()) {
				return 'success';
			}
			else{
				return 'error';
			}			
			
		} catch (PDOException $e) {
			print_r("Error ".$e->getMessage());
		}
		$stmt->close();
	}


	public function eliminarUsuarioModelo($id,$tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idUsuario = :id");

		$stmt->bindParam(':id', $id, PDO::PARAM_INT);

		try {
			if ($stmt->execute()) {
				return 'success';
			}
			else{
				return "error";
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}

		$stmt->close();
	}

	public function actualizarIntentosModelo($datos,$tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET intentos = :intentos WHERE usuNombre = :usuario");

		$stmt->bindParam(':intentos', $datos['numIntentos'], PDO::PARAM_INT);

		$stmt->bindParam(':usuario', $datos['usuario'], PDO::PARAM_STR);

		try {
			if($stmt->execute()){
				return 'success';
			}
			else{
				return 'error';
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}

		$stmt->close();
	}

	///METODO PARA USUARIOS REPETIDOS:

	public function validarUsuarioModel($dato,$tabla){

		$stmt = Conexion::conectar()->prepare("SELECT usuNombre FROM $tabla 
			WHERE usuNombre = :nombre");

		$stmt->bindParam(':nombre', $dato, PDO::PARAM_STR);

		try {
			if($stmt->execute()){
				return $stmt->fetch();
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}

		$stmt->close();

	}

	//METODO PARA BUSCAR CORREOS REPETIDOS;
	public function validarEmailModel($dato,$tabla){

		$stmt = Conexion::conectar()->prepare("SELECT usuEmail FROM $tabla
			WHERE usuEmail = :email");

		$stmt->bindParam(":email", $dato, PDO::PARAM_STR);

		try {
			
			if($stmt->execute()){
				return $stmt->fetch();
			}


		} catch (PDOException $e) {
			print_r($e->getMessage());
		}

		$stmt->close();

		}
	}
?>