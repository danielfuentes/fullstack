<?php require_once('global.php'); ?>

<?php
//incluimos los archivos que tienen nuestras funciones
require_once('funciones/validaciones.php');
require_once('funciones/auth.php');
require_once('funciones/utils.php');
require_once('repositorios/categorias.php');

//declaramos nuestro array de errores
$errores = [];

//chequeamos que el POST tenga datos
if ($_POST) {

    //validamos los datos que ingresó el usuario, llamando a la función validar
    //y guardamos lo que nos devuelva en nuestra variable de errores
    $errores = validarlogin($_POST);

    //si no hay errores (si errores esta vacio)
    if (!$errores) { // if(count($errores) == 0)
        //intentamos registrar al usuario
        $errores = registrar($_POST);

        //si la registracion sale bien, redireccionamos al usuario
        if (!$errores) {
            header('location: index.php');
            exit;
        }
    }

    //Si la registracion sale mal o hay errores al validar, el código sigue su curso,
    //mostrando el formulario, los errores y los valores que el usuario había ingresado.
}

?>

<?php
//Incluimos el header.
//El header usa una variable "pageTitle" para poner el titulo de la página en donde estamos
//Como al incluir un archivo PHP pega el código del mismo y después ejecuta, header.php puede usar la variable declarada acá.
    $pageTitle = 'Registración';
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
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="nombre">Nombre</label>
                <input
                    type="text"
                    class="form-control"
                    id="nombre"
                    name="nombre"
                    value="<?php
                        //Si $_POST['nombre'] existe y no es null, le devolvemos su valor al echo. Si no, devolvemos un string vacio.
                        echo ($_POST['nombre'] ?? '')
                    ?>"
                    placeholder="Ingrese Nombre"
                />
            </div>
            <div class="form-group col-sm-6">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo ($_POST['apellido'] ?? '') ?>" placeholder="Ingrese Apellido">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="username">Nombre de Usuario</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo ($_POST['username'] ?? '') ?>" placeholder="Ingrese Nombre de Usuario">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo ($_POST['email'] ?? '') ?>" placeholder="Ingrese Email">
            </div>
            <div class="form-group col-sm-6">
                <label for="email-confirm">Confirmar Email</label>
                <input type="text" class="form-control" id="email-confirm" name="email_confirm" value="<?php echo ($_POST['email_confirm'] ?? '') ?>" placeholder="Ingrese Confirmación Email">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="contrasena">Contraseña</label>
                <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Ingrese Contraseña">
            </div>
            <div class="form-group col-sm-6">
                <label for="contrasena-confirm">Confirmar Contraseña</label>
                <input type="password" class="form-control" id="contrasena-confirm" name="contrasena_confirm" placeholder="Ingrese Confirmación Contraseña">
            </div>
        </div>
        <div class="form-group">
            <input type="file" name="avatar" />
        </div>
        <div class="form-group">
            <label>Sexo</label>
            <div>
                <label class="radio-inline">
                    <input
                        type="radio"
                        name="sexo"
                        id="sexo_masculino"
                        value="0"
                        <?php
                            //Si $_POST['sexo'] existe y su valor es igual al value de este radio button, le devuelvo un 'checked' al
                            //echo para que lo imprima. Si no, devuelvo un string vacio
                            echo (isset($_POST['sexo']) && $_POST['sexo'] == 0 ? 'checked' : '')
                        ?>
                    /> Masculino
                </label>
                <label class="radio-inline">
                    <input type="radio" name="sexo" id="sexo_femenino" value="1" <?php echo (isset($_POST['sexo']) && $_POST['sexo'] == 1 ? 'checked' : '') ?>> Femenino
                </label>
            </div>
        </div>
        <div class="form-group">
            <label> Fecha de Nacimiento</label>
            <div class="row">
                <div class="col-sm-2">
                    <select class="form-control" name="fnac_dia">
                        <option value="">Día</option>
                        <?php for ($i = 1; $i <= 31; $i++) { ?>
                            <option
                                value="<?php echo $i; ?>"
                                <?php
                                    //Si $_POST['fnac_dia'] existe y su valor es igual a $i (el value que vamos a imprimir para el <option>), le devuelvo un 'selected' al
                                    //echo para que lo imprima. Si no, devuelvo un string vacio
                                    echo (isset($_POST['fnac_dia']) && $_POST['fnac_dia'] == $i ? 'selected' : '')
                                ?>
                            >
                                <?php echo $i; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="form-control" name="fnac_mes">
                        <option value="">Mes</option>
                        <?php
                        //obtengo la lista de meses, llamando directamente a la función listMeses(), que devuelve un array.
                        foreach (listMeses() as $numero => $mes) { ?>
                            <option
                                value="<?php echo $numero; ?>"
                                <?php echo (isset($_POST['fnac_mes']) && $_POST['fnac_mes'] == $numero ? 'selected' : '') ?>
                            >
                                <?php echo $mes; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select class="form-control" name="fnac_anio">
                        <option value="">Año</option>
                        <?php for ($i = date('Y'); $i >= (date('Y') - 100); $i--) { ?>
                            <option
                                value="<?php echo $i; ?>"
                                <?php echo (isset($_POST['fnac_anio']) && $_POST['fnac_anio'] == $i ? 'selected' : '') ?>
                            >
                                <?php echo $i; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Categorías</label>
            <div>
                <?php
                //obtengo la lista de categorias, llamando directamente a la función listCategorias(), que devuelve un array.
                foreach (listCategorias() as $categoria) { ?>
                    <div class="checkbox">
                        <label>
                            <input
                                type="checkbox"
                                name="categorias[]"
                                value="<?php echo $categoria['id']; ?>"
                                <?php
                                    //Si $_POST['categorias'] existe y el ID de la categoría que estamos por mostrar es igual a
                                    //alguno de los valores seleccionados por el usuario, le devuelvo un 'checked' al echo para
                                    //que lo imprima. Si no, devuelvo un string vacio
                                    echo (isset($_POST['categorias']) && in_array($categoria['id'], $_POST['categorias']) ? 'checked' : '')
                                ?>
                            > <?php echo $categoria['nombre'] ?>
                        </label>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion" class="form-control" rows="3"><?php echo ($_POST['descripcion'] ?? '') ?></textarea>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" id="chk-terminos" name="terminos"> Acepto los términos y condiciones
            </label>
        </div>
        <input type="submit" class="btn btn-info" value="Registrarme"/>
    </form>
</div>
<?php include_once ('componentes/footer.php'); ?>
