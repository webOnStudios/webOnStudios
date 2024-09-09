<?php

require_once '/var/www/modelo/Producto.php';

class ControladorProducto {
    private $productoModel;

    public function __construct() {
        $this->productoModel = new Producto();
    }

    public function agregarProducto($nombre, $descripcion, $precio, $stock, $categoria, $fotos) {
        $this->productoModel->setNombreProducto($nombre);
        $this->productoModel->setDescripcionProducto($descripcion);
        $this->productoModel->setPrecioProducto($precio);
        $this->productoModel->setStockProducto($stock);
        $this->productoModel->setCategoria($categoria);
        $this->productoModel->setFotosProducto($fotos);
        return $this->productoModel->agregarProducto();
    }

    public function verProducto($idProducto) {
        $this->productoModel->setIdProducto($idProducto);
        return $this->productoModel->verProducto($idProducto);
    }

    public function editarProducto($id, $nombre, $descripcion, $precio, $stock, $categoria, $fotos) {
        $this->productoModel->setIdProducto($id);
        $this->productoModel->setNombreProducto($nombre);
        $this->productoModel->setDescripcionProducto($descripcion);
        $this->productoModel->setPrecioProducto($precio);
        $this->productoModel->setStockProducto($stock);
        $this->productoModel->setCategoria($categoria);
        $this->productoModel->setFotosProducto($fotos);
        return $this->productoModel->editarProducto();
    }

    public function eliminarProducto($idProducto) {
        $this->productoModel->setIdProducto($idProducto);
        return $this->productoModel->eliminarProducto();
    }
    public function buscarProducto($nombreProducto) {
        return $this->productoModel->buscarProducto($nombreProducto);
    }
}
?>