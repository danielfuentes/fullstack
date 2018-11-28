<?php
require_once ('../modelo/class.conexion.php');
require_once ('../modelo/class.consultas.php');

    $resultado = null;
    $consultas = new Consultas();
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $id_categoria = $_POST['id_categoria'];
    $precio = $_POST['precio'];
    $id = $_POST['id'];    

    if(trim($nombre)!="" && trim($descripcion)!="" && trim($id_categoria)!="" && trim($precio)!="")
    {
        $consultas = new Consultas();
        $resultado=$consultas->modificarProducto("nombre",$nombre,$id);
        $resultado=$consultas->modificarProducto("descripcion",$descripcion,$id);
        $resultado=$consultas->modificarProducto("id_categoria",$id_categoria,$id);
        $resultado=$consultas->modificarProducto("precio",$precio,$id);

        echo $resultado;
        echo "<br><a href='../consultar_productos.php'>Ver los Productos...</a>";
    }else
    {
        echo "Por favor completar todos los campos del formulario...";
        echo "<br><a href='../modificar.php'>Modificar el Producto...</a>";
    }
   


?>