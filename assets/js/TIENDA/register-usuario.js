
document.getElementById('registroUsuarioForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const data = {
        cedulaUsuario: document.getElementById('cedulaUsuario').value,
        nicknameUsuario: document.getElementById('nicknameUsuario').value,
        emailUsuario: document.getElementById('emailUsuario').value,
        nombreUsuario: document.getElementById('nombreUsuario').value,
        apellidoUsuario: document.getElementById('apellidoUsuario').value,
        contraseñaUsuario: document.getElementById('contraseñaUsuario').value,
        fechaNacUsuario: document.getElementById('fechaNacUsuario').value
    };

    // Validar que todos los campos tengan un valor
    if (!data.cedulaUsuario || !data.nicknameUsuario || !data.emailUsuario || 
        !data.nombreUsuario || !data.apellidoUsuario || !data.contraseñaUsuario || 
        !data.fechaNacUsuario) {
        alert('Por favor, complete todos los campos.');
        return;
    }

    // Validar formato de cédula (númerica y longitud específica)
    if (!/^\d{7,11}$/.test(data.cedulaUsuario)) {
        alert('La cédula debe ser numérica y tener entre 7 y 11 dígitos.');
        return;
    }

    // Validar que el email sea válido
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(data.emailUsuario)) {
        alert('El formato del correo electrónico no es válido.');
        return;
    }

    // Validar que la contraseña tenga al menos 6 caracteres
    if (data.contraseñaUsuario.length < 6) {
        alert('La contraseña debe tener al menos 6 caracteres.');
        return;
    }

    // Preparar datos para enviar
    const datos = new FormData();
    for (let key in data) {
        datos.append(key, data[key]);
    }

    // Realizar el fetch
    fetch("../../controllers/usuarioController.php", {
        method: "POST",
        body: datos,
    })
    .then((response) => response.json())
    .then((response) => {
        document.getElementById("mensaje").innerText = response.message;
    })
    .catch((error) => {
        console.error("Error al intentar registrar el usuario:", error);
    });
});
