<?php
session_start();
if(!isset($_SESSION['nombre'])){
    header('location: login.php');
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>trabajando con Formulario</title>
    <!--<link rel="stylesheet" href="css/estilos.css">-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/master.css">
 
</head>

<body>
<div class="container bg-light">
<h1>Menú Principal</h1>
<?php if(isset($_SESSION['nombre'])):?>
<h2>Bienvenido...: <?php echo $_SESSION['nombre'];?></h2>
<?php endif?>
<br>
<?php if(isset($_COOKIE['clave'])):?>
<h2>Tu super contraseña secreta es..: <?php echo $_COOKIE['clave'];?></h2>
<?php endif?>
<a href="bienvenida.php">Ir a la página de bienvenida</a>
<br>
<a href="controladores/salir.php">Cerrar Sessión</a>

</div>  
<script src="js/bootstrap.min.js"></script>
</body>
</html>
