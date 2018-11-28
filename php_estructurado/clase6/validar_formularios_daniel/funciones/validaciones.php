<?php    
//Este es el programa que hace las validaciones

function validar($datos){
    //Valida que el campo nombre no esté vacío.
    //También si desean pueden usar la función
    //de PHP llamada empty() La cual determina
    //si un campo está o no vacio. tal como lo 
    //pueden observar mas abajo
    //if (trim($datos['nombre']) =="") {
      if (empty($datos['nombre'])) {  
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


