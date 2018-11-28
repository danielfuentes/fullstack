<?php
    
    include_once('funciones.php');

    if(!isset($_SESSION)) {
        header('Location: login.php');
        exit;
    }elseif(!loginController()) {
        header('Location: index.php');
        exit;
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once('head.php'); ?>
</head>
<body>
    <div class="container">
    
        <?php include_once('navbar.php'); ?>

        <?php if(!checkRole($_SESSION['email']) == 7 || !checkRole($_COOKIE['email']) == 7): ?>
            <div class="alert alert-danger" role="alert">
                No estas autorizado en este sistema <a href="register.php" class="alert-link">Registrate!</a>
            </div>
        <?php else: ?>

            <h1>HOLA ADMIN!</h1>


        <?php endif;?>
    </div>
</body>
</html>