<?php
// Incluimos el controlador de Usuario.
require_once 'controllers/UsuarioController.php';

// Creamos una instancia del controlador de Usuario.
$controller = new UsuarioController();

// Determinamos la acción a realizar (crear, listar, editar, eliminar).
$action = isset($_GET['action']) ? $_GET['action'] : 'list'; // Si se pasa un parámetro 'action', se asigna su valor; de lo contrario, se usa 'list' como predeterminado.
$id = isset($_GET['id']) ? $_GET['id'] : null; // Si se pasa un parámetro 'id', se asigna su valor; de lo contrario, se asigna null.

// Manejo de las acciones dependiendo de la solicitud.
switch ($action) {
    case 'create': // Si la acción es 'create'.
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Si la solicitud se realizó mediante POST.
            $response = $controller->create($_POST); // Se llama al método 'create' del controlador y se le pasan los datos enviados por POST.
            echo $response; // Se muestra la respuesta obtenida del controlador.
        } else {
            include 'views/crearUsuario.php'; // Si no es POST, se incluye la vista para crear un usuario.
        }
        break;
    case 'list': // Si la acción es 'list'.
        $usuarios = $controller->readAll(); // Se llama al método 'readAll' del controlador para obtener todos los usuarios.
        include 'views/listarUsuarios.php'; // Se incluye la vista que lista todos los usuarios.
        break;
    case 'edit': // Si la acción es 'edit'.
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Si la solicitud se realizó mediante POST.
            $response = $controller->update($_POST); // Se llama al método 'update' del controlador con los datos enviados por POST.
            echo $response; // Se muestra la respuesta obtenida del controlador.
        } else {
            $usuario = $controller->readOne($id); // Se llama al método 'readOne' del controlador para obtener los datos del usuario con el id dado.
            include 'views/editarUsuario.php'; // Se incluye la vista para editar un usuario.
        }
        break;
    case 'delete': // Si la acción es 'delete'.
        $response = $controller->delete($id); // Se llama al método 'delete' del controlador con el id dado.
        echo $response; // Se muestra la respuesta obtenida del controlador.
        break;
    default: // Si no se especifica ninguna acción o si la acción no coincide con las anteriores.
        $usuarios = $controller->readAll(); // Se llama al método 'readAll' del controlador para obtener todos los usuarios.
        include 'views/listarUsuarios.php'; // Se incluye la vista que lista todos los usuarios.
        break;
}
?>