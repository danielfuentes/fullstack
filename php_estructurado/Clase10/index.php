<?php

include_once('funciones.php');

    if($_SESSION) {
        $username = $_SESSION['email'];
    }
?>  
<!DOCTYPE html>
<html>
        <?php include_once('head.php'); ?>
    </head>
    <body>
        <div class="container">
        
            <?php include_once('navbar.php'); ?>

            <?php if(loginController()): 
                // Si el controller da true, mostramos el siguiente bloque 
            ?>
            <div class="alert alert-success" role="alert">
                Bienvenido de nuevo <?=$username ?>! Anda a <a href="perfil.php">tu perfil</a>
            </div>
            <?php endif; 
            ?>
        </div>
    </body>
</html>