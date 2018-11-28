<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP embebido en HTML + Manejo de Funciones</title>
  <!--Aquí llamo al programa libreria que continene
  mis funciones-->
  <?php require_once "php/libreria.php";?>
  <link rel= "stylesheet" href ="css/master.css">

</head>
<body>
  <div class="php">
  <?php include_once("encabezado.php") ?>
  </div> 
  <div class="php">
    <?php 
    $sexo = "femenino";
    $saludo = saludar($sexo);
    echo $saludo;
    ?>
  
  </div>
    
  <?php $sumar = sumar(50,50); ?>
  <p class="php"><?php echo "La sumatoria de 50 + 50 es: $sumar"?></p>
  
  <!--Sólo de prueba aquí puede mandar a buscar: mina - santi 
      kummer - javier -gustavo - lucas - carlos - rodo -daniel -->

  <div class="php" >
    <div class="fotos" >
    <?php $usuario = buscar("mina"); ?>
    <?php if($usuario == 0){?>
      <img src="img/mina.png">     
    <?php }elseif($usuario == 1){?>
      <img src="img/santi.png"> 
    <?php }elseif($usuario == 2){?>
      <img src="img/kummer.png">   
    <?php }elseif($usuario == 3){?>
      <img src="img/javier.png">       
    <?php }elseif($usuario == 4){?>
      <img src="img/gustavo.png">   
    <?php }elseif($usuario == 5){?>
      <img src="img/lucas.png">     
    <?php }elseif($usuario == 6){?>
      <img src="img/carlos.png">   
    <?php }elseif($usuario == 7){?>
      <img src="img/rodo.png">   
    <?php }elseif($usuario == 8){?>
      <img src="img/daniel.png"> <?php }?>    
    </div>  
  </div>
  <br>
  
  <div class="php" >
  <?php 
  $personas =["mina", "santi", "kummer","javier","gustavo","lucas","carlos","rodo","daniel"];
    foreach ($personas as $nombre) {
      $nombre = $nombre.".png";
      
    
    ?>
      <div class="fotos">
      <img src="img/<?php echo $nombre; ?>"> 
      </div>
      <?php }?>


  </div>     

  <br>
  <!--Aquí estoy validando el usuario-->
  <p class="php">
  <?php 
  //Cambie el dato de la variable $usuario y dejela en blanco
  //para que vea el efecto de la validación
  $usuario="giorgina";
  $mensaje=validar($usuario);
  echo $mensaje;?>
  </p>
  <!--Aquí estoy validando el password del usuario-->
  <p class="php">
  <?php 
  //Cambie aquí este dato para que vea el efecto de 
  //la validación
  $password="12";
  $mensaje=clave($password);
  echo $mensaje;?>
  </p>
<div class="php" >  
<?php include_once ("pie.php") ?>

</div>
</body>
</html>