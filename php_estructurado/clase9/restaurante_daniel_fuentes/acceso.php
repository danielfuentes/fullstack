<html>
  <head>
    <title>Formulario de acceso</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/index.css">

    <meta charset="utf-8">
  </head>
  <body>
  
    <div class="container">
      <div id="formContainer" class="row align-items-center">
        <div class="col-sm-6 offset-md-3">
          <h1>En línea contigo</h1>
          <form action= "controladores/controlador.php" method="post">
            <div class="form-group">
              <label for="email">Correo electrónico</label>
              <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Ingrese su correo" >
            </div>
            <div class="form-group">
              <label for="password">Contraseña</label>
              <input type="password" class="form-control" id="password" placeholder="Contraseña" >
              <small class="form-text text-muted">Al menos 6 caracteres, debe contenter letras en mayúsculas y minúsculas y números</small>
            </div>
            <div class="form-group">
              <label for="password">Repetir contraseña</label>
              <input type="password" class="form-control" id="passwordRepeat" placeholder="Repetir contraseña" >
            </div>
            
            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="termsCondition" name="recordar>
              label class="form-check-label" for="recordar">Recordar contraseña</label>
            </div>
            <button type="submit" class="btn btn-primary">Entrar</button>            
          </form>
        </div>
      </div>
    </div>

    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
  </body>
</html>
