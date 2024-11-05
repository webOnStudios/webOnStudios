document.getElementById("formRegistro").addEventListener("submit", function(event) {
    event.preventDefault();

    const formData = new FormData();
    formData.append("ci", document.getElementById("ci").value);
    formData.append("nombre", document.getElementById("nombre").value);
    formData.append("email", document.getElementById("email").value);
    formData.append("contrasena", document.getElementById("contrasena").value);
    formData.append("direccion", document.getElementById("direccion").value);
    formData.append("paypalId", document.getElementById("paypalId").value); 

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


function iniciarSesion(email, contrasena) {
    fetch('../../index.php?controller=Empresa&action=login', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `email=${encodeURIComponent(email)}&contrasena=${encodeURIComponent(contrasena)}`
    })
    .then(response => response.json())
    .then(result => {

        console.log('Respuesta del servidor:', result);

        if (result.status === 'success') {
            localStorage.setItem('nombreEmpresa', result.nombre); 
            localStorage.setItem('emailEmpresa', email); 
            console.log('Nombre y email guardados en localStorage'); 
            window.location.href = 'cuenta.html'; 
        } else {
            alert('Error en el inicio de sesión: ' + result.message); 
        }
    })
    .catch(error => {
        console.error('Error en la solicitud:', error);
        alert('Hubo un error al intentar iniciar sesión');
    });
}
