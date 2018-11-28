<!--MSc. Angel Daniel Fuentes
    Programa para mis alumnos DH
    Validaciones de Formularios-->
<?php
//Definimos la codificación de la cabecera.
header('Content-Type: text/html; charset=utf-8');
//Importamos el archivo con las validaciones.
//require_once 'funciones/validaciones.php';
include_once('funciones/validaciones.php');

//Este array guardará los errores de validación que surjan.
$errores = [];
//Declaro las variables que capturan los datos
$nombre= "";
$edad = "";
$email="";
//Pregunta si está llegando una petición por POST, 
//lo que significa que el usuario envió el formulario.
if ($_POST) {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $email = $_POST['email'] ;
    //Aquí lo envio a que valide los datos
    $errores= validar($_POST);

    $misdatos[]=$_POST;
    
    $objetojson=json_encode($misdatos);
    //var_dump($objetojson);
    //exit;
    $arrayasociativo=json_decode($objetojson,true);
    //var_dump($arrayasociativo);
    //exit;
    
    
    //Verifica si ha encontrado errores y de no haber redirige a la página con el mensaje de que pasó la validación.
    if(count($errores)==0){
        header('Location: login.php');
        exit;
    }
}
?>

<!--Este corresponde al código HTML-->
<!DOCTYPE>
<html lang="es">
    <head>
        <title> Formulario de Validación de Datos - Daniel Fuentes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="css/master.css" rel="stylesheet" >
        
    </head>
    <body>
        <form action="" method="POST" >
            <label> Nombre </label>
            <br>
            <input type="text" name="nombre" value="<?php echo $nombre ?>" />
            <br>
            <?php if(isset($errores["nombre"])) { ?>
				<span><?php echo "<br>".$errores['nombre'] ?></span>
			<?php } ?>
            <br>
            <label> Edad </label>
            <br>
            <input type="text" name="edad" size="3" value="<?php echo $edad ?>" />
            <?php if(isset($errores["edad"])) { ?>
				<span><?php echo "<br>".$errores['edad'] ?></span>
			<?php } ?>
            <br>
            <label> Correo Electronico </label>
            <br>
            <input type="text" name="email" value="<?php echo $email ?>" />
            <?php if(isset($errores["email"])) { ?>
				<span><?php echo "<br>".$errores['email'] ?></span>
			<?php } ?>
            <br>
            <input type="submit" value="Enviar" />
            <br>
        </form>
    </body>
</html>