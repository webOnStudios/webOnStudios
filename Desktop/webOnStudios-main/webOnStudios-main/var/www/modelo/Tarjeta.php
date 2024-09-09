
<?php
// Incluimos el archivo de configuración de la base de datos.
require '/var/www/config/Database.php';

class Tarjeta {
    // Conexión a la base de datos y nombre de la tabla.
    private $conn;
    private $table_name = "tarjeta";
    
    private $NroTarjeta;
    private $fechaVencimiento;
    private $CVV;
    private $tipoTarjeta;
    private $nombrePropietario;
    private $cedulaUsuario;
    public function __construct() {
        $database = new Database(); // Creamos una instancia de la clase Database.
        $this->conn = $database->getConnection(); // Obtenemos la conexión a la base de datos.
    }

    // Getters
    public function getNroTarjeta() {
        return $this->NroTarjeta;
    }

    public function getFechaVencimiento() {
        return $this->fechaVencimiento;
    }

    public function getCVV() {
        return $this->CVV;
    }

    public function getTipoTarjeta() {
        return $this->tipoTarjeta;
    }

    public function getNombrePropietario() {
        return $this->nombrePropietario;
    }

    public function getCedulaUsuario() {
        return $this->cedulaUsuario;
    }

    // Setters
    public function setNroTarjeta($NroTarjeta) {
        $this->NroTarjeta = $NroTarjeta;
    }

    public function setFechaVencimiento($fechaVencimiento) {
        $this->fechaVencimiento = $fechaVencimiento;
    }

    public function setCVV($CVV) {
        $this->CVV = $CVV;
    }

    public function setTipoTarjeta($tipoTarjeta) {
        $this->tipoTarjeta = $tipoTarjeta;
    }

    public function setNombrePropietario($nombrePropietario) {
        $this->nombrePropietario = $nombrePropietario;
    }

    public function setCedulaUsuario($cedulaUsuario) {
        $this->cedulaUsuario = $cedulaUsuario;
    }

    // Agregar una nueva tarjeta
    public function agregarTarjeta($NroTarjeta, $fechaVencimiento, $CVV, $tipoTarjeta, $nombrePropietario, $cedulaUsuario) {
        $this->setNroTarjeta($NroTarjeta);
        $this->setFechaVencimiento($fechaVencimiento);
        $this->setCVV($CVV);
        $this->setTipoTarjeta($tipoTarjeta);
        $this->setNombrePropietario($nombrePropietario);
        $this->setCedulaUsuario($cedulaUsuario);

        $sql = "INSERT INTO Tarjeta (NroTarjeta, fechaVencimiento, CVV, tipoTarjeta, nombrePropietario, cedulaUsuario) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sssssi", $this->NroTarjeta, $this->fechaVencimiento, $this->CVV, $this->tipoTarjeta, $this->nombrePropietario, $this->cedulaUsuario);
        return $stmt->execute();
    }
    // Ver los detalles de una tarjeta específica
    public function verTarjeta($NroTarjeta) {
        $sql = "SELECT * FROM Tarjeta WHERE NroTarjeta = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $NroTarjeta);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function eliminarTarjeta($NroTarjeta) {
        $sql = "DELETE FROM Tarjeta WHERE NroTarjeta = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $NroTarjeta);
        return $stmt->execute();
    }

}
?>