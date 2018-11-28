<?php
    function cargar()
    {
        //Se crea una instancia $consultas de la clase Consultas que está en el modelo (class.consultas.php)
        $consultas = new Consultas();
        //Se invoca al metodo cargarProductos de la clase Consultas
        $row = $consultas->cargarProductos();
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE DEL PRODUCTO</th>
                    <th>DESCRIPCIÓN</th>
                    <th>ID DEL PRODUCTO</th>
                    <th>PRECIO</th>
                    <th>ACCIONES</th>
                </tr>";
                foreach ($row as $registro) 
                {
                    echo "<tr>";
                        echo "<td>".$registro['id']."</td>";
                        echo "<td>".$registro['nombre']."</td>";
                        echo "<td>".$registro['descripcion']."</td>";
                        echo "<td>".$registro['id_categoria']."</td>";
                        echo "<td>".$registro['precio']."</td>";
                        echo "<td><a href='modificar.php?id=".$registro['id']."'><img title='Modificar' src ='img/editar.png'/></a></td>";
                        echo "<td><a href='controlador/eliminar.php?id=".$registro['id']."'><img title='Eliminar' src ='img/Restar.png'/></a></td>";

                    echo "</tr>";
                }
        echo "</table>";
    }     
    function buscar($nombre)
    {
        
        $consultas = new Consultas();
        $row = $consultas->buscarProductos($nombre);
        
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE DEL PRODUCTO</th>
                    <th>DESCRIPCIÓN</th>
                    <th>ID DEL PRODUCTO</th>
                    <th>PRECIO</th>
                    <th>ACCIONES</th>
                </tr>";
                if(count($row)>0)
                {       
                    foreach ($row as $registro) 
                    {
                    echo "<tr>";
                        echo "<td>".$registro['id']."</td>";
                        echo "<td>".$registro['nombre']."</td>";
                        echo "<td>".$registro['descripcion']."</td>";
                        echo "<td>".$registro['id_categoria']."</td>";
                        echo "<td>".$registro['precio']."</td>";
                        echo "<td><a href='modificar.php?id=".$registro['id']."'><img title='Modificar' src ='img/editar.png'/></a></td>";
                        echo "<td><a href='controlador/eliminar.php?id=".$registro['id']."'><img title='Eliminar' src ='img/Restar.png'/></a></td>";

                    echo "</tr>";
                    }
                }    
        echo "</table>";
    }     

?>