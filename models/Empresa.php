
<?php

require_once dirname(__DIR__) . '/config/database.php';

class Empresa {
    private $ci;
    private $nombre;
    private $email;
    private $contrasena;
    private $direccion; 
    private $logoPath;


    public function setCI($ci) {
        $this->ci = $ci;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setContraseña($contrasena) {
        $this->contrasena = $contrasena;
    }


    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }
    public function setLogo($logoPath) {
        $this->logo = $logoPath;
    }

    public function registrar() {
        $database = new Database();
        $db = $database->getConnection();
    
        $hashedPassword = password_hash($this->contrasena, PASSWORD_DEFAULT);
        
        $query = "INSERT INTO empresa (Root_CI, Nombre, Email, Contraseña, Direccion, Logo) 
                  VALUES (:ci, :nombre, :email, :contrasena, :direccion, :logo)";
        $stmt = $db->prepare($query);
    
        $stmt->bindParam(':ci', $this->ci);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':contrasena', $hashedPassword);
        $stmt->bindParam(':direccion', $this->direccion);
        $stmt->bindParam(':logo', $this->logo);
    
        return $stmt->execute();
    }
    
    

    
    public function autenticar($email, $contrasena) {
        $database = new Database();
        $db = $database->getConnection();
    
        $query = "SELECT Nombre, Contraseña FROM empresa WHERE Email = :email";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($contrasena, $row['Contraseña'])) {
                return ['Nombre' => $row['Nombre']];
            }
        }
        return false;
    }


    public function obtenerDatos($email) {
        $database = new Database();
        $db = $database->getConnection();
    
        $query = "SELECT Root_CI, Nombre, Email, Direccion, Logo FROM empresa WHERE Email = :email";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return false; 
    }

    public function obtenerTodasLasEmpresas() {
        $stmt = $this->db->prepare("SELECT idEmpresa, emailEmpresa, cedulaEmpresa, contraseñaEmpresa, direccionEmpresa, logo FROM empresa");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}

?>