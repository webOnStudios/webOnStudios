<?php
// Incluir el modelo de Admin
require_once 'models/producto.php';

class productoController {

    // Método para crear un nuevo admin
    public function crearProducto($data) {
        global $conexion; // Usar la conexión global

       // Recoger los datos del formulario
       $idProducto = $data['idProducto'];
       $nombreProducto = $data['nombreProducto'];
       $descripcionProducto = $data['descripcionProducto'];
       $precioProducto = $data['precioProducto'];
       $stockProducto = $data['stockProducto'];
       $categoria = $data['categoria'];
       $fotosProducto = $data['fotosProducto'];
   
       // Crear una instancia del modelo Usuario
       $producto = new Producto($idProducto, $nombreProducto, $descripcionProducto, $precioProducto, $stockProducto, $categoria, $fotosProducto);
   
       // Llamar al método para crear un nuevo usuario, pasando la conexión $conexion
       if ($producto->crearProducto($conexion)) {
           return "Producto registrada exitosamente.";
       } else {
           return "Error al registrar el producto.";
       }
   }
}
