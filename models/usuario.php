<?php
class Usuario {
    private $cedula;
    private $nickname;
    private $email;
    private $nombre;
    private $apellido;
    private $contraseña;
    private $fechaNac;

    public function __construct($cedula, $nickname, $email, $nombre, $apellido, $contraseña, $fechaNac) {
        $this->cedula = $cedula;
        $this->nickname = $nickname;
        $this->email = $email;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->contraseña = $contraseña;
        $this->fechaNac = $fechaNac;
    }

    public function registrarUsuario($conexion) {
        $query = "INSERT INTO usuarios (cedulaUsuario, nicknameUsuario, emailUsuario, nombreUsuario, apellidoUsuario, contraseñaUsuario, FechaNacUsuario)
                  VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("issssss", $this->cedula, $this->nickname, $this->email, $this->nombre, $this->apellido, $this->contraseña, $this->fechaNac);
        
        if ($stmt->execute()) {
            return ["success" => true, "message" => "Usuario registrado con éxito"];
        } else {
            return ["success" => false, "message" => "Error al registrar usuario: " . $stmt->error];
        }
    }
}
?>
