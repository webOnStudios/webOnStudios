document.getElementById('loginForm').addEventListener('submit', async function (event) {
    event.preventDefault();

    const email = document.getElementById('email').value;
    const contrasena = document.getElementById('contrasena').value;

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
            alert('Error en el inicio de sesión: ' + result.message); 
        }
    })
    .catch(error => {
        console.error('Error en la solicitud:', error);
        alert('Hubo un error al intentar iniciar sesión');
    });
});


document.getElementById('busqueda-form').addEventListener('submit', function(event) {
    event.preventDefault(); 

    const nombre = this.buscar.value; 


    window.location.href = `busqueda.html?nombre=${encodeURIComponent(nombre)}`;
});