<?php
// Incluimos el archivo de configuración de la base de datos.
require '/var/www/config/Database.php';

class Usuario {
    // Conexión a la base de datos y nombre de la tabla.
    private $conn;
    private $table_name = "usuario";

    // Atributos privados.
    private $cedulaUsuario;
    private $nicknameUsuario;
    private $emailUsuario;
    private $nombreUsuario;
    private $apellidoUsuario;
    private $telefonoUsuario;
    private $contraseñaUsuario;

    // Constructor para inicializar la conexión a la base de datos.
    public function __construct() {
        $database = new Database(); // Creamos una instancia de la clase Database.
        $this->conn = $database->getConnection(); // Obtenemos la conexión a la base de datos.
    }

    // Getters y Setters para los atributos.
    public function getCedulaUsuario() {
        return $this->cedulaUsuario; 
    }

    public function setCedulaUsuario($cedulaUsuario) {
        $this->cedulaUsuario = $cedulaUsuario; 
    }

    public function getNicknameUsuario() {
        return $this->nicknameUsuario; 
    }

    public function setNicknameUsuario($nicknameUsuario) {
        $this->nicknameUsuario = $nicknameUsuario; 
    }

    public function getNombreUsuario() {
        return $this->nombreUsuario; 
    }

    public function setNombreUsuario($nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario; 
    }

    public function getEmailUsuario() {
        return $this->emailUsuario; 
    }

    public function setEmailUsuario($emailUsuario) {
        $this->emailUsuario = $emailUsuario; 
    }

    public function getContraseñaUsuario() {
        return $this->contraseñaUsuario; 
    }

    public function setContraseñaUsuario($contraseñaUsuario) {
        $this->contraseñaUsuario = $contraseñaUsuario; 
    }
    public function getApellidoUsuario() {
        return $this->apellidoUsuario; 
    }

    public function setApellidoUsuario($apellidoUsuario) {
        $this->apellidoUsuario = $apellidoUsuario; 
    }
    public function getTelefonoUsuario() {
        return $this->telefonoUsuario; 
    }

    public function setTelefonoUsuario($telefonoUsuario) {
        $this->telefonoUsuario = $telefonoUsuario; 
    }

    public function getCarrito() {
        // Aquí podrías cargar el carrito asociado a este usuario
        return Carrito::findByCedulaUsuario($this->cedulaUsuario);
    }


    // Método para crear un nuevo usuario.
    public function create() {
        // Creamos una consulta SQL para insertar un nuevo registro en la tabla de usuarios.
        $query = "INSERT INTO " . $this->table_name . " SET email=?, nombreUsuario=?, celular=?, contraseña=?";
        
        // Preparamos la consulta SQL.
        $stmt = $this->conn->prepare($query);
        
        // Aplicamos un hash a la contraseña para almacenarla de manera segura.
        $hashedPassword = password_hash($this->contraseña, PASSWORD_DEFAULT);
        
        // Unimos los valores a los parámetros de la consulta SQL.
        $stmt->bind_param("ssss", $this->email, $this->nombreUsuario, $this->celular, $hashedPassword);
        
        // Ejecutamos la consulta y verificamos si se ejecutó correctamente.
        if ($stmt->execute()) {
            return true; // Retornamos true si el usuario fue creado exitosamente.
        } else {
            // Manejo de errores: mostramos el error y retornamos false.
            echo "Error: " . $stmt->error;
            return false;
        }
    }
    
    // Método para leer todos los usuarios.
    public function readAll() {
        // Consulta SQL para seleccionar todos los registros de la tabla de usuarios.
        $query = "SELECT * FROM " . $this->table_name;
        
        // Ejecutamos la consulta y almacenamos el resultado.
        $result = $this->conn->query($query);
        return $result; // Retornamos el resultado de la consulta.
    }

    // Método para leer un usuario específico por su ID.
    public function readOne() {
        // Consulta SQL para seleccionar un registro específico por ID.
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        
        // Preparamos la consulta SQL.
        $stmt = $this->conn->prepare($query);
        
        // Unimos el ID al parámetro de la consulta SQL.
        $stmt->bind_param("i", $this->id);
        
        // Ejecutamos la consulta.
        $stmt->execute();
        
        // Obtenemos el resultado y retornamos el registro como un arreglo asociativo.
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Método para actualizar un usuario existente.
    public function update() {
        // Consulta SQL para actualizar un registro en la tabla de usuarios.
        $query = "UPDATE " . $this->table_name . " SET email=?, nombreUsuario=?, celular=?, contraseña=? WHERE id=?";
        
        // Preparamos la consulta SQL.
        $stmt = $this->conn->prepare($query);
        
        // Aplicamos un hash a la nueva contraseña.
        $hashedPassword = password_hash($this->contraseña, PASSWORD_DEFAULT);
        
        // Unimos los valores a los parámetros de la consulta SQL.
        $stmt->bind_param("ssssi", $this->email, $this->nombreUsuario, $this->celular, $hashedPassword, $this->id);
        
        // Ejecutamos la consulta y retornamos el resultado (true si fue exitoso, false si no lo fue).
        return $stmt->execute();
    }

    // Método para eliminar un usuario por su ID.
    public function delete() {
        // Consulta SQL para eliminar un registro específico por ID.
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        
        // Preparamos la consulta SQL.
        $stmt = $this->conn->prepare($query);
        
        // Unimos el ID al parámetro de la consulta SQL.
        $stmt->bind_param("i", $this->id);
        
        // Ejecutamos la consulta y retornamos el resultado (true si fue exitoso, false si no lo fue).
        return $stmt->execute();
    }
}
?>
