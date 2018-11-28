<?php
function guardarImagen($imagen, $errores) {
    if ($_FILES["avatar"]["error"] == UPLOAD_ERR_OK) {
        $nombre=$_FILES["avatar"]["name"];
        $archivo=$_FILES["avatar"]["tmp_name"];

        $ext = pathinfo($nombre, PATHINFO_EXXTENSION);
        $miArchivo = dirname(__FILE__);
        $miArchivo = $miArchivo . "/img/";
        $miArchivo = $miArchivo . "imagenNueva." . $ext;

        move_uploaded_file($archivo, $miArchivo);
    }
}

guardarImagen();

?>
