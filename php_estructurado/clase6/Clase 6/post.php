<?php 
	include("funciones.php");
	$paises = [
		"Ar" => "Argentina",
		"Ch" => "China",
		"Br" => "Brasil",
		"Co" => "Colombia"
	];

	if ($_POST)
	{
		// Esto significa que ESTA VEZ enviaron la info
		
		
		$errores = validarDatos($_POST);

		if (count($errores) == 0) {
			header("location:felicidad.php");exit;
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
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
	<form method="POST" action="post.php">
		<div>
			Nombre:
			<input type="text" name="nombre" value="<?php echo $nombreIngresado ?>">
			<?php if(isset($errores["nombre"])) { ?>
				<span style="color:red;"><?php echo "<br>".$errores['nombre'] ?></span>
			<?php } ?>
		</div>
		<div>
			Username:
			<input type="text" name="username">
			<?php if(isset($errores["username"])) { ?>
				<span style="color:red;">ERROR</span>
			<?php } ?>
		</div>
		<div>
			Mail:
			<input type="text" name="mail">
		</div>
		<div>
			Edad:
			<input type="text" name="edad">
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
			<select>
				<?php foreach($paises as $codigo=>$valor)  { ?> 
					<option value="<?=$codigo?>">
						<?=$valor?>
					</option>
				<?php } ?>
			</select>
		</div>
		<div>
			<input type="submit" name="" value="Enviar">
		</div>
	</form>
</body>
</html>