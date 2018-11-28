<?php
/*Este es un programa que crea el archivo json con los precios de los combos - Esto lo estoy creando para aclarar aun mas lo referido a PHP embebido 
en el HTML*/


//Claro esto lo estoy armando a Bomba y Pedal, pero ustedes ya saben
//Que deben al cliente crearle un formulario y listo.
$datos=[
    "combo1" => 159.99,
    "combo2"=>399.99,
    "combo3"=>129.99,
    "combo4"=>259.99,
    "combo5"=>179.99,
    "combo6"=>509.99
];

//Aquí llamo a la función que genera el 
//archivo json, tal como RODO nos ha indicado, "Usar Funciones"
guardarPreciosCombos($datos);
echo "<h2>"."El archivo fue creado y actualizado satisfactorimante"."</h2>";
exit();



//Función para generar el JSON
function guardarPreciosCombos($valores){
        //Aquí lo que hago es usar una función php, para borrar
        // el archivo y de esa forma sólo tengo la ultima actualización
        
        unlink('combos.json');
        //Aquí creo y guardo mi archivo combos.json
        $json = json_encode($valores);   
        file_put_contents("combos.json", $json . PHP_EOL, FILE_APPEND);
        
}
