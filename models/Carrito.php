
<?php
require_once dirname(__DIR__) . '/config/database.php';

class Carrito {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection(); // Asegúrate de tener la conexión
    }

    public function agregar($idUsuario, $idProducto) {
        $query = "INSERT INTO carrito (idUsuario, idProducto, Estado) VALUES (:idUsuario, :idProducto, 'activo')";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':idUsuario', $idUsuario);
        $stmt->bindParam(':idProducto', $idProducto);
        return $stmt->execute(); // Retorna true si se inserta correctamente
    }
}


?>