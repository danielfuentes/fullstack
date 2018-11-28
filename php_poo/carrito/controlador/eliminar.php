<?php
   require_once ('../modelo/class.conexion.php');
   require_once ('../modelo/class.consultas.php');
   
   
   if(isset($_GET['id']))
   {
    
       $id = $_GET['id'];
       
       $consultas = new Consultas();
       $resultado =$consultas->eliminarProductos($id);
       
       
       header('Location:../consultar_productos.php');
   } 


?>