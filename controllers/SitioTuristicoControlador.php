<?php
class SitioTuristicoControlador{
	
	///mértodo para registrar sitios turísticos///
	public function registrarSitioTuristicoControlador(){
		if (isset($_POST['registrarcons'])) {
			
			$datos = array('nombre'      => $_POST['nombre'],
				'direccion'   => $_POST['direccion'],
				'telefono'    => $_POST['telefono'],
				'categoria'   => $_POST['categoria'],
				'correo'      => $_POST['correo'],
				'propietario' => $_POST['propietario'],
				'descripcion' => $_POST['descripcion'],
				'year'        => $_POST['year'],
			);
			$objetos = new SitioTuristicoModelo();
			$respuesta = $objetos->registrarSitioTuristicoModelo($datos, 'sitiosturisticos');
			//print "$respuesta";
			if ($respuesta == 'success'){
				//header('location:okincons');
				print "<div align='center' style='padding-top: 15px;'><p class='alert alert-success' role='alert' style='width: 865px;'>Sitio Turistico registrado correctamente
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				<span aria-hidden='true'>&times;</span></button></p></div>";
			}
			else{
				header('location:falloincons');
			}
		}
	}

	public function consultarSitioTuristicoControlador(){
		
		$obj = new SitioTuristicoModelo();
		$respuesta = $obj->consultarSitioTuristicoModelo('sitiosturisticos');

		foreach ($respuesta as $row => $valor){

			print "<tr>
			<td>{$valor['nombreST']}</td>
			<td>{$valor['direccionST']}</td>
			<td>{$valor['telefonoST']}</td>
			<td>{$valor['tipoST']}</td>
			<td>{$valor['correoST']}</td>
			<td>{$valor['propietarioST']}</td>
			<td>{$valor['descripcionST']}</td>
			<td>{$valor['yearST']}</td>

			<td>
			<a href='index.php?action=frmSitioTuristicoedit&idsitioturistico={$valor['idSitioTuristico']}'>
			<button class='btn btn-primary' style='width: 41px;'><span class='fas fa-edit'></span></button></a>

			<a href='index.php?action=frmSitioTuristicocons&del={$valor['idSitioTuristico']}'>
			<button class='btn btn-danger'><span class='fas fa-trash'></button></a>
			</tr>";
		}
	}

	public function consultarSitioTuristicoIdControlador(){
		$id = $_GET['idsitioturistico'];
		$obj = new SitioTuristicoModelo;
		$datos = $obj->consultarSitioTuristicoIdModelo($id, 'sitiosturisticos');
		print '
		<input type="hidden" name="idModificar" value="'. $datos["idSitioTuristico"].'">
		<div class="row">
		<div class="col-4"><label for="nombre">Nombre</label>
		<input class="form-control" type="text" id="nombre" name="nombre" value="'. $datos["nombreST"].'" placeholder="Máximo 40 Caracteres" maxlength="40" required><br>
		</div>
		<div class="col-4"><label for="direccion">Dirección</label>
		<input class="form-control" type="text" id="direccion" name="direccion" value="'. $datos["direccionST"].'" placeholder="Máximo 40 Caracteres" maxlength="40" required><br>
		</div>
		<div class="col-4"><label for="correo">Correo</label>
		<input class="form-control" type="email" id="correo" name="correo" value="'. $datos["correoST"].'" placeholder="Correo electrónico del lugar" maxlength="40" required><br>
		</div>
		</div>

		<div class="row">
		<div class="col-3"><label for="telefono">Teléfono</label>
		<input class="form-control" type="number" id="telefono" name="telefono" value="'. $datos["telefonoST"].'" placeholder="línea o celular" maxlength="20" required><br>
		</div>
		<div class="col-3"><label>Categoría</label><br>
		<select class="form-control" name="categoria">
		<option value="Piscinas">Piscinas<br></option>
		<option value="Hoteles">Hoteles</option>
		<option value="Restaurantes">Restaurantes</option>
		<option value="Quebradas">Quebradas</option>
		</select><br>
		</div>
		<div class="col-3"><label>Propietario</label>
		<input class="form-control" type="text" id="propietario" name="propietario" value="'. $datos["propietarioST"].'" placeholder="nombres y apellidos" maxlength="40" required><br>
		</div>
		<div class="col-3"><label>Año</label>
		<input class="form-control" type="date" id="year" name="year" value="'. $datos["yearST"].'" placeholder="Correo electrónico del lugar" maxlength="10" required><br>
		</div>
		</div>

		<div class="row">
		<div class="col-12"><label>Descripción</label><br>
		<textarea class="form-control" id="descripcion" name="descripcion" placeholder="Escriba una descripción la cual podrán ver los visitantes">'. $datos["descripcionST"].'</textarea><br>
		</div>
		<div class="row justify-content-center">
		<input class="button_succes" type="submit" name="registrarcons" value="Actualizar">
		</div>
		</div>';
	}
	public function actualizarSitioTuristicoControlador(){
		if (isset($_POST['idModificar'])) {

			$datos = array('id' 		 => $_POST['idModificar'],
				'nombre' 	 => $_POST['nombre'],
				'direccion'   => $_POST['direccion'],
				'correo'		 => $_POST['correo'],
				'telefono' 	 => $_POST['telefono'],
				'categoria' 	 => $_POST['categoria'],
				'propietario' => $_POST['propietario'],
				'year' 		 => $_POST['year'],
				'descripcion' => $_POST['descripcion'],
			);
			$obj = new SitioTuristicoModelo;
			$respuesta = $obj->actualizarSitioTuristicoModelo($datos, 'sitiosturisticos');

			if($respuesta == 'success'){
				header("location:okay");
			}
			else{
				print "error";
			}
		}
	}

	public function eliminarSitioTuristicoControlador(){
		if (isset($_GET['del'])) {
			$id = $_GET['del'];

			$obj = new SitioTuristicoModelo;
			$respuesta = $obj->eliminarSitioTuristicoModelo($id,'sitiosturisticos');

			if ($respuesta == 'success') {
				header('location:delokay');
			}
		}
	}
}
?>
<script>
	window.setTimeout(function() {
		$(".alert").fadeTo(1500, 0).slideDown(1000, function(){
			$(this).remove(); 
		});
		}, 3000); //2 segundos y desaparece
	</script>