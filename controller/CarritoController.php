<?php
require_once dirname(__DIR__) . '/models/Carrito.php';
class CarritoController {

    private $carrito;

    public function __construct() {
        $this->carrito = new Carrito(); // Inicializa el modelo Carrito
    }
    public function agregarAlCarrito() {
        $data = json_decode(file_get_contents("php://input"), true);
    
        // Verifica si los datos están definidos
        $idProducto = $data['idProducto'] ?? null;
        $email = $data['email'] ?? null;
        $cantidad = $data['cantidad'] ?? null;
    
        // Comprueba si los valores son nulos
        if (is_null($idProducto) || is_null($email) || is_null($cantidad)) {
            echo json_encode(['success' => false, 'message' => 'Faltan parámetros']);
            return;
        }
    
        // Llama al método del modelo para guardar en el carrito
        $carrito = new Carrito();
        $resultado = $carrito->guardarEnCarrito($idProducto, $email, $cantidad);
        
        echo json_encode(['success' => $resultado]);
    }


    public function verCarrito() {
        $email = $_GET['email'];
        $productos = $this->carrito->obtenerProductosPorEmail($email); 
        echo json_encode($productos); 
    }


    public function obtenerProductosConEmpresa() {
        // Obtener el email de la solicitud
        $email = json_decode(file_get_contents("php://input"))->email; // Asegúrate de que se envía como JSON

        // Obtener productos del carrito con información de la empresa
        $productos = $this->carrito->obtenerProductosConEmpresa($email);

        // Verificar si se obtuvieron productos
        if ($productos) {
            echo json_encode(['success' => true, 'data' => $productos]);
        } else {
            echo json_encode(['success' => false, 'message' => 'No se encontraron productos en el carrito']);
        }
    }

    public function actualizarCantidad() {
        // Obtener los datos enviados desde JavaScript
        $data = json_decode(file_get_contents("php://input"), true);
        $idProducto = $data['idProducto'];
        $email = $data['email'];
        $cambio = $data['cambio'];
    
        // Llamar al modelo para actualizar la cantidad
        $resultado = $this->carrito->actualizarCantidadProducto($idProducto, $email, $cambio);
    
        if ($resultado) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "message" => "Error al actualizar la cantidad."]);
        }
    }
    
    public function eliminarProducto() {
        // Obtener los datos enviados desde JavaScript
        $data = json_decode(file_get_contents("php://input"), true);
        $idProducto = $data['idProducto'];
        $email = $data['email'];
    
        // Llamar al modelo para eliminar el producto del carrito
        $resultado = $this->carrito->eliminarProductoDelCarrito($idProducto, $email);
    
        if ($resultado) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "message" => "Error al eliminar el producto."]);
        }
    }
}

?>