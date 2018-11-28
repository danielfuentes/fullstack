<?php

echo "1: ";
var_dump($_GET);
echo "<br/><br/>";

echo "2. b: ";
var_dump($_GET["nombre"]);
echo "<br/><br/>";

echo "2. c: ";
foreach ($_GET as $value) {
    echo $value . " ";
}



 ?>
