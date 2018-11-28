<?php 
session_start();
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

  <?php  if(isset($_SESSION['nombre'])):?>
  <h2>Bienvenido: <?php echo $_SESSION['nombre'];?></h2>
  <?php endif;?>
  <br>
  <?php  if(isset($_COOKIE['password'])):?>
  <h2>Tal como lo indicastes tu contraseña ya  esta guardada en tu maquina: <?php echo $_COOKIE['contrasena'];?></h2>
  <?php endif;?>
  <div>
  <a href="logout.php">Cerrar Sesión </a>
  </div>
</div>  

<script src="js/bootstrap.min.js"></script>
</body>
</html>
