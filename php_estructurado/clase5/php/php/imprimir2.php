<?php
foreach (getAllHeaders() as $nombre => $value) {
    echo $nombre . ": " .$value . "<br/>";
}

var_dump($_GET);

echo "<br>";
foreach($_GET as $clave => $valor){
    echo  $clave ." ".$valor."<br>" ;
}
 ?>
