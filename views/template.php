<!DOCTYPE html>
<html>
<head>
	<title>TocaimApp</title>
	<link rel="stylesheet" type="text/css" href="views/css/main.css">
	<link rel="stylesheet" type="text/css" href="views/css/hover.css">
	<script type="text/javascript" src="views/js/jquery-3.5.1.js"></script>
	<link rel="stylesheet" type="text/css" href="views/css/fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="views/css/bootstrap.min.css">
</head>
<style type="text/css">
	body {

		background-image: url(public/imgs/background.jpg);
		background-position: center center;
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: cover;
		/*background-color: #7ACFFF;*/
	}
</style>
<body>
	<nav>
		<?php
		include("views/modules/navegacion.php");
		?>
	</nav>
	<section>
		<?php
		$controlador = new PaginaControlador();
		$controlador->enlacesPaginasControlador();
		?>
	</section>
	<script type="text/javascript" src="views/js/validar.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    
</body>
</html>