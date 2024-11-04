<?php
require_once dirname(__DIR__) . '/config/database.php';

class Usuario {
    private $ci;
    private $nombre;
    private $apellido;
    private $email;
    private $contrasena;
    private $db;

    public function __construct() {
        // Aquí deberías obtener la conexión a la base de datos
        $database = new Database();
        $this->db = $database->getConnection();
    }
    // Setters
    public function setCI($ci) {
        $this->ci = $ci;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setContraseña($contrasena) {
        $this->contrasena = password_hash($contrasena, PASSWORD_DEFAULT); // Asegúrate de usar hashing
    }

    // Método para registrar el usuario en la base de datos
// Método para registrar el usuario en la base de datos
    public function registrar() {
        $query = "INSERT INTO usuarios (CI, Nombre, Apellido, Email, Contraseña) VALUES (:ci, :nombre, :apellido, :email, :contrasena)";
        $stmt = $this->db->prepare($query);

        // Bind parameters
        $stmt->bindParam(':ci', $this->ci);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':apellido', $this->apellido);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':contrasena', $this->contrasena);
        
        try {
            if ($stmt->execute()) {
                return true; // Retornar true si la inserción fue exitosa
            } else {
                return false; // Retornar false si hubo un problema
            }
        } catch (PDOException $e) {
            // Capturar el error de la consulta
            error_log("Error de la consulta: " . $e->getMessage()); // Escribe el error en el log
            return false;
        }
    }
    public function autenticar($email, $contrasena) {
        $database = new Database();
        $db = $database->getConnection();
    
        $query = "SELECT idUsuario, Nombre, Contraseña FROM usuarios WHERE Email = :email";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($contrasena, $row['Contraseña'])) {
                return ['idUsuario' => $row['idUsuario'], 'Nombre' => $row['Nombre']];
            }
        }
        return false;
    }
    
    

    public function obtenerDatos($email) {
        $database = new Database();
        $db = $database->getConnection();
    
        $query = "SELECT CI, Nombre, Apellido, Email FROM usuarios WHERE Email = :email";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return false; // No se encontraron datos
    }
    
    public function actualizarDatos($email, $nombre, $apellido) {
        $database = new Database();
        $db = $database->getConnection(); // Asegúrate de crear la conexión
    
        $stmt = $db->prepare("UPDATE usuarios SET Nombre = :nombre, Apellido = :apellido WHERE Email = :email");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':email', $email);
    
        if ($stmt->execute()) {
            return ['status' => 'success', 'message' => 'Datos actualizados correctamente.'];
        } else {
            return ['status' => 'error', 'message' => 'Error al actualizar los datos.'];
        }
    }
    

    public function cambiarContrasena($email, $contrasenaActual, $nuevaContrasena) {
        $database = new Database();
        $db = $database->getConnection(); // Asegúrate de crear la conexión
    
        // Verificar que la contraseña actual es correcta
        $stmt = $db->prepare("SELECT Contraseña FROM usuarios WHERE Email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($usuario && password_verify($contrasenaActual, $usuario['Contraseña'])) {
            // Actualizar la contraseña
            $stmt = $db->prepare("UPDATE usuarios SET Contraseña = :nuevaContrasena WHERE Email = :email");
            $stmt->bindParam(':nuevaContrasena', password_hash($nuevaContrasena, PASSWORD_BCRYPT));
            $stmt->bindParam(':email', $email);
    
            if ($stmt->execute()) {
                return ['status' => 'success', 'message' => 'Contraseña cambiada correctamente.'];
            } else {
                return ['status' => 'error', 'message' => 'Error al cambiar la contraseña.'];
            }
        } else {
            return ['status' => 'error', 'message' => 'La contraseña actual es incorrecta.'];
        }
    }
    

    public function obtenerTodosLosUsuarios() {
        $query = "SELECT * FROM usuarios";
        $stmt = $this->conn->prepare($query); // Asegúrate de que $this->conn no sea null

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    


    public function obtenerIdUsuarioPorEmail($email) {
        $query = "SELECT IdUsuario FROM usuarios WHERE Email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $fila = $result->fetch_assoc();
            return $fila['IdUsuario'];
        } else {
            return null;
        }
    }
}
?>
