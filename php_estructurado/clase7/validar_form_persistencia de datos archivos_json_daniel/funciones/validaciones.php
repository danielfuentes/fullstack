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
    
return $errores;
}


