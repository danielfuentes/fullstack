<?php
      
    require_once ('modelo/class.conexion.php');
    require_once ('modelo/class.consultas.php');
    require_once ('controlador/seleccionar.php');

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Ejemplo de Registro de Productos</title>
</head>
<body>
    

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-purple fixed-top">
        <div class="container">
            <a class="navbar-brand font-white" href="consultar_productos.php">Carrito en línea</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link font-white" href="consultar_productos.php">Consultar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-white" href="insertar.php">Incluir</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Header -->
    <header class="bg-dark text-white">
        <div class="container text-center">
            <h1>Modificar Productos </h1>
            <p class="lead">Ejemplo para mis alumnos de Digital House - !</p>
        </div>
    </header>


    <!-- Cuerpo principal -->
    <section class="bg-home">
        <div class="container">
            <div class="row">
                
                <div class="col-12 mx-auto bg-light rounded">    
                    <?php 
                        //Se invoca al controlador seleccionar.php
                        
                        seleccionar();
                    ?>
                
               | </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="py-3 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright&copy;: MSc. Ángel Daniel Fuentes. - Para mis alumnos de Digital House</p>
        </div>
    </footer>


    <!-- Scripts para Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    

</body>
</html>