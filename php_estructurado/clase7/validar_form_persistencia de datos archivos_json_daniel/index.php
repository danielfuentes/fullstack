<!--MSc. Angel Daniel Fuentes
    Programa para mis alumnos DH
    Validaciones de Formularios
    Ahora le incorpore lo de la 
    clase 7 - JSON y Archivos
    Atención: este programa lo he trabajo muy simple, con la intención
    sólo para que ustedes logren internalizar lo visto en las clases
    Por lo tanto todo lo he hecho de forma secuencial para que ustedes 
    vean como trabajan los diversos elementos vistos -->
<?php

//Definimos la codificación de la cabecera.
header('Content-Type: text/html; charset=utf-8');
//Importamos el archivo con las validaciones. Pueden usar este o include_once
//require_once 'funciones/validaciones.php';
include_once('funciones/validaciones.php');

//Este array guardará los errores de validación que surjan.
$errores = [];
//Declaro las variables que capturan los datos
//Esto un poco para que vean que la persistencia de datos se puede hacer
//de varias formas.
$nombre= "";
$edad = "";
$email="";
//Pregunta si está llegando una petición por POST, 
//lo que significa que el usuario dio clic en Registrarme del formulario.
if ($_POST) {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $email = $_POST['email'];
    
    //Aquí lo envio a que valide los datos
    $errores= validar($_POST);
    //Verifico si ha encontrado errores y de no 
    //haber redirige a la página con el mensaje 
    //de Bienvenida - Menú o a donde ustedes quieran
    if(count($errores)==0){
        
        //Aquí mismo voy a programar
        //el guardar los datos en un archivo
        //Preparo mi array asociativo
        //De igual forma aquí puedo llamar a una función que va a afectuar
        //Exactamente lo mismo y retornará el array asociativo 
        $usuario=[
           "nombre" => $_POST["nombre"],
           "edad"   => $_POST["edad"],
           "email"  => $_POST["email"],
           //Así lo trabajaría para hashear mi clave
           //"clave" => password_hash($_POST["clave"], PASSWORD_DEFAULT),//
        ];

        //Amigos y amigas Aquí les comento todo para que logren 
        //internalizar lo explicado en las láminas
        //Para ir viendo los efectos deben quitar, ver y volver 
        //a colocar los comentarios que estan con *
	
        //Aquí convierto mi array asociativo
        //a un objeto JSON
        //*Los var_dump() es para que vean el array asociativo creado
        //var_dump($usuario);
        


        //Ojo: Tanto esta instrucción como la del file_put_contents
        //pueden con eso pueden crear una función y así guardan los datos
        $json = json_encode($usuario);
        //Y aquí veran el objeto json ya creado
        //var_dump($json);
        //exit;
        
        //Aquí guardo los datos del usuario en un archivo objeto json
        //Haciendo uso del fopen - fwrite - fclose
        //*$archivo = fopen('usuarios.json','a');
        //*fwrite($archivo,$json .PHP_EOL);
        //*fclose($archivo);
        
        //Esta sería otra forma de guardar los datos
        //De esta forma me evito el fopen -fwrite - fclose
        //Si quieren ver o ejecutar el anterior, este lo deben comentar
        file_put_contents("usuarios.json", $json . PHP_EOL, FILE_APPEND);

        //Si requiero leer los datos del archivo
        //Aquí lo que hago es volver a convertir de 
        //objeto json a array asociativo
        //*$objetoJson = file_get_contents('usuarios.json');
        //*var_dump($objetoJson);
        
        //Y finalmente aquí paso mi objeto json a un array asociativo
        //Esto será útil para cuando yo quiero leer los datos guardados
        //Y verificar si un usuario que se quiere loguear, está o no registrado
        //*$arrayAsociativo=json_decode($objetoJson, true);

        //*var_dump($arrayAsociativo);
        //*exit;

        //Una vez validados y guardados los datos redirecciono el usuario a otro lugar: Menu - Login - o simplemente mensaje de Bienvenida, todo depende de lo que estoy programando

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
            <label> Correo Electronico: </label>
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