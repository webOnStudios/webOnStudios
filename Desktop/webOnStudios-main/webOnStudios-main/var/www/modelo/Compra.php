<?php
// Incluimos el archivo de configuración de la base de datos.
require '/var/www/config/Database.php';

class Compra {
    // Conexión a la base de datos y nombre de la tabla.
    private $conn;
    private $table_name_ticket = "ticket";
    private $table_name_compran = "compran";

    // Constructor para inicializar la conexión a la base de datos.
    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Método para realizar una compra.
    public function realizarCompra($productos, $direccionEnvio, $medioPago, $estadoTicket, $usuarioCedula) {
        // Comenzar una transacción.
        $this->conn->begin_transaction();

        try {
            // Crear un nuevo ticket.
            $query = "INSERT INTO " . $this->table_name_ticket . " (fechaHoraCompra, direccionEnvio, root, medioPago, EstadoTicket) VALUES (NOW(), ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("ssss", $direccionEnvio, $usuarioCedula, $medioPago, $estadoTicket);
            $stmt->execute();

            // Obtener el número de compra generado.
            $nroCompra = $this->conn->insert_id;

            // Registrar los productos comprados.
            foreach ($productos as $producto) {
                $query = "INSERT INTO " . $this->table_name_compran . " (idProducto, cedulaUsuario, fecha_hora_compra, direccion_envio) VALUES (?, ?, NOW(), ?)";
                $stmt = $this->conn->prepare($query);
                $stmt->bind_param("iis", $producto['idProducto'], $usuarioCedula, $direccionEnvio);
                $stmt->execute();
            }

            // Confirmar la transacción.
            $this->conn->commit();

            return $nroCompra; // Retornar el número de compra para referencia.
        } catch (Exception $e) {
            // Revertir la transacción en caso de error.
            $this->conn->rollback();
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // Método para devolver productos.
    public function devolverProducto($nroCompra, $idProducto, $cedulaUsuario, $motivoDevolucion) {
        // Comenzar una transacción.
        $this->conn->begin_transaction();

        try {
            // Verificar si el producto fue comprado.
            $query = "SELECT * FROM " . $this->table_name_compran . " WHERE idProducto = ? AND cedulaUsuario = ? AND nroCompra = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("iii", $idProducto, $cedulaUsuario, $nroCompra);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 0) {
                throw new Exception("El producto no está en la compra.");
            }

            // Registrar la devolución en la tabla 'compran' (si deseas registrar allí).
            $query = "UPDATE " . $this->table_name_compran . " SET motivoDevolucion = ? WHERE idProducto = ? AND cedulaUsuario = ? AND nroCompra = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("siii", $motivoDevolucion, $idProducto, $cedulaUsuario, $nroCompra);
            $stmt->execute();

            // Confirmar la transacción.
            $this->conn->commit();

            return true; // Retornar true si la devolución fue exitosa.
        } catch (Exception $e) {
            // Revertir la transacción en caso de error.
            $this->conn->rollback();
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
?>