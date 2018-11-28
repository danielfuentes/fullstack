<?php

function guardarUsuario($usr) {
    $json = json_encode($usr);

    file_put_contents("usuarios.json", $json . PHP_EOL, FILE_APPEND);
}

function editUser($usrNuevo) {

}

function dameTodos() {
    $arch = file_get_contents("usuarios.json");
    $usuarios = explode($arch, PHP_EOL);
    $usuarioFinal = [];

    foreach($usuarios as $usr) {
        $usuarioFinal[] = json_decode($usr, true);
    }

    return $usuarioFinal;
}

function dameUno($id) {
    $arch = fopen("usuarios.json");

    while($linea = fgets($arch)) {
        $usr = json_decode($linea);
        if ($usr["id"] == $id) {
            return $usr;
        }
    }

    fclose("usuarios.json");
    return NULL;
}

 ?>
