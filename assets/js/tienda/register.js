document.getElementById("formRegistro").addEventListener("submit", function(event) {
    event.preventDefault();

    const formData = new FormData();
    formData.append("ci", document.getElementById("ci").value);
    formData.append("nombre", document.getElementById("nombre").value);
    formData.append("apellido", document.getElementById("apellido").value);
    formData.append("email", document.getElementById("email").value);
    formData.append("contrasena", document.getElementById("contrasena").value);

    fetch("../../index.php?controller=Usuario&action=registrar", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log('Respuesta del servidor:', data); // Debugging
        if (data.status === 'success') { // Cambiado de data.success a data.status
            alert("Registro exitoso");
            // Iniciar sesión automáticamente después del registro
            iniciarSesion(document.getElementById("email").value, document.getElementById("contrasena").value);
        } else {
            alert(data.message); // Muestra el mensaje de error del servidor
        }
    })
    .catch(error => {
        console.error("Error:", error);
    });
});

function iniciarSesion(email, contrasena) {
    fetch('../../index.php?controller=Usuario&action=login', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `email=${encodeURIComponent(email)}&contrasena=${encodeURIComponent(contrasena)}`
    })
    .then(response => response.json())
    .then(result => {
        console.log('Respuesta del servidor:', result);

        if (result.status === 'success') {
            localStorage.setItem('nombreUsuario', result.nombre); 
            localStorage.setItem('emailUsuario', email); 
            console.log('Nombre y email guardados en localStorage');
            window.location.href = 'home.html'; 
        } else {
            alert(result.message); 
        }
    })
    .catch(error => {
        console.error('Error en la solicitud:', error);
        alert('Hubo un error al intentar iniciar sesión');
    });
}


document.getElementById('busqueda-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Evitar el envío del formulario por defecto

    const nombre = this.buscar.value; // Obtener el valor del campo de búsqueda

    // Redirigir a la página de búsqueda
    window.location.href = `busqueda.html?nombre=${encodeURIComponent(nombre)}`;
});

