<?php

require_once 'config/database.php';

class Producto {
    private $idProducto;
    private $nombreProducto;
    private $descripcionProducto;
    private $precioProducto;
    private $stockProducto;
    private $categoria;
    private $fotosProducto;

    // Constructor
    public function __construct($idProducto, $nombreProducto, $descripcionProducto, $precioProducto, $stockProducto, $categoria, $fotosProducto) {
        $this->idProducto = $idProducto;
        $this->nombreProducto = $nombreProducto;
        $this->descripcionProducto = $descripcionProducto;
        $this->precioProducto = $precioProducto;
        $this->stockProducto = $stockProducto;
        $this->categoria = $categoria;
        $this->fotosProducto = $fotosProducto;
    }

    // Getters
    public function getIdProducto() {
        return $this->idProducto;
    }

    public function getNombreProducto() {
        return $this->nombreProducto;
    }

    public function getDescripcionProducto() {
        return $this->descripcionProducto;
    }

    public function getPrecioProducto() {
        return $this->precioProducto;
    }

    public function getStockProducto() {
        return $this->stockProducto;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function getFotosProducto() {
        return $this->fotosProducto;
    }

    // Setters
    public function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }

    public function setNombreProducto($nombreProducto) {
        $this->nombreProducto = $nombreProducto;
    }

    public function setDescripcionProducto($descripcionProducto) {
        $this->descripcionProducto = $descripcionProducto;
    }

    public function setPrecioProducto($precioProducto) {
        $this->precioProducto = $precioProducto;
    }

    public function setStockProducto($stockProducto) {
        $this->stockProducto = $stockProducto;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function setFotosProducto($fotosProducto) {
        $this->fotosProducto = $fotosProducto;
    }

    // Función para crear un producto en la base de datos
    public function crearProducto($conexion) {
        // Preparar la consulta SQL para insertar en la tabla producto
        $stmt = $conexion->prepare("INSERT INTO producto (nombreProducto, descripcionProducto, precioProducto, stockProducto, categoria, fotosProducto) VALUES (?, ?, ?, ?, ?, ?)");
        
        $stmt->bind_param("ssdisb", $this->nombreProducto, $this->descripcionProducto, $this->precioProducto, $this->stockProducto, $this->categoria, $this->fotosProducto);
        
        // Ejecutar la consulta
        if ($stmt->execute()) {
            return "Producto registrado exitosamente.";
        } else {
            return "Error: " . $stmt->error;
        }
    }
}
    
?>
