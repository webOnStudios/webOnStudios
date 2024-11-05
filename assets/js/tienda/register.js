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
            localStorage.setItem('emailUsuario', email);
            console.log('idUsuario y email guardados en localStorage');
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
    event.preventDefault(); 
    const nombre = this.buscar.value; 


    window.location.href = `busqueda.html?nombre=${encodeURIComponent(nombre)}`;
});

