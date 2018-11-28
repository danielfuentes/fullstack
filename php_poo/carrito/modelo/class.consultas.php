<?php
    class Consultas
    {
        //Este metodo permite incluir un registro a la Base de Datos
        public function registroProducto($nombre,$descripcion,$id_categoria,$precio)
        {
            //Aquí instancio a $modelo considerandolo de la clase Conexion, la cual se encuentra en el modelo (class.conexion.php)
            //En este punto $modelo es un objeto de tipo Conexion
            $modelo = new Conexion();
            //Aquí ejecuto el metodo getConexion que se encuentra en la Clase Conexion       
            $conexion = $modelo->getConexion();
            $sql = "insert into productos (nombre, descripcion,id_categoria,precio) values (:nombre, :descripcion, :id_categoria,:precio)";
            $preparar = $conexion->prepare($sql);
            $preparar->bindParam(":nombre",  $nombre);
            $preparar->bindParam(":descripcion", $descripcion);
            $preparar->bindParam(":id_categoria", $id_categoria);
            $preparar->bindParam(":precio", $precio);
            
            if(!$preparar)
            {
                return "Error al insertar el registro";
            }else
            {
                $preparar->execute();
                return "Registro creado de manera exitosa..!!!";
            }

        }

        //Este metodo carga los registros que van a ser presentados en la consulta, ojo los muestra todos
        public function cargarProductos()
        {
            $row = null;
            $modelo= new Conexion();
            $conexion=$modelo->getConexion();
            $sql="SELECT p.id, p.nombre, p.descripcion, c.nombre, p.precio  from productos as p, categorias as c where p.id_categoria = c.id";
            //$sql = "select * from productos";
            $preparar= $conexion->prepare($sql);
            $preparar->execute();
            while ($resultado = $preparar->fetch())
            {
                $row[]= $resultado;
            }
            return $row;
        }
        //Metodo que elimina el registro seleccionado en la lista
        public function eliminarProductos($id)
        {
            $modelo= new Conexion();
            $conexion=$modelo->getConexion();
            $sql = "delete from productos where id =:id";
            $preparar= $conexion->prepare($sql);
            $preparar->bindParam(":id",  $id);  
            if(!$preparar)
            {
                return "Error al eliminar el registro";
            }else
            {
                $preparar->execute();
                return "Registro eliminado de manera exitosa..!!!";
            }
            


        }
        //Este metodo busca un registro que determine el usuario
        public function buscarProductos($nombre)
        {
            
            $row = null;
            $modelo= new Conexion();
            $conexion=$modelo->getConexion();
            $nombre = "%".$nombre."%";
            
            $sql = "select * from productos where nombre like :nombre";
           
            $preparar= $conexion->prepare($sql);
            $preparar->bindParam(":nombre",  $nombre);  
            $preparar->execute();
            while ($resultado = $preparar->fetch())
            {
                $row[]= $resultado;
            }
            return $row;
        }
        //Este metodo carga un sólo registro para luego ser eliminado o a ser modificado (Ojo: El que el usuario seleccione)
        public function cargarProducto($id)
        {
            $row = null;
            $modelo= new Conexion();
            $conexion=$modelo->getConexion();
            $sql = "select * from productos where id = :id";
            $preparar= $conexion->prepare($sql);
            $preparar->bindParam(":id",  $id);  
            $preparar->execute();
            while ($resultado = $preparar->fetch())
            {
                $row[]= $resultado;
            }
            return $row;
        }
        //Este metodo ejecuta la modificación de un producto seleccionado de la lista.
        public function modificarProducto($campo,$valor,$id)
        {
            
            //Aquí instancio a $modelo considerandolo de la clase Conexion, la cual se encuentra en el modelo (class.conexion.php)
            //En este punto $modelo es un objeto de tipo Conexion
            $modelo = new Conexion();
            //Aquí ejecuto el metodo getConexion que se encuentra en la Clase Conexion
            $conexion = $modelo->getConexion();
            // $conexion->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
            $sql = "update productos set $campo = :valor where id = :id";
            $preparar = $conexion->prepare($sql);
            
            $preparar->bindParam(":valor",  $valor);
            
            $preparar->bindParam(":id", $id);
            
            if(!$preparar)
            {
                return "Error al modificar el registro";
            }else
            {
                $preparar->execute();
                return "Registro modificado de manera exitosa..!!!";
            }

        }



    }



?>