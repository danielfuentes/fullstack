<?php
    function abrirArchivo() {
        if (file_exists("texto.txt") == FALSE) {
            echo "No existe el archivo, creandolo... <br><br>";
            fclose(fopen("texto.txt", "wr"));
            for ($i=0; $i < 100; $i++) {
                file_put_contents("texto.txt", "Hola mundo! testing." . PHP_EOL, FILE_APPEND);
            }
        }else {
            echo "Ya existe el archivo, siguiendo... <br><br>";
        }
    }

abrirArchivo();

$archivo = file_get_contents("texto.txt");

//echo $archivo;



$arch = fopen("texto.txt", "r");
while ($linea = fgets($arch)) {
    echo $linea . "<br>";
}

fclose($arch);

unlink("texto.txt");

file_put_contents("texto2.txt", "Hola nuevamente mundo!". PHP_EOL);
file_put_contents("texto2.txt", "YA NO!", FILE_APPEND);
 ?>
