<?php

function inicioSesion(){
    session_start();
}

function capturaDatos($data){
    $_SESSION['nombre']=$data['nombre'];
}

function recordarPassword($data){
    $finalizacion=time()+60*60*2;
    setcookie('password',$data['password'],$finalizacion);
}    
    


?>