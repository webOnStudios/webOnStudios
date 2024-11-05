<?php
if (!isset($_GET['controller']) && !isset($_GET['action'])) {
    header('Location: views/tienda/home.html');
    exit();
}

require_once 'core/Enrutador.php';
$enrutador = new Enrutador();
$enrutador->cargarControlador();
?>