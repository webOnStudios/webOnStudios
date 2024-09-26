<?php
// Incluir el modelo de Admin
require_once 'models/empresas.php';

class empresaController {

    // Método para crear un nuevo admin
    public function crearEmpresa($data) {
        global $conexion; // Usar la conexión global
    
        // Recoger los datos del formulario
        $idEmpresa = $data['idEmpresa'];
        $cedulaEmpresa = $data['cedulaEmpresa'];
        $nombreEmpresa = $data['nombreEmpresa'];
        $contactoEmpresa = $data['contactoEmpresa'];
        $telefonoEmpresa = $data['telefonoEmpresa'];
        $direccionEmpresa = $data['direccionEmpresa'];
        $contraseñaEmpresa = $data['contraseñaEmpresa'];
    
        // Crear una instancia del modelo Usuario
        $empresa = new Empresa($idEmpresa, $cedulaEmpresa, $nombreEmpresa, $contactoEmpresa, $telefonoEmpresa, $direccionEmpresa, $contraseñaEmpresa);
    
        // Llamar al método para crear un nuevo usuario, pasando la conexión $conexion
        if ($empresa->crearEmpresa($conexion)) {
            return "Empresa registrada exitosamente.";
        } else {
            return "Error al registrar el usuario.";
        }
    }
}
