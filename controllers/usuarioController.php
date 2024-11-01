<?php
require_once 'models/usuario.php';
require_once 'database.php';  // Conexión a la base de datos

class UsuarioController {
    public function register() {
        
        // Obtener los datos enviados desde el formulario
        $cedula = $_POST['cedulaUsuario'];
        $nickname = $_POST['nicknameUsuario'];
        $email = $_POST['emailUsuario'];
        $nombre = $_POST['nombreUsuario'];
        $apellido = $_POST['apellidoUsuario'];
        $contraseña = password_hash($_POST['contraseñaUsuario'], PASSWORD_BCRYPT);  // Encriptar la contraseña
        $fechaNac = $_POST['fechaNacUsuario'];

        // Crear una instancia del modelo Usuario
        $usuario = new Usuario($cedula, $nickname, $email, $nombre, $apellido, $contraseña, $fechaNac);

        // Registrar el usuario en la base de datos
        $resultado = $usuario->registrarUsuario($conexion);

        // Enviar la respuesta como JSON
        echo json_encode($resultado);
    }
}
?>
