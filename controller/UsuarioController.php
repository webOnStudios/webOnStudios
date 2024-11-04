<?php
require_once dirname(__DIR__) . '/models/Usuario.php';

class UsuarioController {

    private $usuario;


    public function __construct() { // Asegúrate de que el constructor reciba $db
        $this->usuario = new Usuario; // Pasa $db al modelo
    }

    public function registrar() {
        header('Content-Type: application/json');
    
        try {
            if (!isset($_POST['ci'], $_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['contrasena'])) {
                echo json_encode(['status' => 'error', 'message' => 'Faltan datos en el formulario']);
                return;
            }
    
            $usuario = new Usuario();
            $usuario->setCI($_POST['ci']);
            $usuario->setNombre($_POST['nombre']);
            $usuario->setApellido($_POST['apellido']);
            $usuario->setEmail($_POST['email']);
            $usuario->setContraseña($_POST['contrasena']);
    
            $idUsuario = $usuario->registrar(); // Guardamos el ID del usuario
    
            if ($idUsuario) {
                echo json_encode(['status' => 'success', 'message' => 'Registro exitoso', 'id' => $idUsuario]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Error al registrar usuario']);
            }
        } catch (PDOException $e) {
            if ($e->getCode() === '23000') { 
                echo json_encode(['status' => 'error', 'message' => 'El correo electrónico o la cédula ya han sido registrados']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Mensaje: ' . $e->getMessage()]);
            }
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
    
    public function login() {
        header('Content-Type: application/json');
    
        if (!isset($_POST['email'], $_POST['contrasena'])) {
            echo json_encode(['status' => 'error', 'message' => 'Faltan datos']);
            return;
        }
    
        $email = $_POST['email'];
        $contrasena = $_POST['contrasena'];
    
        $usuario = new Usuario();
        $usuarioData = $usuario->autenticar($email, $contrasena);
    
        if ($usuarioData) {
            // Devolver el idUsuario además del nombre
            echo json_encode([
                'status' => 'success',
                'message' => 'Login exitoso',
                'idUsuario' => $usuarioData['idUsuario'],
                'nombre' => $usuarioData['Nombre']
            ]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Credenciales incorrectas']);
        }
    }
    
    
    
    
     
    public function obtenerDatos() {
        header('Content-Type: application/json');
    
        // Obtener el email del cuerpo de la solicitud
        $data = json_decode(file_get_contents("php://input"));
    
        if (!isset($data->email)) {
            echo json_encode(['status' => 'error', 'message' => 'Email no proporcionado.']);
            return;
        }
    
        $usuario = new Usuario();
        $usuarioData = $usuario->obtenerDatos($data->email); // Llamar al método que busca por email
    
        if ($usuarioData) {
            echo json_encode(['status' => 'success', 'data' => $usuarioData]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No se encontraron datos']);
        }
    }
    
    public function actualizarDatos() {
        $data = json_decode(file_get_contents('php://input'), true);
    
        // Verificar que los datos necesarios están presentes
        if (!isset($data['email'], $data['nombre'], $data['apellido'])) {
            echo json_encode(['status' => 'error', 'message' => 'Faltan datos']);
            return;
        }
    
        // Crear una instancia de Usuario
        $usuario = new Usuario();
    
        // Llamar al método de actualización
        $resultado = $usuario->actualizarDatos($data['email'], $data['nombre'], $data['apellido']);
        
        echo json_encode($resultado);
    }
    
    public function cambiarContrasena() {
        $data = json_decode(file_get_contents('php://input'), true);
    
        // Verificar que los datos necesarios están presentes
        if (!isset($data['email'], $data['currentPassword'], $data['newPassword'])) {
            echo json_encode(['status' => 'error', 'message' => 'Faltan datos']);
            return;
        }
    
        // Crear una instancia de Usuario
        $usuario = new Usuario();
    
        // Llamar al método para cambiar la contraseña
        $resultado = $usuario->cambiarContrasena($data['email'], $data['currentPassword'], $data['newPassword']);
        
        echo json_encode($resultado);
    }
    
    public function obtenerUsuarios() {
        header('Content-Type: application/json');

        $usuario = new Usuario();
        $usuarios = $usuario->obtenerTodosLosUsuarios();

        if ($usuarios) {
            echo json_encode(['success' => true, 'data' => $usuarios]);
        } else {
            echo json_encode(['success' => false, 'message' => 'No se encontraron usuarios']);
        }
    }

    
}
?>


