<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ayuda en línea sobre el uso del sistema</title>
</head>
<body>
    <h1>Hola: <?php echo $_SESSION['nombre']?></h1>
    <br>
    <h2>Ayuda del sistema</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores, velit exercitationem beatae nihil dolores fuga laudantium. Excepturi aliquam alias optio dicta. Eaque quibusdam voluptates repudiandae numquam deserunt assumenda similique, veritatis perferendis nobis! Labore inventore reiciendis excepturi alias corrupti accusantium quaerat non consequuntur quo, perspiciatis aspernatur officia ipsum enim error. Temporibus?</p>
    <br>
    <a href="login.php">Volver a Login...</a> 
</body>
</html>