<?php

$colores = [
    'Blanco' => '#FFFFFF',
    'Verde' => '#008000',
    'Rojo' => "#FF0000"];

 ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Colores</title>
    </head>
    <body>
        <?php

            foreach ($colores as $color => $hex) {
                $arrayColores[] = $color;
            }
            echo implode(", ", $arrayColores) . ":";

         ?>
         <ul>
             <?php
                 foreach ($colores as $color => $hex) {
                     echo '<li style="color:' . $hex .';background-color:black;">' . $color . ": " . $hex . "</li>";
                 }

              ?>
         </ul>
    </body>
</html>
