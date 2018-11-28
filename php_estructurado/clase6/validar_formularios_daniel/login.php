<?php 

    $titulo= "Formulario de Entrada al Sistema";
	$paises = [
		"Argentina" => "Argentina",
		"Chile" => "Chile",
        "Brasil" => "Brasil",
        "Venezuela" => "Venezuela"
	];

	if($_POST) {
		header("Location:bienvenido.php");exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo "$titulo";?></title>
</head>
<body>
	<form method="POST" action="">
		<div>
			Nombre:
			<input type="text" name="nombre">
		</div>
		<div>
			Password:
			<input type="password" name="password">
		</div>
		
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
