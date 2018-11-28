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
    
    if(!isset($data['pais'])){
        $errors['pais'] = "Selecciona tu país de origen...";
    }
    
    return $errors;
}


function createUser($data,$avatar){
    $usuario =[
        'username'=>$data['username'],
        'email'=>$data['email'],
        'password'=>password_hash($data['password'],PASSWORD_DEFAULT),
        'pais'=>$data['pais'],
        'avatar'=>$avatar
    ];
   return $usuario;
}

function saveUser($data){
    $json = json_encode($data);
    file_put_contents('usuarios.json',$json . PHP_EOL, FILE_APPEND);

}


function uploadPhoto($imagen){
    //Aquí inicio la receta 
    //Pregunto si la imagen subio sin problemas
    if($imagen['avatar']['error']==UPLOAD_ERR_OK){
        $archivo = $imagen['avatar']['tmp_name'];
        $nombre = $imagen['avatar']['name'];
        //Aquí tomo del archivo la extensión
        $ext = pathinfo($nombre,PATHINFO_EXTENSION);
        //Aquí construyo la ruta donde voy a guardar mi imagen
        $miArchivo= dirname(__FILE__)."/upload/";
    
        //Aquí le genero un id único a la imagen
        $miArchivo=$miArchivo.uniqid();
        
        $miArchivo=$miArchivo.".".$ext;
        
        //Aquí muevo la imagen al lugar que deseo
        move_uploaded_file($archivo,$miArchivo);
        return $miArchivo;
    }
}

<?php
session_start();
session_destroy();
header('location: ../index.php');


?>
<?php
$finalizacion = time()+60*60*3;
setcookie('nombre',$_POST['nombre'],$finalizacion,'/');

?>
<?php
session_start();
$_SESSION['nombre']=$_POST['nombre'];
$_SESSION['email']=$_POST['email'];
?>







