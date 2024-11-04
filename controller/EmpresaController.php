
<?php
require_once dirname(__DIR__) . '/models/Empresa.php';


class EmpresaController {
    public function registrar() {
        header('Content-Type: application/json');
    
        try {
            if (!isset($_POST['ci'], $_POST['nombre'], $_POST['email'], $_POST['contrasena'], $_POST['direccion'], $_POST['paypalId'])) {
                echo json_encode(['status' => 'error', 'message' => 'Faltan datos en el formulario']);
                return;
            }
    
            $empresa = new Empresa();
            $empresa->setCI($_POST['ci']);
            $empresa->setNombre($_POST['nombre']);
            $empresa->setEmail($_POST['email']);
            $empresa->setContraseña($_POST['contrasena']);
            $empresa->setDireccion($_POST['direccion']);
            $empresa->setIdPaypal($_POST['paypalId']); // Asegúrate de establecer el ID de PayPal
    
            if (isset($_FILES['logo']) && $_FILES['logo']['error'] == UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['logo']['tmp_name'];
                $fileExtension = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
                $newFileName = "logo_" . $_POST['ci'] . "." . $fileExtension;
                $uploadFileDir = $_SERVER['DOCUMENT_ROOT'] . '/SIGTO/img/empresa/'; 
                $destPath = $uploadFileDir . $newFileName;
    
                if (move_uploaded_file($fileTmpPath, $destPath)) {
                    $empresa->setLogo($newFileName); 
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Error al mover el archivo de logo']);
                    return;
                }
            }
    
            if ($empresa->registrar()) { 
                echo json_encode(['status' => 'success', 'message' => 'Registro exitoso']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Error al registrar empresa']);
            }
        } catch (PDOException $e) {
            if ($e->getCode() === '23000') {
                echo json_encode(['status' => 'error', 'message' => 'El correo electrónico o la cédula ya han sido registrados']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Mensaje: ' . $e->getMessage()]);
            }
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
    


    public function login() {
        header('Content-Type: application/json');

        if (!isset($_POST['email'], $_POST['contrasena'])) {
            echo json_encode(['status' => 'error', 'message' => 'Faltan datos']);
            return;
        }

        $email = $_POST['email'];
        $contrasena = $_POST['contrasena'];

        $empresa = new Empresa();
        $empresaData = $empresa->autenticar($email, $contrasena);

        if ($empresaData) {
            echo json_encode(['status' => 'success', 'message' => 'Login exitoso', 'nombre' => $empresaData['Nombre']]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Credenciales incorrectas']);
        }
    }
    
    public function obtenerDatos() {
        header('Content-Type: application/json');
    
        $data = json_decode(file_get_contents("php://input"));
    
        if (!isset($data->email)) {
            echo json_encode(['status' => 'error', 'message' => 'Email no proporcionado.']);
            return;
        }
    
        $empresa = new Empresa();
        $empresaData = $empresa->obtenerDatos($data->email);
    
        if ($empresaData) {
            echo json_encode(['status' => 'success', 'data' => $empresaData]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No se encontraron datos']);
        }
    }

    public function obtenerEmpresas() {
        header('Content-Type: application/json');
        
        $empresa = new Empresa();
        $empresas = $empresa->obtenerTodasLasEmpresas();
    
        if ($empresas) {
            echo json_encode(['success' => true, 'data' => $empresas]);
        } else {
            echo json_encode(['success' => false, 'message' => 'No se encontraron empresas']);
        }
    }

}

?>