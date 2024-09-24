<?php

require_once 'config/database.php';
class Admin {
    private $idAdmin;
    private $nombre;
    private $email;
    private $contraseña;
    private $permisoEditarBorrar;

    // Constructor
    public function __construct($nombre, $email, $contraseña, $permisoEditarBorrar = null) {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->contraseña = password_hash($contraseña, PASSWORD_BCRYPT); // Hash de contraseña
        $this->permisoEditarBorrar = $permisoEditarBorrar;
    }

    // Getters y Setters
    public function getIdAdmin() {
        return $this->idAdmin;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getContraseña() {
        return $this->contraseña;
    }

    public function setContraseña($contraseña) {
        $this->contraseña = password_hash($contraseña, PASSWORD_BCRYPT);
    }

    public function getPermisoEditarBorrar() {
        return $this->permisoEditarBorrar;
    }

    public function setPermisoEditarBorrar($permiso) {
        $this->permisoEditarBorrar = $permiso;
    }

    // Función para crear un nuevo admin
    public function crearAdmin($conexion) {
        $stmt = $conexion->prepare("INSERT INTO admins (Nombre, Email, Contraseña, permisoEditarBorrar) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $this->nombre, $this->email, $this->contraseña, $this->permisoEditarBorrar);
    
        if ($stmt->execute()) {
            return "Admin registrado exitosamente."; // Agregar este mensaje
        } else {
            return "Error: " . $stmt->error; // Mostrar el error en caso de fallo
        }
    }
    
}
?>