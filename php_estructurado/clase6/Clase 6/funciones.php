<?php

$nombreIngresado = $_POST['nombre'];

function validarDatos($datos) {
	$errores = [];
	

	if (trim($datos["nombre"]) === "") {
		$errores["nombre"] = "Che amigo, te falto el nombre";
	}
	if (strlen(trim($datos["username"])) <= 8) {
		$errores["username"] = "Ey, guarda que el username tiene que tener más de 8 caracteres";	
	}
	$email = trim($datos["mail"]);
	
	if ($email === "") {
		$errores["mail"] = "Che amigo, te falto el mail";
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errores["mail"] = "Mal formato de email";
	}
	if (!is_numeric($_POST["edad"])) {
		$errores["edad"] = "La edad debe ser un número";	
	}

	$pass = trim($_POST["password"]);
	$cpass = trim($_POST["cpassword"]);
	if ($pass === "") {
		$errores["password"] = "Llena la pass";
	}
	if ($cpass === "") {
		$errores["cpassword"] = "Llena la cpass";
	}
	if ($pass != "" && $cpass != "" && $pass != $cpass) {
		$errores["password"] = "Flaco, hiciste todo mal (con las contraseñas)";
	}


	return $errores;
}