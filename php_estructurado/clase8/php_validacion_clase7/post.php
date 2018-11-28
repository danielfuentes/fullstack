<?php 
	include("funciones.php");
	$paises = [
		"Ar" => "Argentina",
		"Ch" => "China",
		"Br" => "Brasil",
		"Co" => "Colombia"
	];

	$nombreDefault = "";
	$usernameDefault ="";
	$mailDefault = "";
	$edadDefault = "";

	if ($_POST)
	{
		// Esto significa que ESTA VEZ enviaron la info
		
		// Pregunto si hay errores y los guardo en un array (función aparte)
		$errores = validarDatos($_POST);

		// Si no hubo errores subo la foto
		if (count($errores) == 0) {
			$errores = guardarImagen("avatar", $errores);
		}

		// Si no hay errores tras subir la foto, voy a hacer DE TODO
		if (count($errores) == 0) {
			//Crear LA VARIABLE usuario
			$usuario = crearUsuario($_POST);

			//Guardar el usuario
			guardarUsuario($usuario);

			//Redirigir a felicidad
			header("location:felicidad.php");exit;
		}

		if (!isset($errores["nombre"])) {
			$nombreDefault = $_POST["nombre"];	
		}
		if (!isset($errores["username"])) {
			$usernameDefault = $_POST["username"];	
		}
		if (!isset($errores["edad"])) {
			$edadDefault = $_POST["edad"];	
		}
		if (!isset($errores["mail"])) {
			$mailDefault = $_POST["mail"];	
		}
		





	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<title></title>
</head>
<body>
	<?php if ($_POST && count($errores) > 0) { ?>
		<ul>
			<?php foreach ($errores as $error) { ?>
				<li>
					<?=$error?>
				</li>
			<?php } ?>
		</ul>
	<?php } ?>
	<form method="POST" action="post.php" enctype="multipart/form-data">
		<div>
			Nombre:
			<input type="text" name="nombre" value="<?=$nombreDefault?>">
		</div>
		<div>
			Username:
			<input type="text" name="username" value="<?=$usernameDefault?>">
		</div>
		<div>
			Mail:
			<input type="text" name="mail" value="<?=$mailDefault?>">
		</div>
		<div>
			Edad:
			<input type="text" name="edad" value="<?=$edadDefault?>">
		</div>
		<div>
			Pass:
			<input type="password" name="password">
		</div>
		<?php if(!array_key_exists("versioncorta", $_GET)) { ?>
			<div>
				Confirmar Pass:
				<input type="password" name="cpassword">
			</div>
		<?php } ?>
		<div>
			Pais:
			<select name="pais">
				<?php foreach($paises as $codigo => $pais) { ?> 
					<?php if ($codigo == $_POST["pais"]) { ?>
						<option value="<?=$codigo?>" selected>
							<?=$pais?>
						</option>
					<?php } else { ?> 
						<option value="<?=$codigo?>">
							<?=$pais?>
						</option>
					<?php } ?>
					
				<?php } ?>
			</select>
		</div>
		<div>	
			Foto:
			<input type="file" name="avatar">
		</div>
		<div>
			<input type="submit" name="" value="Enviar">
		</div>
	</form>
</body>
</html>