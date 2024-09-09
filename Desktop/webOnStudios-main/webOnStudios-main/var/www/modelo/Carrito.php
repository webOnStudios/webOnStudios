<?php
// Incluimos el archivo de configuración de la base de datos.
require '/var/www/config/Database.php';

class Usuario {
    // Conexión a la base de datos y nombre de la tabla.
    private $conn;
    private $table_name = "carrito";

    // Atributos privados.
    private $cedulaUsuario;
    private $idCarrito;
    private $estadoCarrito;

    // Constructor para inicializar la conexión a la base de datos.
    public function __construct() {
        $database = new Database(); // Creamos una instancia de la clase Database.
        $this->conn = $database->getConnection(); // Obtenemos la conexión a la base de datos.
    }

    // Getters y Setters para los atributos.
    
    public function getIdCarrito() {
        return $this->idCarrito;
    }
    
    public function setIdCarrito($idCarrito) {
        $this->idCarrito = $idCarrito;
    }
    
    public function getCedulaUsuario() {
        return $this->cedulaUsuario;
    }
    
    public function setCedulaUsuario($cedulaUsuario) {
        // Asignar la cédula del usuario, asegurando que no sea nula
        if (!$cedulaUsuario) {
            throw new Exception("El carrito debe estar asociado a un usuario.");
        }
        $this->cedulaUsuario = $cedulaUsuario;
    }
    
    public function getEstadoCarrito() {
        return $this->estadoCarrito;
    }
    
    public function setEstadoCarrito($estadoCarrito) {
       $this->estadoCarrito = $estadoCarrito;
    }
    public function agregarProductoAlCarrito($idProducto, $cantidad) {
        $sql = "INSERT INTO Contiene (idCarrito, cedulaUsuario, idProducto, cantProducto) VALUES (?, ?, ?, ?)
                ON DUPLICATE KEY UPDATE cantProducto = cantProducto + VALUES(cantProducto)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('iiid', $this->idCarrito, $this->cedulaUsuario, $idProducto, $cantidad);
        return $stmt->execute();
    }

    public function verCarrito() {
        $sql = "SELECT p.nombreProducto, c.cantProducto, p.precioProducto 
                FROM Contiene c 
                JOIN Producto p ON c.idProducto = p.idProducto 
                WHERE c.idCarrito = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $this->idCarrito);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
?>
