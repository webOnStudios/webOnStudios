<?php
// Incluir el controlador de Admin
require_once 'controllers/adminsController.php';

// Crear una instancia del controlador de Admin
$controller = new AdminController();

// Determinar la acción a realizar
$action = isset($_GET['action']) ? $_GET['action'] : 'crearAdmin'; // Por defecto, la acción es 'create'.

// Manejo de las acciones dependiendo de la solicitud
switch ($action) {
    case 'crearAdmin': // Si la acción es 'create'
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Si el método es POST
            $response = $controller->crearAdmin($_POST); // Llamar a la función crear del controlador y pasar los datos de POST
            echo $response; // Mostrar la respuesta del controlador
        } else {
            // Incluir la vista para registrar un nuevo admin
            include 'views/backoffice/register.php';
        }
        break;
    
    default: // Si no se especifica una acción válida
        echo "Acción no válida";
        break;
}
?>