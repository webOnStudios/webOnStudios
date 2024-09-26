<?php

require_once 'config/database.php';

class Empresa {
    private $idEmpresa;
    private $cedulaEmpresa;
    private $nombreEmpresa;
    private $contactoEmpresa;
    private $telefonoEmpresa;
    private $contraseñaEmpresa;
    private $direccionEmpresa;

    // Constructor
    public function __construct($idEmpresa, $cedulaEmpresa, $nombreEmpresa, $contactoEmpresa, $telefonoEmpresa, $contraseñaEmpresa, $direccionEmpresa) {
        $this->idEmpresa = $idEmpresa;
        $this->cedulaEmpresa = $cedulaEmpresa;
        $this->nombreEmpresa = $nombreEmpresa;
        $this->contactoEmpresa = $contactoEmpresa;
        $this->telefonoEmpresa = $telefonoEmpresa;
        $this->contraseñaEmpresa = password_hash($contraseñaEmpresa, PASSWORD_BCRYPT); // Hash de contraseña
        $this->direccionEmpresa = $direccionEmpresa;
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

    public function getContraseñaEmpresa() {
        return $this->contraseñaEmpresa;
    }

    public function getDireccionEmpresa() {
        return $this->direccionEmpresa;
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

    public function setContraseñaEmpresa($contraseñaEmpresa) {
        $this->contraseñaEmpresa = password_hash($contraseñaEmpresa, PASSWORD_BCRYPT); // Hash de contraseña
    }

    public function setDireccionEmpresa($direccionEmpresa) {
        $this->direccionEmpresa = $direccionEmpresa;
    }

    public function crearEmpresa($conexion) {
        // Preparar la consulta SQL para insertar en la tabla empresa
        $stmt = $conexion->prepare("INSERT INTO empresa (cedulaEmpresa, nombreEmpresa, contactoEmpresa, telefonoEmpresa, direccionEmpresa, contraseñaEmpresa) VALUES (?, ?, ?, ?, ?, ?)");
        
        // Bind de parámetros. `cedulaEmpresa` es `bigint`, por lo tanto utilizamos 'i' para números enteros y 's' para cadenas de texto.
        $stmt->bind_param("ississ", $this->cedulaEmpresa, $this->nombreEmpresa, $this->contactoEmpresa, $this->telefonoEmpresa, $this->direccionEmpresa, $this->contraseñaEmpresa);
        
        // Ejecutar la consulta
        if ($stmt->execute()) {
            return "Empresa registrada exitosamente.";
        } else {
            return "Error: " . $stmt->error;
        }
    }
    
    
}
?>