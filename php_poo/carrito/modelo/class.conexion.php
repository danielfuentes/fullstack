<?php
    class Conexion
    {
        //Metodo de la clase Conexion que ejecuta la conexion a la base de datos bajo PDO, Recuerden que esto es una forma estandar
        public function getConexion()
        {
            //Ojo: Aquí deben colocar su usuario y contraseña para conectar a su base de datos
            $user = "root";
            $pass = "root";
            $conex = "mysql:host=localhost;dbname=carrito;charset=utf8mb4;port=3306;";
            $conexion = new PDO($conex,$user,$pass);
            return $conexion;
        }
    }

?>