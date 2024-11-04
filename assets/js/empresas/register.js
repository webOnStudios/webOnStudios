document.getElementById("formRegistro").addEventListener("submit", function(event) {
    event.preventDefault();

    const formData = new FormData();
    formData.append("ci", document.getElementById("ci").value);
    formData.append("nombre", document.getElementById("nombre").value);
    formData.append("email", document.getElementById("email").value);
    formData.append("contrasena", document.getElementById("contrasena").value);
    formData.append("direccion", document.getElementById("direccion").value);
    formData.append("paypalId", document.getElementById("paypalId").value); // Agregado el ID de PayPal

    fetch("../../index.php?controller=Empresa&action=registrar", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log('Respuesta del servidor:', data);
        if (data.status === 'success') {
            alert("Registro exitoso");
            iniciarSesion(document.getElementById("email").value, document.getElementById("contrasena").value);
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error("Error:", error);
    });
});


// Nueva función para iniciar sesión
function iniciarSesion(email, contrasena) {
    fetch('../../index.php?controller=Empresa&action=login', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `email=${encodeURIComponent(email)}&contrasena=${encodeURIComponent(contrasena)}`
    })
    .then(response => response.json())
    .then(result => {
        // Debugging: Imprime la respuesta en la consola
        console.log('Respuesta del servidor:', result);

        if (result.status === 'success') {
            localStorage.setItem('nombreEmpresa', result.nombre); // Guarda el nombre en localStorage
            localStorage.setItem('emailEmpresa', email); // Guarda el email en localStorage
            console.log('Nombre y email guardados en localStorage'); // Mensaje de éxito
            window.location.href = 'cuenta.html'; // Redirige a la página de inicio
        } else {
            alert('Error en el inicio de sesión: ' + result.message); // Mensaje de error
        }
    })
    .catch(error => {
        console.error('Error en la solicitud:', error);
        alert('Hubo un error al intentar iniciar sesión');
    });
}
