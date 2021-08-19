<?php

class Vista {
	
	function __construct(){
	}

	public function mostrarVista($vista){
		require_once 'views/'. $vista . '.' . 'php';
	}
}

?>