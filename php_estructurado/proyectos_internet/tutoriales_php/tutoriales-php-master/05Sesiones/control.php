<?php
	if($_POST["usuario_txt"]=="bextlan" && $_POST["password_txt"]=="12345"){
		//inicio la sesi�n
		session_start();
		
		//Declaro mis variables de sesi�n
		$_SESSION["autentificado"] = true;
		$_SESSION["usuario"] = $_POST["usuario_txt"];
		
		header("Location: archivo-protegido.php");
	}else{
		header("Location: index.php?error=si");
	}
?>