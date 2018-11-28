<?php
    include_once('funciones.php');

    // Generando el perfil dinamicamente!
    // SI hay $_SESSION:
    if($_SESSION) {
        // 1 - Necesito traer el usuario y asignarlo a una variable, por suerte ya tengo una funcion de antes!
        
        $usuario = buscamePorEmail($_SESSION["email"]);
        $username = $usuario['email'];
        
        // 2 - Por como arme la subida del avatar, necesito su ID por separado
        $id = $usuario["id"];
        // 3 - Dentro de la funcion glob() (http://php.net/manual/es/function.glob.php)
        // concateno la carpeta img al nombre que se genera por default con la subida de las imagenes
        // y un * para que de igual la extension
        if (isset(glob("img/perfil$id.*")[0])) {
            //Este if se ejecuta si esta seteado el indice 0. Es la unica manera de no recibir error
            // a la hora de verificar esto.
            $archivo = glob("img/perfil$id.*")[0];
        } else {
            $archivo = null;
        }
        //dd($archivo);
        // como glob() devuelve un array, si no pongo el unico indice que llega, 
        // tira error array to string conversion cuando hago el echo de $archivo
        
    }

?>  
<!DOCTYPE html>
<html>
    <?php include_once('head.php');?>
    <body>
        <div class="container">
        
            <?php include_once('navbar.php'); ?>
            <?php //SI EL CONTROLLER DE LOGIN DA FALSE, MUESTRO EL SIGUIENTE BLOQUE ?>
            <?php if(!loginController()): ?>
            <div class="alert alert-danger" role="alert">
                No estas autorizado en este sistema <a href="register.php" class="alert-link">Registrate!</a>
            </div>
            <?php endif; 
            // SI PASA, NO LO MUESTRO Y POR EL CONTRARIO, LE MUESTRO SU PERFIL!
            ?>
            <div class="row">
            
                <div class="card col-4">
                <?php if(isset($archivo)):
                    // SI hay archivo, mostramelo
                ?>
                    <img class="card-img-top" src="<?=$archivo ?>" alt="Card image cap">
                <?php else: 
                    // else, mostrame la imagen default
                    ?>
                    <img class="card-img-top" src="img/default.jpg" alt="Card image cap">
                <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?="Bienvenido $username!" ?></h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam, adipisci.</p>
                        <a href="#" class="btn btn-primary">Codea!</a>
                    </div>
                </div>
                <div class="col-6 offset-1">
                <h2>Estas son las ultimas noticias</h2>
                <?php print getContent();?>
                </div>
            </div>
        </div>
    </body>
</html>