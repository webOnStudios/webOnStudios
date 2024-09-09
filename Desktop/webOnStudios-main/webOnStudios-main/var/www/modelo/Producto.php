<?php
// Incluimos el archivo de configuración de la base de datos.
require '/var/www/config/Database.php';

class Producto {
    // Conexión a la base de datos y nombre de la tabla.
    private $conn;
    private $table_name = "producto";

// Propiedades del producto
    private $idProducto;
    private $nombreProducto;
    private $descripcionProducto;
    private $precioProducto;
    private $stockProducto;
    private $categoria;
    private $fotosProducto;

    public function __construct() {
        $database = new Database(); // Creamos una instancia de la clase Database.
        $this->conn = $database->getConnection(); // Obtenemos la conexión a la base de datos.
    }
    // Getters y Setters
    public function getIdProducto() {
        return $this->idProducto;
    }

    public function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }

    public function getNombreProducto() {
        return $this->nombreProducto;
    }

    public function setNombreProducto($nombreProducto) {
        $this->nombreProducto = $nombreProducto;
    }

    public function getDescripcionProducto() {
        return $this->descripcionProducto;
    }

    public function setDescripcionProducto($descripcionProducto) {
        $this->descripcionProducto = $descripcionProducto;
    }

    public function getPrecioProducto() {
        return $this->precioProducto;
    }

    public function setPrecioProducto($precioProducto) {
        $this->precioProducto = $precioProducto;
    }

    public function getStockProducto() {
        return $this->stockProducto;
    }

    public function setStockProducto($stockProducto) {
        $this->stockProducto = $stockProducto;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function getFotosProducto() {
        return $this->fotosProducto;
    }

    public function setFotosProducto($fotosProducto) {
        $this->fotosProducto = $fotosProducto;
    }

    // Funciones de base de datos
    public function agregarProducto() {
        $sql = "INSERT INTO Producto (nombreProducto, descripcionProducto, precioProducto, stockProducto, categoria, fotosProducto) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('sssiss', $this->nombreProducto, $this->descripcionProducto, $this->precioProducto, $this->stockProducto, $this->categoria, $this->fotosProducto);
        return $stmt->execute();
    }

    public function verProducto($idProducto) {
        $sql = "SELECT * FROM Producto WHERE idProducto = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $idProducto);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function editarProducto() {
        $sql = "UPDATE Producto SET nombreProducto = ?, descripcionProducto = ?, precioProducto = ?, stockProducto = ?, categoria = ?, fotosProducto = ? 
                WHERE idProducto = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('sssissi', $this->nombreProducto, $this->descripcionProducto, $this->precioProducto, $this->stockProducto, $this->categoria, $this->fotosProducto, $this->idProducto);
        return $stmt->execute();
    }

    public function eliminarProducto() {
        $sql = "DELETE FROM Producto WHERE idProducto = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $this->idProducto);
        return $stmt->execute();
    }
    
    public function buscarProducto($nombreProducto) {
        $sql = "SELECT p.idProducto, p.nombreProducto, p.descripcionProducto, p.precioProducto, 
                       p.stockProducto, p.categoria, e.nombreEmpresa, e.contactoEmpresa, 
                       e.telefonoEmpresa, e.direccionEmpresa
                FROM Producto p
                JOIN Venden v ON p.idProducto = v.idProducto
                JOIN Empresa e ON v.idEmpresa = e.idEmpresa
                WHERE p.nombreProducto LIKE ?";
        
        $stmt = $this->db->prepare($sql);
        $nombreProducto = "%$nombreProducto%";
        $stmt->bind_param('s', $nombreProducto);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
?>