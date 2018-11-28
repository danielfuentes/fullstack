<?php
    include_once('funciones.php');

    if($_POST) {
        // 1 - Validar
        $errores = validate($_POST);
        // 2 - Crear Usuario
        if(count($errores) == 0) {
            $usuario = createUser($_POST);
        // 3 - Validacion del avatar
            $erroresAvatar = saveAvatar($usuario);
        // 4 - Merge de errores (uno los arrays de errores)
            $errores = array_merge($errores, $erroresAvatar);
        // 5 - vuelvo a validar $errores
            if(count($errores) == 0) {
        // 6 - Guardo usuario y lo mando a loguearse
                saveUser($usuario);
                header('Location: login.php');
                exit;
            }
        }
    }

?>  
<!DOCTYPE html>
<html>
    <?php include_once('head.php'); ?>
    <body>
        <div class="container">
    
            <?php include_once('navbar.php'); ?>
            
            <?php if(isset($errores)):?>
            <ul>
            <?php foreach($errores as $error):?>
                <li class="alert alert-danger"><?=$error ?></li>
            <?php endforeach;?>
            </ul>
            <?php endif;?>

            <form class="form form-group row col-5 offset-2" style="padding-top: 55px;" action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nombre">Username: </label>
                    <input type="text" name="username" value="<?=!isset($errores['username']) ? old('username') : "" ?>">
                </div>
                <div class="form-group">
                    <label for="mail">E-Mail: </label>
                    <input type="text" name="email" value="<?=!isset($errores['email']) ? old('email') : "" ?>">
                </div>
                <div class="form-group">
                     <label for="avatar">Avatar: </label>
					<input type="file" name="avatar">
                </div>
                <div class="form-group">
                    <label for="passwd">Password: </label>
                    <input type="password" name="password">
                </div>
                <div class="form-group">
                    <label for="cpasswd">Repetir Password: </label>
                    <input type="password" name="cpassword">
                </div>
                <div class="form-group">
                    <input type="checkbox" name="confirm" value="<?=!isset($errores['confirm']) ? old('confirm') : "" ?>">
                    <label for="confirm">Acepto los terminos y condiciones.</label>
                </div>
                <div class="form-group col-12">
                    <button type="submit" class="btn btn-info">Registrarme</button>
                </div>
            </form>
        </div>
    </body>
</html>
