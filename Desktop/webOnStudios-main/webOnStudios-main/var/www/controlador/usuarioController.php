<?php
// Incluimos el modelo Usuario.
require_once '/var/www/modelo/Usuario.php';

class UsuarioController {
    // Método para crear un nuevo usuario.
    public function create($data) {
        $usuario = new Usuario(); // Creamos una nueva instancia del modelo Usuario.
        
        $usuario->setCedulaUsuario($data['cedulaUsuario']); // Asignamos la cédula del usuario.
        $usuario->setNicknameUsuario($data['nicknameUsuario']); // Asignamos el nickname del usuario.
        $usuario->setEmailUsuario($data['emailUsuario']); // Asignamos el email del usuario.
        $usuario->setNombreUsuario($data['nombreUsuario']); // Asignamos el nombre del usuario.
        $usuario->setApellidoUsuario($data['apellidoUsuario']); // Asignamos el apellido del usuario.
        $usuario->setFechaNacUsuario($data['fechaNacUsuario']); // Asignamos la fecha de nacimiento del usuario.
        $usuario->setContraseñaUsuario($data['contraseñaUsuario']); // Asignamos la contraseña del usuario.

        if ($usuario->create()) { // Intentamos crear el usuario en la base de datos.
            return "Usuario creado exitosamente."; // Si la creación fue exitosa, devolvemos un mensaje de éxito.
        } else {
            return "Error al crear usuario."; // Si hubo un error, devolvemos un mensaje de error.
        }
    }

    // Método para leer todos los usuarios.
    public function readAll() {
        $usuario = new Usuario(); // Creamos una nueva instancia del modelo Usuario.
        return $usuario->readAll(); // Retornamos todos los usuarios utilizando el método readAll del modelo Usuario.
    }

    // Método para leer un usuario específico por su cédula.
    public function readOne($cedulaUsuario) {
        $usuario = new Usuario(); // Creamos una nueva instancia del modelo Usuario.
        $usuario->setCedulaUsuario($cedulaUsuario); // Asignamos la cédula del usuario que queremos leer.
        return $usuario->readOne(); // Retornamos los datos del usuario con la cédula especificada.
    }

    // Método para actualizar un usuario existente.
    public function update($data) {
        $usuario = new Usuario(); // Creamos una nueva instancia del modelo Usuario.
        $usuario->setCedulaUsuario($data['cedulaUsuario']); // Asignamos la cédula del usuario que se va a actualizar.
        $usuario->setNicknameUsuario($data['nicknameUsuario']); // Actualizamos el nickname del usuario.
        $usuario->setEmailUsuario($data['emailUsuario']); // Actualizamos el email del usuario.
        $usuario->setNombreUsuario($data['nombreUsuario']); // Actualizamos el nombre del usuario.
        $usuario->setApellidoUsuario($data['apellidoUsuario']); // Actualizamos el apellido del usuario.
        $usuario->setFechaNacUsuario($data['fechaNacUsuario']); // Actualizamos la fecha de nacimiento del usuario.
        $usuario->setContraseñaUsuario($data['contraseñaUsuario']); // Actualizamos la contraseña del usuario.

        if ($usuario->update()) { // Intentamos actualizar el usuario en la base de datos.
            return "Usuario actualizado exitosamente."; // Si la actualización fue exitosa, devolvemos un mensaje de éxito.
        } else {
            return "Error al actualizar usuario."; // Si hubo un error, devolvemos un mensaje de error.
        }
    }

    // Método para eliminar un usuario por su cédula.
    public function delete($cedulaUsuario) {
        $usuario = new Usuario(); // Creamos una nueva instancia del modelo Usuario.
        $usuario->setCedulaUsuario($cedulaUsuario); // Asignamos la cédula del usuario que se va a eliminar.
        if ($usuario->delete()) { // Intentamos eliminar el usuario de la base de datos.
            return "Usuario eliminado exitosamente."; // Si la eliminación fue exitosa, devolvemos un mensaje de éxito.
        } else {
            return "Error al eliminar usuario."; // Si hubo un error, devolvemos un mensaje de error.
        }
    }
}
?>