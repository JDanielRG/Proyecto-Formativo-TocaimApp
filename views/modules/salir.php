<?php

session_start();
if(isset($_SESSION['validado'])){
	$msg = "El usuario: " . $_SESSION['usuario'] . "<br>ha cerrado sesion";
}
else{
	$msg = "Señor usuario usted no ha inicado sesion";
}

session_destroy();

header('location:index.php');

?>
<h1><?php print $msg; ?></h1>