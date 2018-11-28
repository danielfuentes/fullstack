<?php require_once('global.php'); ?>

<?php
//incluimos los archivos que tienen nuestras funciones
require_once('./funciones/validaciones.php');
require_once('./funciones/auth.php');
//declaramos nuestro array de errores
$errores = [];

//chequeamos que el POST tenga datos
if ($_POST) {

    //validamos los datos que ingresó el usuario, llamando a la función validar
    //y guardamos lo que nos devuelva en nuestra variable de errores
    $errores = validarLogin($_POST);

    //si no hay errores (si errores esta vacio)
    if (!$errores) { // if(count($errores) == 0)
        //intentamos registrar al usuario
        $errores= logear($_POST);

      if (!erorores)  header('location: index.php');
        exit;
    }

    //Si el login sale mal o hay errores al validar, el código sigue su curso,
    //mostrando el formulario, los errores y los valores que el usuario había ingresado.
}

?>

<?php
//Incluimos el header.
//El header usa una variable "pageTitle" para poner el titulo de la página en donde estamos
//Como al incluir un archivo PHP pega el código del mismo y después ejecuta, header.php puede usar la variable declarada acá.
    $pageTitle = 'Login';
    include_once ('componentes/header.php');
?>
<div class="row">
    <?php
    //mostramos los errores
    if ($errores) {
    ?>
        <div class="alert alert-danger">
            <div><strong>Error!</strong></div>
            <ul>
                <?php
                //por cada error adentro del array de errores, imprimimos un <li> con el mensaje de error
                foreach($errores as $error) {
                ?>
                    <li><?php echo $error ?></li>
                <?php } ?>
            </ul>
        </div>
    <?php } ?>
    <form action="" method="post">
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo ($_POST['email'] ?? '') ?>" placeholder="Ingrese Email">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="contrasena">Contraseña</label>
                <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Ingrese Contraseña">
            </div>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" id="chk-recordarme" name="recordarme"> Recordarme en este equipo
            </label>
        </div>
        <input type="submit" class="btn btn-info" value="Login" />
    </form>
</div>
<?php include_once ('componentes/footer.php'); ?>
