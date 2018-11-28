<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
    <!--<link rel="stylesheet" href="css/estilos.css">-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/master.css">
 
</head>

<body>
<div class="container bg-light">
  <div class="row">
    <div>
      <span class="col-sm-2 "></span>
    </div>  
    <div class="col-sm-8">
      <fieldset class="form-group col-sm-8 "  border=1>
        <legend class="col-form-label col-sm-8 ">Inicio de sesión</legend> 
        <form  action="" method="post" >
        <div class="form-grop" class="col-sm-8">
          
          <div class="col-sm-8">
            <input class="form-control" name="email" type="text" id="email" size="30" maxlength="50"   placeholder="Correo electrónico"/>
          </div>
        </div>  
    
        <div class="form-group">
        <div class="col-sm-8">
          <input class="form-control" name="password" type="password" id="password" size="30" maxlength="30" placeholder="Ingresa tu contraseña" />
        </div>  
            
        <div class="form-check" class="col-sm-8">
          <input class="form-check-input"  name="recordar" type="checkbox" id="check" value="recordar">
          <label class="col-sm-8" class="form-check-label" for="check">
            Recordar la Contraseña
          </label>
        </div>
            
     
          
          <div class="form-group row" class="col-sm-8">
            <div class="col-sm-8  pt-2">
              <button type="submit" class="btn btn-primary">Entrar</button>
            </div>
          </div>
      </form>
      </fieldset>  
      <div>
        <span class="col-sm-2 "></span>
      </div>  
    
  </div>
</div>  
<script src="js/bootstrap.min.js"></script>
</body>
</html>
