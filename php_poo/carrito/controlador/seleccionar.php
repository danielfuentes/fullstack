<?php
    //Esta es la función que se ejecuta cuando el usuario desea modificar algún registro de la lista mostrada
    function seleccionar()
    
    {
     
    
        if(isset($_GET['id']))
        
        
        { 
        //Aquí se está instanciando al objeto $consultas considerando la clase Consultas la cual se encuentra en el modelo (class.consultas.php) 
        $consultas = new Consultas();
        $id = $_GET['id'];
        $row = $consultas->cargarProducto($id);
        foreach ($row as $registro) 
        {
        echo '
        <form action="controlador/modificar_producto.php" method="post">
        <div class="col-8 offset-sm-2 text-center my-3">
            <h2>Modificar Productos</h2>
            <p class="hint-text">Modifica los Productos de tu tienda en línea.</p>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="nombre" value = "'.$registro['nombre'].'" >
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="descripcion" value = "'.$registro['descripcion'].'" >
        </div>	
        <div class="form-group">
            <input type="text" class="form-control" name="id_categoria" value = "'.$registro['id_categoria'].'" >
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="precio" value = "'.$registro['precio'].'" >
        </div>
        <div class="form-group">
            <input type="hidden" class="form-control" name="id" value = "'.$id.'" >
        </div>
        <div class="form-group col-10 m-auto col-sm-8 offset-sm-2">
            <button type="submit" class="btn btn-lg btn-block bg-purple font-white">Guardar la modificación</button>
        </div>
        </form>        
        ';
        }
        
        }

    }    


?>

