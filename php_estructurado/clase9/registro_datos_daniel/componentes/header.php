<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $pageTitle; ?></title>
	<!-- Bootstrap -->
	<link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
<div class="container">
	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-links">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">Clase 9 PHP</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="navbar-links">
				<ul class="nav navbar-nav">
					<li><a href="index.php">Inicio</a></li>
				</ul>
                <ul class="nav navbar-nav navbar-right">
					<li><a href="acceso.php">Login</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="registro.php">Registrarme</a></li>
				</ul>
			</div>
		</div>
	</nav>

