<?php
session_start();
//Aquí valido si ell usuario ha o no iniciado session
if(!isset($_SESSION['nombre'])){
    header('location: index.php');
    exit();
}
?>
<!DOCTYPE>
<html>
    <head>
        <title> Formulario </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <?php if(isset($_SESSION['nombre'])):?>        
        <strong> Bienvenido: <?php echo $_SESSION['nombre'];?>  Este nombre lo traigo de la variable de Sesión </strong>
        <br>

        <?php endif;?>
        <?php if(isset($_COOKIE['nombre'])):?>        
        <strong> Bienvenido: <?php echo $_COOKIE['nombre'];?>  Este nombre lo traigo de la Cookie </strong>
        <br>
        <?php endif;?>
        <a href="index.php">Volver al formulario</a>
        <br>
        <a href="ayuda.php">Página de ayuda</a>
        <br>

        <a href="funciones/controlador_cerrar_session.php">Desconectarme</a>
    </body>
</html> 