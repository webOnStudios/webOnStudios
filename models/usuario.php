<?php

require_once 'config/database.php';
class Usuario {
    private $cedulaUsuario;
    private $nicknameUsuario;
    private $emailUsuario;
    private $nombreUsuario;
    private $apellidoUsuario;
    private $contraseñaUsuario;
    private $FechaNacUsuario;

    // Constructor
    public function __construct($cedulaUsuario, $nicknameUsuario, $emailUsuario, $nombreUsuario, $apellidoUsuario, $contraseñaUsuario, $FechaNacUsuario) {
        $this->cedulaUsuario = $cedulaUsuario;
        $this->nicknameUsuario = $nicknameUsuario;
        $this->emailUsuario = $emailUsuario;
        $this->nombreUsuario = $nombreUsuario;
        $this->apellidoUsuario = $apellidoUsuario;
        $this->contraseñaUsuario = password_hash($contraseñaUsuario, PASSWORD_BCRYPT); // Hash de contraseña
        $this->FechaNacUsuario = $FechaNacUsuario;
    }

    // Getters
    public function getCedulaUsuario() {
        return $this->cedulaUsuario;
    }

    public function getNicknameUsuario() {
        return $this->nicknameUsuario;
    }

    public function getEmailUsuario() {
        return $this->emailUsuario;
    }

    public function getNombreUsuario() {
        return $this->nombreUsuario;
    }

    public function getApellidoUsuario() {
        return $this->apellidoUsuario;
    }

    public function getContraseñaUsuario() {
        return $this->contraseñaUsuario;
    }

    public function getFechaNacUsuario() {
        return $this->FechaNacUsuario;
    }

    // Setters
    public function setCedulaUsuario($cedulaUsuario) {
        $this->cedulaUsuario = $cedulaUsuario;
    }

    public function setNicknameUsuario($nicknameUsuario) {
        $this->nicknameUsuario = $nicknameUsuario;
    }

    public function setEmailUsuario($emailUsuario) {
        $this->emailUsuario = $emailUsuario;
    }

    public function setNombreUsuario($nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario;
    }

    public function setApellidoUsuario($apellidoUsuario) {
        $this->apellidoUsuario = $apellidoUsuario;
    }

    public function setContraseñaUsuario($contraseñaUsuario) {
        $this->contraseñaUsuario = password_hash($contraseñaUsuario, PASSWORD_BCRYPT); // Hash de contraseña
    }

    public function setFechaNacUsuario($FechaNacUsuario) {
        $this->FechaNacUsuario = $FechaNacUsuario;
    }

    public function crearUsuario($conexion) {
        $stmt = $conexion->prepare("INSERT INTO usuario (cedulaUsuario, nicknameUsuario, emailUsuario, nombreUsuario, apellidoUsuario, contraseñaUsuario, FechaNacUsuario) VALUES (?, ?, ?, ?, ?, ?, ?)");
        
        // El campo `cedulaUsuario` es de tipo `int`, así que debemos utilizar 'i' en lugar de 's'
        $stmt->bind_param("issssss", $this->cedulaUsuario, $this->nicknameUsuario, $this->emailUsuario, $this->nombreUsuario, $this->apellidoUsuario, $this->contraseñaUsuario, $this->FechaNacUsuario);
    
        if ($stmt->execute()) {
            return "Usuario registrado exitosamente.";
        } else {
            return "Error: " . $stmt->error;
        }
    }
    
}
?>