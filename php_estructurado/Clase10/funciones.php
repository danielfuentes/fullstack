<?php
    session_start();
    include_once('rss-feed.php');

    // Helpers!
    function dd($var)
    {
        echo"<pre>";
        die(var_dump($var));
        echo "</pre>";
    }

    function old($user_input)
    {
        if (isset($_POST["$user_input"])) {
            return $_POST["$user_input"];
        }
    }

    //   /Helpers!

    // Validaciones

    function validate($datos)
    {
        $errores = [];

        $username = trim($datos['username']);

        if($username == "") {
            $errores['username'] = "Capo, me dejaste vacio el username";
        } elseif(strlen($username) <= 3 ) {
            $errores['username'] = "El nombre de usuario debe tener minimo 4 caracteres";
        }

        $email = trim($datos['email']);

        if($datos['email'] == "") {
            $errores['email'] = "El mail es obligatorio titan"; 
        } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errores['email'] = "Capo el email no es valido";
        }

        if($datos['password'] == "") {
            $errores['password'] = "La password la dejaste vacia";
        } elseif (strlen($datos['password']) <= 5) {
            $errores['password'] = "Minimo 6 caracteres para la pass!";
        } elseif ($datos['password'] != $datos['cpassword']) {
            $errores['password'] = "Las contraseñas no coinciden";
        }

        if(!isset($datos['confirm'])) {
            $errores['confirm'] = "Aceptame los terminos y condiciones";
        }

        return $errores;
    }

    // /Validaciones

    // Registro/Login
    
    function createUser($datos)
    {
        $usuario = [
            'username' => $datos['username'],
            'email' => $datos['email'],
            // Agregamos "role", por default es 1, que es el usuario con permisos basicos.
            'role' => 1,
            'password' => password_hash($datos['password'], PASSWORD_DEFAULT)
        ];

        $usuario['id'] = idGenerate();

        return $usuario;
    }

    function idGenerate()
    {
        $file = file_get_contents('users.json');

        if($file == ""){
            return 1;
        }
        
        $users = explode(PHP_EOL, $file);
        // El ultimo dato que genera siempre es un PHP_EOL, asi que lo sacamos con array_pop()
        array_pop($users);

        $lastUser = $users[count($users) - 1];
        $lastUser = json_decode($lastUser, true);

        return $lastUser["id"] + 1;

    }

    function saveUser($usuario) 
    {
        $jsonUser = json_encode($usuario);
        file_put_contents('users.json', $jsonUser . PHP_EOL, FILE_APPEND);
    }

    // 1 -Traer TODA la base
    // 2 - Buqueda por email
 
    function traerTodaLaBase()
    {
        $baseJson = file_get_contents('users.json');
        $users = explode(PHP_EOL, $baseJson);
        array_pop($users);

        foreach($users as $user) {
            $arrayUsers[] = json_decode($user, true);
        }
        return $arrayUsers;
    }

    function buscamePorEmail($email)
    {
        $arrayDeUsuariosTraidos = traerTodaLaBase();
        foreach($arrayDeUsuariosTraidos as $user) {
            if($user['email'] == $email) {
                return $user;
            }
        }
        return null;
    }

    // MANEJO DE SESSION

    // 1- Login

    function login($usuario) {
        // Una vez se cumpla la validacion del login contra la base de datos
        // seteamos como identificador de la misma, el email del usuario:
        $_SESSION["email"] = $usuario["email"];
        // dd($_SESSION);
        // Luego seteo la cookie. La mejor explicacion del uso de 
        // setcookie() la tienen como siempre, en el manual de PHP
        // http://php.net/manual/es/function.setcookie.php
        setcookie("email", $usuario["email"], time()+3600);
        // A TENER EN CUENTA las observaciones de MDN sobre la seguridad
        // a la hora de manejar cookies, y de paso para comentarles por que
        // me hacia tanto ruido tener que manejar la session asi:
        // https://developer.mozilla.org/es/docs/Web/HTTP/Cookies#Security
    }

    // 2 - Controlador de Login
    // La necesidad de este controlador surge de preguntarnos que hacer
    // con los usuarios que intentan ingresar a partes del sitio para las
    // cuales no tienen permisos o no estan autenticados.
    function loginController()
    {
        // SI la superglobal con el indice $_SESSION['email'] esta seteada
        if (isset($_SESSION["email"])) {
            // Dame TRUE
            return true;
        } else {
            // O...
            if (isset($_COOKIE["email"])) {
                // si la superglobal con el indice $_COOKIE['email']
                // esta seteada
                $_SESSION["email"] = $_COOKIE["email"];
                // Dame TRUE
                return true;
            } else {
                // Cualquier otra cosa, dame FALSE
                return false;
            }
        }
    }
    // 3 - Funcion de Logout
    function logout()
    {   
        // corto la session
        session_destroy();
        // seteo la cookie con time en negativo para que tambien se borre
        setcookie("email", "", time() -1);
    }

    // Notas sobre manejo de session:

    // No es el ideal, no es seguro, ni es performante. Es solamente una demo para que tengan el pantallazo de lo que sucede en el servidor cuando hacemos manejo de sesion. Queda en cada uno profundizar o hacer consultas puntuales/concretas.

    // El controlador de login basico maneja 3 situaciones:

    // 1 - Un usuario ya autenticado en nuestro servidor intenta ingresar a una parte del sitio que le pide loguearse, lo cual no tiene sentido, no queremos hacer que vuelva a loguearse si ya lo identificamos con la cookie. Esto conceptualmente es valido pero en la practica es extremadamente inseguro.

    // 2 - Un usuario con una cookie seteada intenta lo mismo que en el caso anterior pero no lo tenemos registrado con la superglobal $_SESSION, asi que ese registro lo hacemos con la cookie que trae. ACA es donde hago incapie en que es una forma precaria de manejar la session.

    // 3 - Un usuario que no tiene ningun tipo de dato registrado en nuestro sistema intenta ingresar a cualquier parte del sitio para la cual necesita permisos y no los tiene, asi que esta situacion nos devuelve FALSE y lo mandamos a donde queramos (register, login, index...)

    // FILES!

    function saveAvatar($usuario) 
    {

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

// Control de roles!

// Basicamente se va a mostrar como podriamos armar un usuario administrador

// Necesito un controller nuevo y tambien agregar un campo a mi base de datos, que va
// a quedar comentada mas arriba en la funcion previamente definida

    function checkRole($data)
    {        
        $usuario = buscamePorEmail($data);
        // Defino 7 como rol correspondiente a admin
        if($usuario['role'] == 7) {
            return true;
        } else {
        // para todo lo demas existe mastercard!
            return false;
        }

    }



























































    








