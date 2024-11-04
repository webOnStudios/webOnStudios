<?php

require_once dirname(__DIR__) . '/config/database.php';

class Producto {
    private $idProducto;
    private $nombre;
    private $descripcion;
    private $precio;
    private $cantidad;
    private $categoria;
    private $db;

    public function __construct() {
        // Crear una nueva instancia de la clase Database y obtener la conexión
        $database = new Database();
        $this->db = $database->getConnection(); // Aquí se llama al método getConnection()
    }

    // Setters
    public function setIdProducto($id) {
        $this->idProducto = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    // Método para insertar el producto en la base de datos
    public function guardar() {
        $database = new Database();
        $db = $database->getConnection();
    
        $query = "INSERT INTO producto (Precio, Nombre, Descripcion, Cantidad, Categoria) 
                  VALUES (:precio, :nombre, :descripcion, :cantidad, :categoria)";
        $stmt = $db->prepare($query);
    
        $stmt->bindParam(':precio', $this->precio);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':descripcion', $this->descripcion);
        $stmt->bindParam(':cantidad', $this->cantidad);
        $stmt->bindParam(':categoria', $this->categoria);
    
        if ($stmt->execute()) {
            // Obtener el último ID insertado
            return $db->lastInsertId(); // Asegúrate de que este método devuelva el ID correcto
        }
        return false; // En caso de error
    }
    
    

    public function obtenerIdEmpresaPorEmail($emailEmpresa) {

        $sql = "SELECT idEmpresa FROM empresa WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(1, $emailEmpresa);
        $stmt->execute();
        return $stmt->fetchColumn(); // Devuelve el ID de la empresa o false
    }
    

    // Método para asociar un producto con una empresa en la tabla vende
    public function asociarProductoEmpresa($idEmpresa, $idProducto) {
        $database = new Database();
        $db = $database->getConnection();
    
        $query = "INSERT INTO vende (idEmpresa, idProducto) VALUES (:idEmpresa, :idProducto)";
        $stmt = $db->prepare($query);
    
        $stmt->bindParam(':idEmpresa', $idEmpresa);
        $stmt->bindParam(':idProducto', $idProducto);
    
        return $stmt->execute(); // Retorna true si se inserta correctamente
    }
    

    public function obtenerProductosPorIdEmpresa($idEmpresa) {
        $sql = "SELECT p.idProducto, p.Nombre, p.Descripcion, p.Precio, p.Cantidad, p.Categoria
                FROM producto p
                JOIN vende v ON p.idProducto = v.idProducto
                WHERE v.idEmpresa = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(1, $idEmpresa);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Devuelve todos los productos asociados a la empresa
    }

    public function obtenerProductosPorEmail($email) {
        $database = new Database();
        $db = $database->getConnection();
    
        // Consulta para obtener los productos y sus fotos
        $query = "SELECT p.*, fp.fotoPath 
                  FROM producto p 
                  JOIN vende v ON p.idProducto = v.idProducto 
                  JOIN empresa e ON v.idEmpresa = e.idEmpresa 
                  LEFT JOIN fotosproducto fp ON p.idProducto = fp.idProducto 
                  WHERE e.email = :email";
        
        $stmt = $db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Devuelve todos los resultados
    }

    
    
    public function guardarFoto($idProducto, $fotoPath) {
        $query = "INSERT INTO fotosproducto (idProducto, fotoPath) VALUES (:idProducto, :fotoPath)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':idProducto', $idProducto);
        $stmt->bindParam(':fotoPath', $fotoPath);
        
        return $stmt->execute(); // Retorna true si se inserta correctamente
    }
    
    public function buscarProductosPorNombre($nombre) {
        $query = "SELECT * FROM producto WHERE Nombre LIKE :nombre";
        $stmt = $this->db->prepare($query);
        
        // Agrega los % para que busque de manera flexible
        $nombre = "%$nombre%";
        $stmt->bindParam(':nombre', $nombre);
        $stmt->execute();
        
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Agregar la ruta de la imagen a cada producto
        foreach ($resultados as &$producto) {
            $producto['imagen'] = $this->obtenerRutaImagen($producto['idProducto']);
        }
        
        return $resultados; // Devuelve todos los resultados que coincidan
    }
    
    private function obtenerRutaImagen($idProducto) {
        $numeroIdentificador = 1; // Número del identificador
        $rutaImagen = "../../img/producto/{$idProducto}{$numeroIdentificador}.jpg"; // Formato de la imagen
        return $rutaImagen;
    }
    

    public function buscarPorId($id) {
        $query = "SELECT * FROM producto WHERE idProducto = :idProducto";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':idProducto', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC); // Devuelve el producto
    }

    public function obtenerTodosLosProductos() {
        $stmt = $this->db->prepare("SELECT idProducto, Precio, Nombre, Descripcion, Cantidad, Categoria FROM Producto");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function getProductosPorCategoria($categoria) {
        // Preparar la consulta SQL para obtener los productos por categoría
        $query = "SELECT * FROM producto WHERE Categoria = :categoria AND suspendido = 'no'";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':categoria', $categoria, PDO::PARAM_STR);

        if ($stmt->execute()) {
            // Obtener todos los productos como un arreglo asociativo
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return []; // Devolver un arreglo vacío si la consulta falla
        }
    }

    // En el archivo Producto.php
      public function registrarMeGusta($idProducto, $email) {
        $sql = "INSERT INTO megusta (idProducto, Email) VALUES (:idProducto, :Email)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":idProducto", $idProducto, PDO::PARAM_INT);
        $stmt->bindParam(":Email", $email, PDO::PARAM_STR);
        
        // Intentar ejecutar la consulta
        try {
            $stmt->execute();
            return true; // Éxito en la inserción
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) { // Código de error para violación de clave única
                return false; // Registro ya existe
            }
            throw $e; // O lanzar otros errores
        }
    }
    
    public function getMeGustaByEmail($email) {
        $sql = "SELECT p.* 
                FROM megusta m 
                JOIN producto p ON m.idProducto = p.idProducto 
                WHERE m.Email = :email";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function existeMeGusta($idProducto, $email) {
        $sql = "SELECT COUNT(*) FROM megusta WHERE idProducto = :idProducto AND Email = :email";
        $stmt = $this->db->prepare($sql);
        
        // Usar bindParam() para vincular los parámetros
        $stmt->bindParam(':idProducto', $idProducto, PDO::PARAM_INT);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        
        $stmt->execute();
        return $stmt->fetchColumn() > 0; // Devuelve true si existe un registro
    }
    
    public function eliminarMeGusta($idProducto, $email) {
        $sql = "DELETE FROM megusta WHERE idProducto = ? AND Email = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$idProducto, $email]); // Devuelve true si la eliminación fue exitosa
    }


}
?>

