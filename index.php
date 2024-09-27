<?php
// Incluir el controlador de Admin
require_once 'controllers/adminsController.php';
require_once 'controllers/usuarioController.php';
require_once 'controllers/empresaController.php';
require_once 'controllers/productoController.php';
// Crear una instancia del controlador de Admin
$controllerAdmin = new AdminController();
$controllerUsuario = new usuarioController();
$controllerEmpresa = new empresaController();
$controllerProducto = new productoController();

$action = isset($_GET['action']) ? $_GET['action'] : null; // No se asigna valor por defecto

// Manejo de las acciones dependiendo de la solicitud
switch ($action) {
    case 'crearAdmin': // Si la acción es 'create'
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Si el método es POST
            $response = $controllerAdmin->crearAdmin($_POST); // Llamar a la función crear del controlador y pasar los datos de POST
            echo $response; // Mostrar la respuesta del controlador
        } else {
            // Incluir la vista para registrar un nuevo admin
            include 'views/backoffice/register.php';
        }
        break;
    case 'crearUsuario':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Si el método es POST
            $response = $controllerUsuario->crearUsuario($_POST); // Llamar a la función crear del controlador y pasar los datos de POST
            echo $response; // Mostrar la respuesta del controlador
        } else {
            // Incluir la vista para registrar un nuevo admin
            include 'views/tienda/register.php';
        }
        break;
    default: // Si no se especifica una acción válida
        echo "Acción no válida";
        break;
    case 'crearEmpresa':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Si el método es POST
            $response = $controllerEmpresa->crearEmpresa($_POST); // Llamar a la función crear del controlador y pasar los datos de POST
            echo $response; // Mostrar la respuesta del controlador
        } else {
            // Incluir la vista para registrar un nuevo admin
            include 'views/empresa/registrarse-empresa.php';
        }
        break;
    case 'crearProducto':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Si el método es POST
            $response = $controllerProducto->crearProducto($_POST); // Llamar a la función crear del controlador y pasar los datos de POST
            echo $response; // Mostrar la respuesta del controlador
        } else {
            // Incluir la vista para registrar un nuevo admin
            include 'views/empresa/agregar-producto.php';
        }
        break;
    
}
?>