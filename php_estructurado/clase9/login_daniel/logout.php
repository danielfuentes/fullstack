<?php
    include_once('controladores/controlador_session_cookie.php');
    inicioSesion();
    session_destroy();
    setcookie("password", "", -1);
    header('Location:login.php');