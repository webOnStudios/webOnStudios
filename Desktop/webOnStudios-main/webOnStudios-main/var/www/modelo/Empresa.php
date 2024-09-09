<?php
// Incluimos el archivo de configuración de la base de datos.
require '/var/www/config/Database.php';

class Usuario {
    // Conexión a la base de datos y nombre de la tabla.
    private $conn;
    private $table_name = "empresa";

    // Constructor para inicializar la conexión a la base de datos.
    public function __construct() {
        $database = new Database(); // Creamos una instancia de la clase Database.
        $this->conn = $database->getConnection(); // Obtenemos la conexión a la base de datos.
    }

    private $idEmpresa;
    private $cedulaEmpresa;
    private $nombreEmpresa;
    private $contactoEmpresa;
    private $telefonoEmpresa;
    private $direccionEmpresa;
    private $contraseñaEmpresa;

    public function __construct($conexion) {
        $this->db = $conexion;
    }

    // Getters
    public function getIdEmpresa() {
        return $this->idEmpresa;
    }

    public function getCedulaEmpresa() {
        return $this->cedulaEmpresa;
    }

    public function getNombreEmpresa() {
        return $this->nombreEmpresa;
    }

    public function getContactoEmpresa() {
        return $this->contactoEmpresa;
    }

    public function getTelefonoEmpresa() {
        return $this->telefonoEmpresa;
    }

    public function getDireccionEmpresa() {
        return $this->direccionEmpresa;
    }

    public function getContraseñaEmpresa() {
        return $this->contraseñaEmpresa;
    }

    // Setters
    public function setIdEmpresa($idEmpresa) {
        $this->idEmpresa = $idEmpresa;
    }

    public function setCedulaEmpresa($cedulaEmpresa) {
        $this->cedulaEmpresa = $cedulaEmpresa;
    }

    public function setNombreEmpresa($nombreEmpresa) {
        $this->nombreEmpresa = $nombreEmpresa;
    }

    public function setContactoEmpresa($contactoEmpresa) {
        $this->contactoEmpresa = $contactoEmpresa;
    }

    public function setTelefonoEmpresa($telefonoEmpresa) {
        $this->telefonoEmpresa = $telefonoEmpresa;
    }

    public function setDireccionEmpresa($direccionEmpresa) {
        $this->direccionEmpresa = $direccionEmpresa;
    }

    public function setContraseñaEmpresa($contraseñaEmpresa) {
        // Almacenar la contraseña hasheada
        $this->contraseñaEmpresa = password_hash($contraseñaEmpresa, PASSWORD_BCRYPT);
    }

    // Agregar una nueva empresa
    public function agregarEmpresa($cedulaEmpresa, $nombreEmpresa, $contactoEmpresa, $telefonoEmpresa, $direccionEmpresa, $contraseñaEmpresa) {
        $this->setCedulaEmpresa($cedulaEmpresa);
        $this->setNombreEmpresa($nombreEmpresa);
        $this->setContactoEmpresa($contactoEmpresa);
        $this->setTelefonoEmpresa($telefonoEmpresa);
        $this->setDireccionEmpresa($direccionEmpresa);
        $this->setContraseñaEmpresa($contraseñaEmpresa);

        $sql = "INSERT INTO Empresa (cedulaEmpresa, nombreEmpresa, contactoEmpresa, telefonoEmpresa, direccionEmpresa, contraseñaEmpresa) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("isssss", $this->cedulaEmpresa, $this->nombreEmpresa, $this->contactoEmpresa, $this->telefonoEmpresa, $this->direccionEmpresa, $this->contraseñaEmpresa);
        return $stmt->execute();
    }

    // Editar una empresa existente
    public function editarEmpresa($idEmpresa, $cedulaEmpresa, $nombreEmpresa, $contactoEmpresa, $telefonoEmpresa, $direccionEmpresa, $contraseñaEmpresa) {
        $this->setIdEmpresa($idEmpresa);
        $this->setCedulaEmpresa($cedulaEmpresa);
        $this->setNombreEmpresa($nombreEmpresa);
        $this->setContactoEmpresa($contactoEmpresa);
        $this->setTelefonoEmpresa($telefonoEmpresa);
        $this->setDireccionEmpresa($direccionEmpresa);
        $this->setContraseñaEmpresa($contraseñaEmpresa);

        $sql = "UPDATE Empresa 
                SET cedulaEmpresa = ?, nombreEmpresa = ?, contactoEmpresa = ?, telefonoEmpresa = ?, direccionEmpresa = ?, contraseñaEmpresa = ? 
                WHERE idEmpresa = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("isssssi", $this->cedulaEmpresa, $this->nombreEmpresa, $this->contactoEmpresa, $this->telefonoEmpresa, $this->direccionEmpresa, $this->contraseñaEmpresa, $this->idEmpresa);
        return $stmt->execute();
    }

    // Ver los detalles de una empresa específica
    public function verEmpresa($idEmpresa) {
        $sql = "SELECT * FROM Empresa WHERE idEmpresa = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $idEmpresa);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Ver todas las empresas
    public function verTodasEmpresas() {
        $sql = "SELECT * FROM Empresa";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>