<?php
require_once('repositorios/usuarios.php');


function registrar($datos)
{
    $errores = [];

    //EDITAMOS LOS DATOS DEL USUARIO QUE NECESITAMOS REFORMATEAR
    //hasheamos el password
    $datos['contrasena'] = password_hash($datos['contrasena'], PASSWORD_DEFAULT);

    //le damos formato a la fecha. STR_PAD nos permite agregarle caracteres adelante y/o atras a un string,
    //para completar la longitud necesaria.
    /** @see https://php.net/str_pad */
    $datos['fecha_nacimiento'] =
        $datos['fnac_anio'] . '-' .
        str_pad($datos['fnac_mes'], 2, '0', STR_PAD_LEFT) . '-' .
        str_pad($datos['fnac_dia'], 2, '0', STR_PAD_LEFT)
    ;

    //guardamos el avatar
    $avatar = guardarArchivo(uniqid());
    if ($avatar == false) {
        $errores[] = 'Ocurrió un error al subir la imagen de perfil';
        return $errores;
    }
    $datos['avatar'] = $avatar;

    //borramos los datos que no queremos en el json del array que nos llega por parametro.
    unset($datos['fnac_anio']);
    unset($datos['fnac_mes']);
    unset($datos['fnac_dia']);
    unset($datos['terminos']);
    unset($datos['contrasena_confirm']);
    unset($datos['email_confirm']);

    guardarUsuario($datos);
}

/** @see http://php.net/manual/en/features.file-upload.php */
function guardarArchivo($filename)
{
    //chequeamos que se haya subido bien
    if ($_FILES["avatar"]["error"] === UPLOAD_ERR_OK)
    {
        //obtenemos el nombre original
        $nombre = $_FILES["avatar"]["name"];
        //obtenemos el nombre temporal
        $archivo = $_FILES["avatar"]["tmp_name"];
        //obtenemos la extension
        $ext = pathinfo($nombre, PATHINFO_EXTENSION);

        //armamos el nuevo path para guardar la foto
            
        $path = dirname(__DIR__);
        $path = $path . "/uploads/";
        $path = $path . "$filename.$ext";
        
       
        //movemos el archivo
        move_uploaded_file($archivo, $path);

        //devolvemos el nombre
        return "$filename.$ext";
    }

    //devolvemos un false para indicar que hubo un error
    //no hace falta el else, porque si el if sale bien, el return interno corta la ejecución de la función.
    return false;
}

function loguear($datos) {

  //1.Validar que el usuario exista
  $usuario = buscarUsuario(EMAIL_FIELD, $datos['email']);
  if (!$usuario) {
    return ['El email no existe'];
    }
  //2.Asegurarse de que la contraseña coincida
  if(!password_verify($datos['contrasena'], $usuario['contrasena'])) {
    return ['El password no coincide'];
  }
  //3.Guardar en la 0 session
  unset($usuario['contrasena']);
  $_SESSION['user']= $usuario;

  //4.Escribir cookie si la necesitamos (el time lo ponemos por 5años en este caso)
  if (isset($datos['recordarme'])) {
  //setcookie('user', $usuario['id'], time() + 60 * 60 * 24 * 365 * 5);
  setcookie('user', $usuario['id'], time() + 60 * 60 );
  }
}
