<?php

require_once 'conexion.php';

class SitioTuristicoModelo extends Conexion {


	
	public function registrarSitioTuristicoModelo($datos, $tabla){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombreST, direccionST, telefonoST, tipoST, correoST, propietarioST, descripcionST, yearST) VALUES (:s, :t, :u, :v, :w, :x, :y, :z)");

		$stmt -> bindParam(':s', $datos['nombre'], PDO::PARAM_STR);
		$stmt -> bindParam(':t', $datos['direccion'], PDO::PARAM_STR);
		$stmt -> bindParam(':u', $datos['telefono'], PDO::PARAM_STR);
		$stmt -> bindParam(':v', $datos['categoria'], PDO::PARAM_STR);
		$stmt -> bindParam(':w', $datos['correo'], PDO::PARAM_STR);
		$stmt -> bindParam(':x', $datos['propietario'], PDO::PARAM_STR);
		$stmt -> bindParam(':y', $datos['descripcion'], PDO::PARAM_STR);
		$stmt -> bindParam(':z', $datos['year'], PDO::PARAM_STR);
		
		try {
			if($stmt->execute()){
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

	public function consultarSitioTuristicoModelo($tabla) {

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


	public function consultarSitioTuristicoIdModelo($id, $tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla Where idSitioTuristico = :id");
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		
		try {
			$stmt->execute();
			return $stmt->fetch();			
		} catch (PDOException $e) {
			print_r("error ".$e->getMessage());
		}

		$stmt->close();
	}

	public function modificarSitioTuristicoModelo(){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombreST = :nombre WHERE idSitioTuristico = :id");

		$stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
		$stmt->bindParam(':id', $datos['id'], PDO::PARAM_INT);

		try {
			if ($stmt->execute()) {
				return 'success';
			}
			else{
				return 'error';
			}			
			
		} catch (PDOException $e) {
			print_r("error ".$e->getMessage());
		}

		$stmt->close();
	}

	public function actualizarSitioTuristicoModelo($datos, $tabla){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombreST = :nombre, direccionST = :direccion, correoST = :correo, telefonoST = :telefono, tipoST = :categoria, propietarioST = :propietario, yearST = :year, descripcionST = :descripcion WHERE idSitioTuristico = :id");
		
		$stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
		$stmt->bindParam(':direccion', $datos['direccion'], PDO::PARAM_STR);
		$stmt->bindParam(':correo', $datos['correo'], PDO::PARAM_STR);
		$stmt->bindParam(':telefono', $datos['telefono'], PDO::PARAM_STR);
		$stmt->bindParam(':categoria', $datos['categoria'], PDO::PARAM_STR);
		$stmt->bindParam(':propietario', $datos['propietario'], PDO::PARAM_STR);
		$stmt->bindParam(':year', $datos['year'], PDO::PARAM_STR);
		$stmt->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
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
	
	

	public function eliminarSitioTuristicoModelo($id,$tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idSitioTuristico = :id");

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
}

?>