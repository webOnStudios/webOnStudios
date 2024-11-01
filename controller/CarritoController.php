<?php
require_once dirname(__DIR__) . '/models/Carrito.php';
class CarritoController {
    public function agregarProducto() {
        $data = json_decode(file_get_contents("php://input"));
        $idUsuario = $data->idUsuario;
        $idProducto = $data->idProducto;

        $carrito = new Carrito(); // Asegúrate de tener la clase Carrito definida
        $carrito->agregar($idUsuario, $idProducto);
    }
}

?>