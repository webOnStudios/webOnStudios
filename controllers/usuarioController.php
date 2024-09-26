<?php
// Incluir el modelo de Admin
require_once 'models/usuario.php';

class usuarioController {

    // Método para crear un nuevo admin
    public function crearUsuario($data) {
        global $conexion; // Usar la conexión global
    
        // Recoger los datos del formulario
        $cedulaUsuario = $data['cedulaUsuario'];
        $nicknameUsuario = $data['nicknameUsuario'];
        $emailUsuario = $data['emailUsuario'];
        $nombreUsuario = $data['nombreUsuario'];
        $apellidoUsuario = $data['apellidoUsuario'];
        $contraseñaUsuario = $data['contraseñaUsuario'];
        $FechaNacUsuario = $data['FechaNacUsuario'];
    
        // Crear una instancia del modelo Usuario
        $usuario = new Usuario($cedulaUsuario, $nicknameUsuario, $emailUsuario, $nombreUsuario, $apellidoUsuario, $contraseñaUsuario, $FechaNacUsuario);
    
        // Llamar al método para crear un nuevo usuario, pasando la conexión $conexion
        if ($usuario->crearUsuario($conexion)) {
            return "Usuario registrado exitosamente.";
        } else {
            return "Error al registrar el usuario.";
        }
    }
}
