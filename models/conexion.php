<?php

class Conexion {
	
	public function conectar() {
		$pdo = new PDO("mysql:host=localhost;dbname=tocaimapp","root", "");
		return $pdo;
		
		}
	}
?>