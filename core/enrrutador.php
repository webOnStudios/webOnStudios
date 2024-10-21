<?php
class Enrutador {

    public function cargarControlador() {
        $controlador = isset($_GET['controller']) ? $_GET['controller'] . 'Controller' : 'InicioController';
        $accion = isset($_GET['action']) ? $_GET['action'] :'index';

        require_once 'controllers/' . $controlador . '.php';
        $controlador = new $controlador();
        $controlador->$accion();
    }
}
?>
