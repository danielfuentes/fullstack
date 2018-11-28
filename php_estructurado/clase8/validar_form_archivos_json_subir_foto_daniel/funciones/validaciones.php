<?php    
function validar($datos){
    $errores=[];
    //Valida que el campo nombre no esté vacío.
    if (trim($datos['nombre']) =="") {
        $errores['nombre'] = "El campo nombre es incorrecto.";
    }
    if(!is_numeric($datos['edad'])){
        $errores['edad'] = "El campo edad debe ser número.";
    }
    //Valida que el campo email sea correcto.

    if(!filter_var($datos['email'], FILTER_VALIDATE_EMAIL)){
        $errores['email'] = "El correo especificado no es correcto.";
    }
    //Aquí valido si el usuario coloco una imagen
    
    
    if ($_FILES['foto']['error'] == UPLOAD_ERR_OK)
    {
        
        $nombre=$_FILES['foto']["name"];
        $archivo=$_FILES['foto']["tmp_name"];

        $ext = pathinfo($nombre, PATHINFO_EXTENSION);
        
        if ($ext != "png" && $ext != "jpg") {
            $errores['foto'] = "La foto debe tener los formatos JPG ó PNG";
        }
        else {
            
            $miArchivoDestino = dirname(__DIR__);
            $miArchivoDestino = $miArchivoDestino . "/img/";
            $miArchivoDestino = $miArchivoDestino . $_POST["nombre"] . "." . $ext;

            move_uploaded_file($archivo, $miArchivoDestino);
        }
    } else
    {
    
        $errores['foto'] = "Disculpe debe seleccionar una imagen...";
    }



    
return $errores;
}


