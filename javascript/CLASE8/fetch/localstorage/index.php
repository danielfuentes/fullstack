<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Web Storage - Clase 8 JavaScript</title>
    <link rel="stylesheet" href="css/master.css">
  </head>
  <body>
    <!--<h1>Practicando Web Storage - Clase 8 JavaScript</h1>-->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Web Storage</h1>
            <p class="lead">Trabajamdo con el almacenamiento en JavaScript.</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div id="recordatorio">
                    <h3>Nuevo recordatorio</h3>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Indique algo que desee se le recuerde mas adelante</label>
                    <textarea class="form-control" id="textarea" rows="5"></textarea>
                    <br>
                <button type="button" id="guardar" class="btn btn-success form-control">Guardar</button>
                <button type="button" id="borrar" class="btn btn-primary form-control">Borrar</button>
                </div>
                <div id="error">

                </div>
                
            </div>
            <div class="col-md-6">
            <div id="pendiente">
                    <h3>Actividades pendientes</h3>
                    <h4 id="datos"></h4>
                </div>         
            </div>
        </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/master.js" ></script>
  </body>
</html>