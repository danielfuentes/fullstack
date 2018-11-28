<?php
    include_once('funciones.php');

    if($_POST) {
        // 1 - buscar usuario por mail
        $usuario = buscamePorEmail($_POST['email']);
        if($usuario !== null) {
            if(password_verify($_POST['password'], $usuario['password']) === true) {
                login($usuario);
            }
        }
        // SI mi controlador de login devuelve true, es porque el usuario ingresa con una cookie o con una
        // session ya iniciada en el sistema, no quiero que vea el form de login
        if(loginController()) {
            header('Location: perfil.php');
            // Lo derivo a su perfil y corto la ejecucion de codigo.
            exit;
        }
    }

?>  
<!DOCTYPE html>
<html>
    <?php include_once('head.php');?>
    <body>
        <div class="container">
        
            <?php include_once('navbar.php'); ?>

            <form class="form form-group row col-5" action="" method="post">
                <div class="form-group">
                    <label for="mail">E-Mail: </label>
                    <input type="email" name="email" id="mail" value="">
                </div>
                <div class="form-group">
                    <label for="password">Password: </label>
                    <input type="password" name="password" id="password" value="">
                </div>
                <div class="form-group col-12">
                    <button type="submit" class="btn btn-info">Ingresar</button>
                </div>
            </form>
        </div>
    </body>
</html>