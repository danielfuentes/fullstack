<?php
session_start();
$_SESSION['nombre']=$_POST['nombre'];
if($_POST['recordar']){
    $finaliza=time()+60*60*24;
    setcookie('clave',$_POST['contrasena'],$finaliza,'/');
}
header('location: ../bienvenida.php');
exit();

?>