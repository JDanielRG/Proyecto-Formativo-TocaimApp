/* =========================================================================
VALIDAR USUARIO EXISTENTE  JQUERY
============================================================================*/
var usuarioExiste = false;
var emailExiste = false;

$("#nombre").change(function(){

	var nombre = $("#nombre").val();

	var datos = new FormData();

	datos.append('varUsuario', nombre);

	$.ajax({
		url:"views/modules/ajax.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta){
			console.log(respuesta);
			if (respuesta == 1) {

				$("label[for='nombre'] span").html("<p>Este Usuario Ya Existe<p>");
				usuarioExiste = true;

			}
			else{

				$("label[for='nombre'] span").html("");
				usuarioExiste = false;

			}
		}
	});
})

/*==========FIN USUARIO EXISTENTE  ==========================================*/

/* =========================================================================
VALIDAR CORREO ELECTRONICO EXISTENTE  JQUERY
============================================================================*/

$("#email").change(function(){
	
	var email = $("#email").val();

	datos = new FormData();

	datos.append('varEmail', email);

	$.ajax({
		url: "views/modules/ajax.php",
		method: "POST",
		data: datos,
		change: false,
		contentType: false,
		processData: false,
		success: function(respuesta){
			if (respuesta == 1) {
				$("label[for=email] span").html("<p>Este Correo Ya Existe</p>");
				emailExiste = true;
			}
			else{
				$("label[for=email] span").html("");
				emailExiste = false;
			}
		}
	})

})

/*==========FIN CORREO ELECTRONICO EXISTENTE  ==========================================*/

/* =========================================================================
VALIDAR DATOS FORMULARIOS
============================================================================*/

function validarDatos(){
	var nombre = document.querySelector("#nombre").value;
	var email  = document.querySelector("#email").value;
	var clave  = document.querySelector("#clave").value;
	var terminos = document.querySelector('#terminos').checked;

	var expresion = /^[A-Za-z0-9]*$/;

	/*==========VALIDAR EL USUARIO ==========================================*/

	if (nombre != '') {
		if (nombre.length > 8) {
			document.querySelector("label[for='nombre']").innerHTML += 
			"<br>Por favor digite maximo 8 caracteres";
			return false;
		}
		if (!expresion.test(nombre)) {
			document.querySelector("label[for='nombre']").innerHTML += 
			"<br>Por favor ingrese solo letras con numeros";
			return false;
		}

		if(usuarioExiste){
			document.querySelector("label[for='nombre'] span").innerHTML +=
			"<p>Por Favor Ingrese Otro Nombre de Usuario</p>";
			return false;
		}
	}

	/*================= VALIDAR CLAVE ===================================*/
	if (clave != '') {
		var expClave = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;
		
		if(clave.length < 8){
			document.querySelector("label[for='clave']").innerHTML +=
			"<br>Por favor Ingrese un minimo de 8 caracteres";
			return false;
		}

		if (!expClave.test(clave)) {
			document.querySelector("label[for='clave']").innerHTML += 
			"<br>Por favor Ingrese un minimo de 8 caracteres que incluya numeros y una letra mayuscula";
			return false;
		}
	}

	/*============== VALIDAR CAMPO EMAIL ==================================*/

	if (email != '') {
		var expEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
		if (!expEmail.test(email)) {
			document.querySelector("label[for='email']").innerHTML +=
			"<br>Por favor ingrese una direccion de correo valida";
			return false;
		}
		if (emailExiste) {
			document.querySelector("label[for='email'] span").innerHTML +=
			"<p>Por Favor Ingrese Otro Correo</p>";
			return false;
		}
	}

	/*================== VALIDAR TERMINOS Y CONDICIONES ====================*/
	if (!terminos) {
		document.querySelector("form").innerHTML += 
		"<br>Debe Aceptar Terminos y Condiciones";

		document.querySelector("#nombre").value = nombre;
		document.querySelector("#email").value = email;
		document.querySelector("#clave").value = clave;

		return false;
	}
}

/*=========== FIN VALIDAR DATOS =============================================*/

