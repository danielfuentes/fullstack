<?php
require_once 'funciones.php';

$usuario = buscamePorMail($_SESSION["email"]);
$id = $usuario["id"];
$archivo = glob("img/perfil$id.*")[0];

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/master.css">
    <title>Demo Registro</title>
  </head>
  <body>
    <main class="flex-container">
      <!-- Este bloque de codigo va a aparecer si Y SOLO SI el usuario esta logueado 
        haciendo uso de nuestro controlador de login -->
      <?php if (controlarLogin()): ?>

      <h3> Bienvenido <?php echo $_SESSION["email"]; ?> </h3>
      <img width="400" src="<?=$archivo?>">
      

      <a href="logout.php">Logout</a>

      <?php else: ?>
      <!-- Si el usuario no esta logueado, va a aparecer un aviso de esto -->
      <h1>No estás logueado.</h1>

      <?php endif; ?>
      <!-- De esta manera controlamos que si alguien quiere acceder a perfil.php y no es
        usuario registrado en nuestro sistema, no puede ver el contenido de ningun perfil -->
    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>
