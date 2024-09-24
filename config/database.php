<?php
// Cambia mysql por mysqli
$host = "localhost";
$user = "root";
$password = "";
$database = "webontiendas";

// Conexión usando mysqli
$conexion = new mysqli($host, $user, $password, $database);

// Verifica si la conexión fue exitosa
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Hacer la conexión global
global $conexion;
?>
