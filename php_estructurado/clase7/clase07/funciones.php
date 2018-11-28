<?php

require_once('helpers.php');


function validate($data)
{
    
    $errors = [];
    //si me manda username vacio, dar error
    $username = trim($data['username']);
    if($username == "") {
        $errors['username'] = "Capo me dejaste el username vacio";
    }

    $email = trim($data['email']);

    if($email == "") {
        $errors['email'] = "Me dejaste el email vacio!";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "El email no es valido, crack";
    }

    $password = trim($data['password']);
    $cpassword = trim($data['cpassword']);
    
    if($password == "") {
        $errors['password'] = "Me dejaste la pass vacia!";
    } elseif($password < 4) {
        $errors['password'] = "La pass debe ser de al menos 4 caracteres!";
    }
    if($password != $cpassword) {
        $errors['cpassword'] = "Las contraseñas no coinciden";
    }
    
    if (!isset($data['pais'])){
        $errors['pais'] = "Debes seleccionar tu país de origen...";
    }    
    return $errors;
}

function createUser($data,$destino){
    
    $usuarios =
    [
        'username'=> $data['username'],
        'email'=> $data['email'],
        'password'=> password_hash($data['password'],PASSWORD_DEFAULT),
        'pais'=> $data['pais'],
        'destino'=> $destino    
    ];
    return $usuarios;
}

function saveUser($usuario){
    $json = json_encode($usuario);
    file_put_contents("usuarios.json",$json . PHP_EOL,FILE_APPEND);
}

function savePhoto($imagen){
    
    if($imagen['avatar']['error']==UPLOAD_ERR_OK){
        $archivo = $imagen['avatar']['tmp_name'];
        $nombre = $imagen['avatar']['name'];
        $ext = pathinfo($nombre,PATHINFO_EXTENSION);
        $miArchivo= dirname(__FILE__)."/upload/";
        $miArchivo=$miArchivo.uniqid();
        $miArchivo=$miArchivo.".".$ext;
        move_uploaded_file($archivo,$miArchivo);
        return $miArchivo;
    }
}


