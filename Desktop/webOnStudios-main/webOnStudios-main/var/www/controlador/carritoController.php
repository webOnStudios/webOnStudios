<?php

require_once '/var/www/modelo/Carrito.php';

class ControladorCarrito {
    private $carritoModel;

    public function __construct() {
        $this->carritoModel = new Carrito();
    }

    public function agregarProductoAlCarrito($idCarrito, $cedulaUsuario, $idProducto, $cantidad) {
        return $this->carritoModel->agregarProductoAlCarrito($idCarrito, $cedulaUsuario, $idProducto, $cantidad);
    }

    public function verCarrito($idCarrito) {
        return $this->carritoModel->verCarrito($idCarrito);
    }
}
?>