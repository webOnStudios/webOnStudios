
<?php
require_once dirname(__DIR__) . '/config/database.php';

class Carrito {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection(); 
    }

    public function guardarEnCarrito($idProducto, $emailUsuario, $cantidad) {

        $query = "INSERT INTO carrito (idProducto, Email, cantidad) VALUES (:idProducto, :emailUsuario, :cantidad)";
        $stmt = $this->db->prepare($query);
        

        $stmt->bindParam(':idProducto', $idProducto);
        $stmt->bindParam(':emailUsuario', $emailUsuario); 
        $stmt->bindParam(':cantidad', $cantidad);
        
        return $stmt->execute();
    }
    
    public function obtenerProductosConEmpresa($email) {
        $query = "SELECT p.idProducto, p.nombre, p.precio, c.cantidad, e.idEmpresa, e.idPaypal 
                  FROM carrito c 
                  JOIN producto p ON c.idProducto = p.idProducto 
                  JOIN vende v ON p.idProducto = v.idProducto 
                  JOIN empresa e ON v.idEmpresa = e.idEmpresa 
                  WHERE c.Email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function obtenerProductosPorEmail($email) {
        $query = "SELECT p.idProducto, p.nombre, p.precio, c.cantidad FROM carrito c JOIN producto p ON c.idProducto = p.idProducto WHERE c.Email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }
    

    public function actualizarCantidadProducto($idProducto, $email, $cambio) {
        // Obtener la cantidad actual del producto en el carrito
        $query = "SELECT cantidad FROM carrito WHERE idProducto = :idProducto AND Email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':idProducto', $idProducto);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($resultado) {
            $nuevaCantidad = $resultado['cantidad'] + $cambio;
    
            // Si la nueva cantidad es 0 o menos, eliminamos el producto del carrito
            if ($nuevaCantidad <= 0) {
                return $this->eliminarProductoDelCarrito($idProducto, $email);
            } else {
                // Actualizar la cantidad en el carrito
                $updateQuery = "UPDATE carrito SET cantidad = :nuevaCantidad WHERE idProducto = :idProducto AND Email = :email";
                $updateStmt = $this->db->prepare($updateQuery);
                $updateStmt->bindParam(':nuevaCantidad', $nuevaCantidad);
                $updateStmt->bindParam(':idProducto', $idProducto);
                $updateStmt->bindParam(':email', $email);
                return $updateStmt->execute();
            }
        }
    
        return false;
    }
    
    public function eliminarProductoDelCarrito($idProducto, $email) {
        // Eliminar el producto del carrito
        $query = "DELETE FROM carrito WHERE idProducto = :idProducto AND Email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':idProducto', $idProducto);
        $stmt->bindParam(':email', $email);
        return $stmt->execute();
    }
}


?>