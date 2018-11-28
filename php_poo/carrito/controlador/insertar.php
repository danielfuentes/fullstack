<?php
    require_once ('../modelo/class.conexion.php');
    require_once ('../modelo/class.consultas.php')
    ;
    $respuesta = null;
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $id_categoria = $_POST['id_categoria'];
    $precio = $_POST['precio'];
    
    if(trim($nombre)!="" && trim($descripcion)!="" && trim($id_categoria)!="" && trim($precio)!="")
    {
        $consultas = new Consultas();
        $respuesta = $consultas->registroProducto($nombre,$descripcion,$id_categoria,$precio);
        echo "<br><a href='../insertar.php'>Registrar otro producto...</a>";
    }else
    {
        echo "Por favor completar todos los campos del formulario...";
        echo "<br><a href='../insertar.php'>Registrar el Producto...</a>";
    }
    echo $respuesta;
?>