<?php
// Incluimos el modelo Empresa.
require_once '/var/www/modelo/Empresa.php';

class EmpresaController {
    // Método para agregar una nueva empresa.
    public function agregarEmpresa($data) {
        $empresa = new Empresa();
        $empresa->setCedulaEmpresa($data['cedulaEmpresa']);
        $empresa->setNombreEmpresa($data['nombreEmpresa']);
        $empresa->setContactoEmpresa($data['contactoEmpresa']);
        $empresa->setTelefonoEmpresa($data['telefonoEmpresa']);
        $empresa->setDireccionEmpresa($data['direccionEmpresa']);
        $empresa->setContraseña($data['contraseña']); // La contraseña será hasheada en el modelo

        if ($empresa->agregarEmpresa()) {
            return "Empresa creada exitosamente.";
        } else {
            return "Error al crear empresa.";
        }
    }

    // Método para leer todas las empresas.
    public function verTodasEmpresas() {
        $empresa = new Empresa();
        return $empresa->verTodasEmpresas();
    }

    // Método para leer una empresa específica por su ID.
    public function verEmpresa($id) {
        $empresa = new Empresa();
        $empresa->setIdEmpresa($id);
        return $empresa->verEmpresa();
    }

    // Método para actualizar una empresa existente.
    public function editarEmpresa($data) {
        $empresa = new Empresa();
        $empresa->setIdEmpresa($data['idEmpresa']);
        $empresa->setCedulaEmpresa($data['cedulaEmpresa']);
        $empresa->setNombreEmpresa($data['nombreEmpresa']);
        $empresa->setContactoEmpresa($data['contactoEmpresa']);
        $empresa->setTelefonoEmpresa($data['telefonoEmpresa']);
        $empresa->setDireccionEmpresa($data['direccionEmpresa']);
        $empresa->setContraseña($data['contraseña']); // La contraseña será hasheada en el modelo

        if ($empresa->editarEmpresa()) {
            return "Empresa actualizada exitosamente.";
        } else {
            return "Error al actualizar empresa.";
        }
    }

    // Método para eliminar una empresa por su ID.
    public function eliminarEmpresa($id) {
        $empresa = new Empresa();
        $empresa->setIdEmpresa($id);
        if ($empresa->eliminarEmpresa()) {
            return "Empresa eliminada exitosamente.";
        } else {
            return "Error al eliminar empresa.";
        }
    }
}
?>