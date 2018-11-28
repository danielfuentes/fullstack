<?php
function redirect($url, $permanent = false) {
    header("Location:" .$url, true, $permanent? 301 : 302);
    exit;
}

if ($_POST) {?>
    <p>Muchas gracias por registrarte <?=$_POST["nombre"] . " " .$_POST["apellido"]?>, nos has dicho que tienes <?=$_POST["edad"]?> años.</p>
    <p>Hemos registrado tu email, <?=$_POST["mail"]?>. ¡Gracias!</p>
<?php } else {
    redirect("registro_usuarios.php");
}

/*if ($_GET) {?>
    <p>Muchas gracias por registrarte <?=$_GET["nombre"] . " " .$_GET["apellido"]?>, nos has dicho que tienes <?=$_GET["edad"]?> años.</p>
    <p>Hemos registrado tu email, <?=$_GET["mail"]?>. ¡Gracias!</p>
<?php } */?>
