<?php
// Incluir el modelo de Admin
require_once 'models/usuario.php';

class usuarioController {

    // Método para crear un nuevo admin
    public function crearUsuario($data) {
        global $conexion; // Usar la conexión global

        // Recoger los datos del formulario
        $nombre = $data['nombre'];
        $email = $data['email'];
        $contraseña = $data['contraseña'];

        // Crear una instancia del modelo Admin
        $admin = new Admin($nombre, $email, $contraseña);

        // Llamar al método para crear un nuevo admin, pasando la conexión $conexion
        if ($admin->crearUsuario($conexion)) {
            return "Admin registrado exitosamente.";
        } else {
            return "Error al registrar el admin.";
        }
    }
}
