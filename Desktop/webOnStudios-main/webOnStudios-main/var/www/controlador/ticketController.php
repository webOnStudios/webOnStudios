<?php
require_once 'var/www/modelo/Ticket.php';

class TicketController {
    private $model;

    public function __construct($db) {
        $this->model = new Ticket($db);
    }

    public function crearTicket($NroCompra, $fechaHoraCompra, $direccionEnvio, $root, $medioPago, $EstadoTicket) {
        $this->model->setNroCompra($NroCompra);
        $this->model->setFechaHoraCompra($fechaHoraCompra);
        $this->model->setDireccionEnvio($direccionEnvio);
        $this->model->setRoot($root);
        $this->model->setMedioPago($medioPago);
        $this->model->setEstadoTicket($EstadoTicket);

        return $this->model->crearTicket();
    }

    public function verTicket($NroCompra) {
        return $this->model->verTicket($NroCompra);
    }

}
?>