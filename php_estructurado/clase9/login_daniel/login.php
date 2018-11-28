<?php
include_once('controladores/controlador_session_cookie.php');
if($_POST){
  inicioSesion();
  capturaDatos($_POST);
  if (isset($_POST['recordar'])){
    recordarPassword($_POST);
  }
  header('Location: menu.php');
}


?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Verificar como trabaja Sesión y Cookie</title>
    <!--<link rel="stylesheet" href="css/estilos.css">-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/master.css">
 
</head>

<body>
<div class="container bg-light">
  <div class="row">
    <div class="col">
      <fieldset class="form-group" border=1>
        <legend class="col-form-label col-sm-12 "><h2>Inicio de sesión</h2></legend> 
      <form  action="" method="post" >
        <div class="form-grop" class="col-sm-12">
          <label class="col-sm-12">Nombre Completo:</label>
          <div class="col-sm-12">
            <input class="form-control" name="nombre" type="text" id="dni" size="30" maxlength="50" required  placeholder="Ingresar nombre y apellido"/>
          </div>
        </div>  
        <div class="form-group" class="col-sm-12">
          <label class="col-sm-12">E-mail:</label>
          <div class="col-sm-12">
            <input class="form-control" name="email" type="email" id="email" size="12" maxlength="30" required placeholder="Ingresar correo electrónico"/>
          </div>
        </div>  
        <div class="form-group">
        <label class="col-sm-12">Contraseña:</label>
        <div class="col-sm-12">
          <input class="form-control" name="password" type="password" id="password" size="30" maxlength="30" required required placeholder="Ingresar contraseña"/>
        </div>  
        <fieldset class="form-group">
            
            
            <div class="form-check" class="col-sm-12">
              <input class="form-check-input"  name="recordar" type="checkbox" id="check1" value="recordar">
              <label class="col-sm-12" class="form-check-label" for="check1">
                Recordar la Contraseña
              </label>
            </div>
            
          </fieldset>
          
          <div class="form-group row" class="col-sm-12">
            <div class="col-sm-12  pt-2">
              <button type="submit" class="btn btn-primary">Enviar</button>
            
              <button type="reset" class="btn btn-success">Restablecer</button>
            </div>
          </div>
      </form>
      </fieldset>

    </div>
  </div>
</div>  
<script src="js/bootstrap.min.js"></script>
</body>
</html>
