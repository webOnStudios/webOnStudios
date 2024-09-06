<?php
require_once '/var/www/modelo/Usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar la acción que se va a realizar
    $accion = $_POST['accion'];

    if ($accion === 'registrar') {
        // Crear una nueva instancia del modelo Usuario
        $usuario = new Usuario();

        // Establecer las propiedades del usuario
        $usuario->setCedulaUsuario($_POST['cedulaUsuario']);
        $usuario->setNicknameUsuario($_POST['nicknameUsuario']);
        $usuario->setEmailUsuario($_POST['emailUsuario']);
        $usuario->setNombreUsuario($_POST['nombreUsuario']);
        $usuario->setApellidoUsuario($_POST['apellidoUsuario']);
        $usuario->setFechaNacUsuario($_POST['fechaNacUsuario']);
        $usuario->setContraseñaUsuario($_POST['contraseñaUsuario']);

        // Intentar registrar al usuario
        if ($usuario->create()) {
            echo json_encode(["mensaje" => "Usuario registrado con éxito"]);
        } else {
            echo json_encode(["mensaje" => "Error al registrar el usuario"]);
        }
    } elseif ($accion === 'listar') {
        $usuario = new Usuario();
        $result = $usuario->readAll();

        $usuarios = array();
        while ($fila = $result->fetch_assoc()) {
            $usuarios[] = $fila;
        }

        echo json_encode($usuarios);
    } else {
        echo json_encode(["mensaje" => "Acción no válida"]);
    }
} else {
    echo json_encode(["mensaje" => "Método no permitido"]);
}
?>