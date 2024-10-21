<?php
// Incluir el modelo de Admin
require_once 'models/Admin.php';

class AdminController {

    // Método para crear un nuevo admin
    public function crearAdmin($data) {
        global $conexion; // Usar la conexión global

        // Recoger los datos del formulario
        $nombre = $data['nombre'];
        $email = $data['email'];
        $contraseña = $data['contraseña'];

        // Crear una instancia del modelo Admin
        $admin = new Admin($nombre, $email, $contraseña);

        // Llamar al método para crear un nuevo admin, pasando la conexión $conexion
        if ($admin->crearAdmin($conexion)) {
            return "Admin registrado exitosamente.";
        } else {
            return "Error al registrar el admin.";
        }

        
    }
    
}
