<?php
    function checkbox() {
        $arch = fopen("categorias.json", "r");
        while ($linea = fgets($arch)) {
            if (strpos($linea, "nombre") != 0) {
                $array[] = substr($linea, 0, -2);
            }
        }

        fclose($arch);


        foreach ($array as $value) {
            $arrayTerminado[] = json_decode($value, true);
        }

        return $arrayTerminado;

    }


 ?>


 <!DOCTYPE html>
 <html>
     <head>
         <meta charset="utf-8">
         <title></title>
     </head>
     <body>
         <form action="json.php" method="post">
             <?php
                 foreach (checkbox() as $array) {?>
                    <input type="checkbox" name="<?=$array["nombre"]?>" value="<?=$array["id"]?>">
                    <label for="<?=$array["nombre"]?>"><?=$array["nombre"]?></label>
            <?php } ?>
         </form>
     </body>
 </html>
