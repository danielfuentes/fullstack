<?php 
    session_start();

    function validarInformacion($datos){
        foreach($datos as $key => $value){
            $datos[$key] = trim($value);
        }
        $errores = [];

        if(strlen($datos['email']) == 0){
            $errores['email'] = "El email es obligatorio";
        } else if(!filter_var($datos['email'], FILTER_VALIDATE_EMAIL)){
            $errores['email'] = "El mail ingresado no es valido";
        } else if(buscamePorMail($datos['email']) != NULL){
            $errores['email'] = "El mail ingresado ya existe";
        }

        if(strlen($datos['password']) < 4){
            $errores['password'] = "La contraseña es muy corta";
        } else if ($datos['password'] != $datos['cpassword']){
            $errores['password'] = "La contraseña no coincide";
        }
        return $errores;
    }

    function crearUsuario($datos){
        $usuario = [
            "email" => $datos["email"],
            "password" => password_hash($datos["password"], PASSWORD_DEFAULT),
            "id" => crearNuevoID()
          ];
      return $usuario;
    }

    function guardarUsuario($datos){
        $json = json_encode($datos);   
        file_put_contents("usuarios.json", $json . PHP_EOL, FILE_APPEND);
    }

    function guardarImagen($usuario) {
        
        $errores = [];
        
        $id = $usuario["id"];

        if ($_FILES["avatar"]["error"] == UPLOAD_ERR_OK) {

            $nombre = $_FILES["avatar"]["name"];
            $archivo = $_FILES["avatar"]["tmp_name"];

            $ext = pathinfo($nombre, PATHINFO_EXTENSION);

            if ($ext != "jpg" && $ext != "png" && $ext != "jpeg") {
                $errores["avatar"] = "Solo acepto formatos jpg y png";
                return $errores;
            }

            $miArchivo = dirname(__FILE__);
           
           
            $miArchivo = $miArchivo . "/img/";

            $miArchivo = $miArchivo. "perfil" . $id . "." . $ext;

            move_uploaded_file($archivo, $miArchivo);
        } else {
            $errores["avatar"] = "Hubo un error al procesar el archivo";
            
        }
        return $errores;
        
    }

    function traeTodaLaBase(){
        $contenido = file_get_contents('usuarios.json');

        $usuariosJSON = explode(PHP_EOL, $contenido);
        array_pop($usuariosJSON);

        $usuariosTraidos = [];

        foreach($usuariosJSON as $usuario){
            $usuariosTraidos[] = json_decode($usuario, true);    
        }

        return $usuariosTraidos;
    }


    function createNewId(){
        $register = file_get_contents('usuarios.json');

        $usersJson = explode(PHP_EOL, $register);
        array_pop($usersJson);

        $registerAll = [];

        foreach($usersJson as $user){
            $registerAll[] = json_decode($user, true);    
        }
        if (count($registerAll) == 0) {
            return 1;
        }
        $registerUltimo = array_pop($registerAll);
        return $registerUltimo["id"] + 1;
    }


    function crearNuevoID() {
        $contenido = traeTodaLaBase();
        if (count($contenido) == 0) {
            return 1;
        }
        $elUltimo = array_pop($contenido);
        return $elUltimo["id"] + 1;
    }

    function buscamePorMail($email){
        $usuariosTraidos = traeTodaLaBase();
        foreach($usuariosTraidos as $usuario){
            if($usuario['email'] == $email){
                return $usuario;
            }
        }
        return null;
    }

    function login($usuario) {
        $_SESSION["email"] = $usuario["email"];
        setcookie("email", $usuario["email"], time()+3600);
    }
    
    function controlarLogin() {
        if (isset($_SESSION["email"])) {
            return true;
        } else {
            if (isset($_COOKIE["email"])) {
                $_SESSION["email"] = $_COOKIE["email"];
                return true;
            } else {
                return false;
            }
        }
    }

    function logout() {
        session_destroy();
        setcookie("email", "", -1);
    }


 ?>
