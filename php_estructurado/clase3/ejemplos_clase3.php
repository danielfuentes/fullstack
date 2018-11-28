<?php
//Ejercicios para mis alumnos de DH
//Espero les resulte de utilidad
//MSc. Ángel Daniel Fuentes
//Practicando y viendo como funciona el Ciclo While

    $contador = 5;
    while ($contador > 0) {
    echo $contador;
    $contador--;
    }

//Ciclo Do while    
    echo "<hr>";

    $cantidad = 5;
    do {
        echo $cantidad;
        $cantidad--;    
    } while ($cantidad > 0);

//Trabajando con Array usando el break    

    echo "<hr>";

    $array =[1, 2, 3, 4, 5, 6, 7, 8, 9, 0];
    for ($i = 0; $i < count($array); $i++) {
      if ($array[$i] == 3) {
        echo $array[$i];
        break;
      }
    }
    
//Trabajando con Array usando el continue    
    echo "<hr>";
    $array =[1, 2, 3, 4, 5, 6, 7, 8, 9, 0];


    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] == 3) {
        continue;
        }
        echo "Valor de la variable i es:  $i  <br>";
    }
    
//Ojo para ver como funciona el exit, debes descomentarlo
//pero luego de verificarlo debes volver a comentarlo
//de lo contrario el programa no continua

    echo "<hr>";

    $var = "Un texto"; 
    var_dump($var);  //Esto se llega a imprimir
    //exit; Esto debo comentarlo para poder continuar con los ejemplo 

    $numero = 1;
    echo $numero; //Esto NO se llega a imprimir
    
   //Practicando con el foreach 
    echo "<hr>";

    $miArray = [17, 45, 68, 51, 16];
    foreach ($miArray as $valor) {
        echo $valor;
        echo "<br>";
    }
    
   //foreach sólo valor 
    echo "<hr>";

    $miAuto = [
    "Patente" => "AA 123 HB",
    "Marca" => "Ford"
    ];

    foreach ($miAuto as $valor) {
        echo "$valor <br>";
        
    }
    //foreach clave valor (Pendiente con esto)
    echo "<hr>";
    $miAuto = [
        "Patente" => "AA 123 HB",
        "Marca" => "Ford"
    ];
    
    foreach ($miAuto as $clave => $valor) {
        echo "La $clave  es: $valor <br>";
    }
    

    //Algunos ejercicios 
    echo "<hr>";
    $cara=0;
    $moneda=0;
    $tiro = 0;
    while ($cara<5){
       $valor= rand(0,1);
       if($valor==1){
           $cara++;
           
       }
       $tiro++;

    }
    echo "Cantidad de intentos: $tiro <br>   ";
    echo "La moneda fue cara: $cara <br>";

    //Practicando con el foreach
    echo "<hr>";
    $ceu = [
        "Argentina" => ["Buenos Aires", "Córdoba", "Santa Fé"],
        "Brasil" => ["Brasilia", "Rio de Janeiro", "Sao Pablo"],
        "Colombia" => ["Cartagena", "Bogota", "Barranquilla"],
        "Francia" => ["Paris", "Nantes", "Lyon"],
        "Italia" => ["Roma", "Milan", "Venecia"],
        "Alemania" => ["Munich", "Berlin", "Frankfurt"]
    ];
    //Esto fue lo que les indique en clases
    //Primero deben ver como funciona para luego 
    //armar las listas desordenadas.

    foreach ($ceu as $key=>$value) {
             echo "$key <br>";
        foreach ($value as $key =>$value) {
            echo "$key $value<br>";
            
        }
    }

    echo "<hr>";
    //Ahora luego de entender como trabaja armas el ejercicio
    //con las listas desordenadas.
    foreach ($ceu as $indice => $valor) {
        
    echo "<ul>";
    echo "<li>Las ciudades de $indice son:</li> <br>";
            echo "<ul>";
                foreach ($valor as $key=> $valor) {
                    
                    echo "<li> $valor </li> <br>";
                }        
            echo "</ul>";
            
        echo "</ul>";
    }

//La idea es que ustedes repasen cada uno de los ejercicios
//nunca traten de imitar mi lógica ni la de nadie, generen 
//la de ustedes. Feliz fin de semana. Abrazos.- Mis mejores deseos.

//Como siempre le he indicado a mis alumnos:
/*"La vida es una constante lucha... Sólo debemos pedirle a Dios
que nos de salud, para continuar adelante superando con todas 
nuestras fuerzas los obstáculos que nos encontremos

https://adanielf.wordpress.com/2015/10/21/palabras-a-mi-ahijadas-y-ahijados-de-la-vi-promocion-del-programa-nacional-de-formacion-en-ingenieria-en-informatica/

*/


?>