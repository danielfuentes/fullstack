<?php

$faq = [
    ["pregunta" => "Cuanto es 1+1?", "respuesta" => "2"],
    ["pregunta" => "Cuanto es 2+2?", "respuesta" => "4"],
    ["pregunta" => "Cuanto es 3+3?", "respuesta" => "6"],
    ["pregunta" => "Cuanto es 4+4?", "respuesta" => "8"],
    ["pregunta" => "Cuanto es 5+5?", "respuesta" => "10"]
];
 ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Testing</title>
    </head>
    <body>
        <?php
            for ($i = 0; $i < 5; $i++) {
                echo $faq[$i]["pregunta"] . " ";
                echo $faq[$i]["respuesta"] . "<br><br>";
            }
         ?>
    </body>
</html>
