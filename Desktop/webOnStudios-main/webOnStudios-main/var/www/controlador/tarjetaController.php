<?php
require_once '/var/www/modelo/Tarjeta.php';

class TarjetaController {
    private $model;

    public function __construct() {
        $this->model = new Tarjeta();
    }

    // Crear una nueva tarjeta
    public function crearTarjeta($NroTarjeta, $fechaVencimiento, $CVV, $tipoTarjeta, $nombrePropietario, $cedulaUsuario) {
        // Configurar los atributos del modelo
        $this->model->setNroTarjeta($NroTarjeta);
        $this->model->setFechaVencimiento($fechaVencimiento);
        $this->model->setCVV($CVV);
        $this->model->setTipoTarjeta($tipoTarjeta);
        $this->model->setNombrePropietario($nombrePropietario);
        $this->model->setCedulaUsuario($cedulaUsuario);

        // Llamar al método del modelo para agregar la tarjeta
        $resultado = $this->model->agregarTarjeta($NroTarjeta, $fechaVencimiento, $CVV, $tipoTarjeta, $nombrePropietario, $cedulaUsuario);

        // Retornar el resultado de la operación
        return $resultado;
    }

    // Ver los detalles de una tarjeta específica
    public function obtenerTarjeta($NroTarjeta) {
        // Llamar al método del modelo para obtener los detalles de la tarjeta
        $tarjeta = $this->model->verTarjeta($NroTarjeta);

        // Retornar los detalles de la tarjeta
        return $tarjeta;
    }

    // Eliminar una tarjeta
    public function eliminarTarjeta($NroTarjeta) {
        // Llamar al método del modelo para eliminar la tarjeta
        $resultado = $this->model->eliminarTarjeta($NroTarjeta);

        // Retornar el resultado de la operación
        return $resultado;
    }
}
?>