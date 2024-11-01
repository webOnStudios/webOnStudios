<?php
require_once dirname(__DIR__) . '/models/Producto.php';

class ProductoController {

    public function agregarProducto() {
        $producto = new Producto();

        $nombre = $_POST['Nombre'];
        $descripcion = $_POST['Descripcion'];
        $precio = $_POST['Precio'];
        $cantidad = $_POST['Cantidad'];
        $categoria = $_POST['Categoria'];
        
        if (isset($_POST['emailEmpresa'])) {
            $emailEmpresa = $_POST['emailEmpresa'];
        } else {
            echo json_encode(['success' => false, 'message' => 'Email de empresa no proporcionado']);
            return;
        }
    
        $modeloProducto = new Producto();
        $idEmpresa = $modeloProducto->obtenerIdEmpresaPorEmail($emailEmpresa);
    
        if (!$idEmpresa) {
            echo json_encode(['success' => false, 'message' => 'No se encontró la empresa con ese email']);
            return;
        }
    
        $producto->setNombre($nombre);
        $producto->setDescripcion($descripcion);
        $producto->setPrecio($precio);
        $producto->setCantidad($cantidad);
        $producto->setCategoria($categoria);
        
        $idProducto = $producto->guardar(); 
    

        if ($idProducto) {
            $imagenes = $_FILES['imagenes'];
            for ($i = 0; $i < count($imagenes['name']); $i++) {
                $nombreArchivo = $imagenes['name'][$i];
                $rutaTemporal = $imagenes['tmp_name'][$i];
                $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
                $nombreImagen = "$idProducto" . ($i + 1) . ".$extension";
                $rutaDestino = "img/producto/$nombreImagen"; 
    
                if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
                    $producto->guardarFoto($idProducto, $nombreImagen);
                }
            }
    
            $asociacionExitosa = $modeloProducto->asociarProductoEmpresa($idEmpresa, $idProducto);
    
            if ($asociacionExitosa) {
                echo json_encode(['success' => true, 'message' => 'Producto agregado y asociado a la empresa']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Producto agregado, pero no se pudo asociar a la empresa']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al guardar el producto']);
        }
    }
    
    private function enviarRespuesta($response) {
        header('Content-Type: application/json');
        echo json_encode($response);
        exit(); 
    }


    public function obtenerProductosPorEmpresa() {
        $email = json_decode(file_get_contents("php://input"))->emailEmpresa;
        $producto = new Producto();
        
        $productos = $producto->obtenerProductosPorEmail($email);
        
        if ($productos) {
            echo json_encode(['success' => true, 'data' => $productos]);
        } else {
            echo json_encode(['success' => false, 'message' => 'No se encontraron productos']);
        }
    }
    
    public function buscarProductoPorNombre() {
        // Obtener el nombre del producto a buscar
        $nombre = json_decode(file_get_contents("php://input"))->nombre;
        $producto = new Producto();

        // Realiza la búsqueda en el modelo
        $resultados = $producto->buscarProductosPorNombre($nombre);

        // Verificar si se encontraron resultados
        if ($resultados) {
            // Devolver los resultados como JSON
            echo json_encode(['success' => true, 'data' => $resultados]);
        } else {
            // En caso de no encontrar productos
            echo json_encode(['success' => false, 'message' => 'No se encontraron productos']);
        }
    }

    public function buscarPorId() {
        $id = $_GET['id'];
        $producto = new Producto();
        $resultado = $producto->buscarPorId($id);

        if ($resultado) {
            echo json_encode(['success' => true, 'data' => $resultado]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Producto no encontrado']);
        }
    }


    public function obtenerProductos() {
        header('Content-Type: application/json');
        
        $producto = new Producto();
        $productos = $producto->obtenerTodosLosProductos();
    
        if ($productos) {
            echo json_encode(['success' => true, 'data' => $productos]);
        } else {
            echo json_encode(['success' => false, 'message' => 'No se encontraron productos']);
        }
    }
    

    
}
?>
