<?php

$arrayColores = [
    'Nombre 1' => 'Valor 1',
    'Nombre 2' => 'Valor 2',
    'Nombre 3' => 'Valor 3'];


 ?>

 <!DOCTYPE html>
 <html>
     <head>
         <meta charset="utf-8">
         <title>Ejercicio 4</title>
         <style>
            ul {
                list-style: none;
            }

            li {
                float: left;
                border: 1px solid black;
                overflow: hidden;
                width: 100px;
                text-align: center;
                padding: 5px 0;
            }

            li:nth-child(even) {
                float: none;

            }
         </style>
     </head>
     <body>
         <ul>
         <?php
            foreach ($arrayColores as $nombre => $precio) {
                echo '<li class="articulo">' . $nombre . '</li>' . "\n";
                echo '<li class="articulo">' . $precio . '</li>' . "\n";
            }

          ?>
        </ul>
     </body>
 </html>
