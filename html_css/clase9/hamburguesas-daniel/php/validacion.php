<?php
$nombre=trim($_POST['nombre']);
$errores=[];
if($nombre==""){
    $errores['nombre']="El nombre no lo puede dejar en blanco";
}

var_dump($errores);

?>