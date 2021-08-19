<?php

class BaseDatos {
	private $host;
	private $bd;
	private $user;
	private $password;
	private $charset;
	function __construct() {
		$this->host = constant("HOST");
		$this->bd = constant("BD");
		$this->user = constant("USER");
		$this->password = constant("PASSWORD");
		$this->charset = constant("CHARSET");
	}

	function conectar(){
		try {
			$conexion = "mysql:host=" . $this->host."; dbname=".$this->bd."; charset=".$this->charset;
			$opciones = [
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_EMULATE_PREPARES => FALSE, 
			];
			$pdo = new PDO($conexion, $this->user, $this->password, $opciones);

			return $pdo;

		} catch (PDOException $e) {
			print "Error con la base de datos ".$e->getMessage();
		}
	}
}
?>