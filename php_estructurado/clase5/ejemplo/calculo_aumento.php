<!--Programa que recibe los datos enviados desde el formulario-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Programa que Captura las variables y Cálcula Aumento Método Post</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/master.css">
</head>
<body class="calculo">
<?php


//Programa que recibe los datos de las variables del programa Captura_Aumento.php

$dni = $_POST['dni'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
//Lo realice así para que practiquen condiciones
if (isset($_POST['sexo'])){ 
    $sexo = $_POST['sexo'];
}else{ $sexo = "";}



if (isset($_POST['departamento'])){ 
    $departamento = $_POST['departamento'];
}else{ $departamento = "";
}


$sueldo = $_POST['sueldo'];
$aumento = $_POST['aumento'];
$observaciones = $_POST['observaciones'];
//Aqui comienzo a mostrar los datos que ya recibi en las variables
echo "<h1>LOS DATOS ESPECIFICADOS FUERON:</h1><br>";
echo "<h2>DNI:  $dni</h2<br>";
echo "<h2>Nombre:  $nombre</h2<br>";
echo "<h2>Apellido:  $apellido</h2<br>";
echo "<h2>Sexo:  $sexo</h2><br>";
echo "<h2>Usted academicamente culminó sus estudios de:</h2><br>";
//Voy a chequear esto de esta esta manera para que ustedes vean
//Como trabaja el foreach, entendiendo que cuando trabajamos
//con checkbox, nos llega es un array con los elementos que 
//seleccionamos
if (isset($_POST['educacion'])) {
    $educacion = $_POST['educacion'];
    echo "<h2><ul>";
    foreach($educacion as $valor) {
        echo "<li>$valor</li><br>";
    }
    echo "</h2></ul>";
}
echo "<h2>Su sueldo Actual es de: $$sueldo</h2><br>";
echo "<h2>Porcentaje de aumento:  $aumento</h2><br>";
$nuevosueldo = (($sueldo * $aumento)/100) + $sueldo;
echo "<h2>Su nuevo sueldo es de:  $$nuevosueldo</h2><br>";
echo "<h2>Observaciones:  $observaciones</h2><br>";
echo "<h2>Departamento donde Labora:  $departamento</h2><br>";
echo "<br>";
?>
<a href="index.php">Volver</a>
</body>
</html>