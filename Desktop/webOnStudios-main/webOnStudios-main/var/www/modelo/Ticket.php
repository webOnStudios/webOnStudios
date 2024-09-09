<?php
require '/var/www/config/Database.php';
class Ticket {
    private $conn;
    private $table_name = "tarjeta";

    private $NroCompra;
    private $fechaHoraCompra;
    private $direccionEnvio;
    private $root;
    private $medioPago;
    private $EstadoTicket;

    public function __construct() {
        $database = new Database(); // Creamos una instancia de la clase Database.
        $this->conn = $database->getConnection(); // Obtenemos la conexión a la base de datos.
    }
    // Getters y Setters
    public function setNroCompra($NroCompra) {
        $this->NroCompra = $NroCompra;
    }

    public function setFechaHoraCompra($fechaHoraCompra) {
        $this->fechaHoraCompra = $fechaHoraCompra;
    }

    public function setDireccionEnvio($direccionEnvio) {
        $this->direccionEnvio = $direccionEnvio;
    }

    public function setRoot($root) {
        $this->root = $root;
    }

    public function setMedioPago($medioPago) {
        $this->medioPago = $medioPago;
    }

    public function setEstadoTicket($EstadoTicket) {
        $this->EstadoTicket = $EstadoTicket;
    }

    // Crear un nuevo ticket
    public function crearTicket() {
        $sql = "INSERT INTO ticket (NroCompra, fechaHoraCompra, direccionEnvio, root, medioPago, EstadoTicket) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ississ", $this->NroCompra, $this->fechaHoraCompra, $this->direccionEnvio, $this->root, $this->medioPago, $this->EstadoTicket);
        return $stmt->execute();
    }

    // Ver los detalles de un ticket específico
    public function verTicket($NroCompra) {
        $sql = "SELECT * FROM ticket WHERE NroCompra = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $NroCompra);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

}
?>