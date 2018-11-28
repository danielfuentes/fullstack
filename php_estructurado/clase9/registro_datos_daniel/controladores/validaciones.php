<?php
require_once('repositorios/usuarios.php');

function validar($datos)
{
    //declaro un array de errores para llenar con las validaciones
    $errores = [];

    //trim saca los espacios adelante y atras del texto en un string.
    //esta validación quita esos espacios y pregunta si lo que queda de ese string
    //es un string vacio. Si lo es, agregamos el error
    if (trim($datos['nombre']) == '') {
        $errores['nombre'] = 'Debe ingresar su Nombre';
    }

    if (trim($datos['apellido']) == '') {
        $errores['apellido'] = 'Debe ingresar su Apellido';
    }

    if (trim($datos['username']) == '') {
        $errores['username'] = 'Debe ingresar un Nombre de Usuario';
    } elseif (buscarUsuario(USERNAME_FIELD, $datos['username'])) {
        //si el llamado a la función nos dice que encontro otro usuario con el mismo username, agregamos un error
        $errores['username'] = 'El Nombre de Usuario ingresado ya existe en nuestra base de datos';
    }

    //filter_var es una función de PHP que nos permite filtrar y sanitizar valores.
    //en este caso, la usamos para verificar si el email tiene un formato valido.
    /** @see https://php.net/filter_var */
    if (!filter_var($datos['email'], FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = 'Debe ingresar un Email válido';
    } elseif ($datos['email'] != $datos['email_confirm']) {
        $errores['email_confirm'] = 'El Email y su confirmación deben coincidir';
    } elseif (buscarUsuario(EMAIL_FIELD, $datos['email'])) {
        //si el llamado a la función nos dice que encontro otro usuario con el mismo username, agregamos un error
        $errores['email'] = 'El Email ingresado ya existe en nuestra base de datos';
    }

    //strlen nos permite obtener la cantidad de caracteres de un string.
    //en este caso, "medimos" el tamaño de la contraseña ingresada
    //y si es menor a 6, agregamos un error
    if (strlen($datos['contrasena']) < 6) {
        $errores['contrasena'] = 'La contraseña debe tener al menos 6 caracteres';
    } elseif ($datos['contrasena'] != $datos['contrasena_confirm']) {
        $errores['contrasena_confirm'] = 'La Contraseña y su confirmación deben coincidir';
    }

    if ($_FILES['avatar']['error'] == UPLOAD_ERR_NO_FILE) {
        $errores['avatar'] = 'Debe cargar una imagen de perfil';
    }

    //los radio buttons y los checkboxes no llegan cuando no se los selecciona.
    //por lo tanto, tenemos que preguntar si "estan seteados" y eso nos dice que el usuario seleccionó por lo menos uno.
    if (!isset($datos['sexo'])) {
        $errores['sexo'] = 'Debe seleccionar su sexo';
    }

    //checkdate nos permite saber si una fecha es válida o no.
    //en este caso, primero chequeamos que el usuario haya seleccionado un dia, un mes y un año
    //si selecciono los 3, entonces chequeamos que la combinación de una fecha válida.
    if (!$datos['fnac_dia'] || !$datos['fnac_mes'] || !$datos['fnac_anio'] || !checkdate($datos['fnac_mes'], $datos['fnac_dia'], $datos['fnac_anio'])) {
        $errores['fnac_dia'] = 'Debe ingresar una Fecha de Nacimiento válida';
    }

    if (!isset($datos['categorias']) || count($datos['categorias']) < 2) {
        $errores['categorias'] = 'Debe seleccionar al menos 2 Categorías';
    }

    if (strlen($datos['descripcion']) < 20 || strlen($datos['descripcion']) > 140) {
        $errores['descripcion'] = 'La Descripción debe contener entre 20 y 140 caracteres';
    }

    if (!isset($datos['terminos'])) {
        $errores['terminos'] = 'Debe aceptar los Términos y Condiciones';
    }

    return $errores;
}

function validarlogin ($datos) {
  $arrayDeErrores=[];


  //1.Validar email//
   if (!filter_var($datos['email'], FILTER_VALIDATE_EMAIL)) {
     $arrayDeErrores[] = 'El mail es invalido';
  //2.Validar formato password//
  if ($datos['contrasena'] == '') {
    $arrayDeErrores[] = 'Ingrese un password';
  }
   }
  return $arrayDeErrores;
}
