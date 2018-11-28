<?php 
	$paises = [
		"Ar" => "Argentina",
		"Ch" => "China",
		"Br" => "Brasil"
	];

	if($_POST) {
		header("Location:felicidad.php");exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST" action="get.php">
		<div>
			Nombre:
			<input type="text" name="nombre">
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
				<?php foreach($paises as $codigo => $pais) { ?> 
					<option value="<?=$codigo?>">
						<?=$pais?>
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