<?php
$finalizacion = time()+60*60*3;
setcookie('nombre',$_POST['nombre'],$finalizacion,'/');

?>