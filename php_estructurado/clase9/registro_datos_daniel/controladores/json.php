<?php

function crearJson($key)
{
    //armo el filename de mi archivo json
    $filename = "datos/$key.json";

    //si el archivo no existe, lo creo con un json pre-armado
    if (!file_exists($filename)) {
        //armo el template para el json base del archivo.
        $template = [];
        $template[$key] = [];

        //convierto el array template en un string json
        $json = json_encode($template);

        //guardo el json en el archivo
        file_put_contents($filename, $json);
    }
}

function obtenerContenido($key)
{
    //por las dudas, tratamos de crear el json de usuarios.
    //internamente, la función se va a encargar de no recrearlo si existe.
    crearJson($key);

    //armo el filename de mi archivo json
    $filename = "datos/$key.json";

    //obtenemos el contenido del json
    $json = file_get_contents($filename);

    //decodificamos el json que obtuvimos y lo convertimos en un array.
    $datos = json_decode($json, true);

    return $datos[$key];
}

function guardarContenido($key, $arrayDatos)
{
    //por las dudas, tratamos de crear el json de usuarios.
    //internamente, la función se va a encargar de no recrearlo si existe.
    crearJson($key);

    $datos[$key] = $arrayDatos;

    //armo el filename de mi archivo json
    $filename = "datos/$key.json";

    //pisamos el contenido del archivo con todos los datos del array de usuarios.
    file_put_contents($filename, json_encode($datos));
}
