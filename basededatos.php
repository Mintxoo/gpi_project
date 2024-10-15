<?php
    function conexion() {
        // Datos de conexión
        $servidor = "localhost";
        $user = "root";
        $password = "";
        
        // Conexión sin base de datos para crearla si no existe
        $con = new mysqli($servidor, $user, $password);
        
        // Verificar la conexión inicial
        if ($con->connect_error) {
            die("Conexión fallida: " . $con->connect_error);
        }
        
        // Crear la base de datos si no existe
        $sql = "CREATE DATABASE IF NOT EXISTS proyecto_GPI";
        if ($con->query($sql) === TRUE) {
            echo "Base de datos 'proyecto_GPI' creada exitosamente<br>";
        } else {
            echo "Error al crear la base de datos: " . $con->error;
        }

        // Conectar a la base de datos recién creada
        $con->select_db("proyecto_GPI");

        // Verificar la conexión a la base de datos
        if ($con->connect_error) {
            die("Conexión fallida a la base de datos: " . $con->connect_error);
        }
        
        return $con;
    }
?>
