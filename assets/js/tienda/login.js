document.getElementById('loginForm').addEventListener('submit', async function (event) {
    event.preventDefault();

    const email = document.getElementById('email').value;
    const contrasena = document.getElementById('contrasena').value;

    try {
        const response = await fetch('../../index.php?controller=Usuario&action=login', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `email=${encodeURIComponent(email)}&contrasena=${encodeURIComponent(contrasena)}`
        });

        const result = await response.json();
        
        // Debugging: Imprime la respuesta en la consola
        console.log('Respuesta del servidor:', result);

        if (result.status === 'success') {
            localStorage.setItem('nombreUsuario', result.nombre); // Guarda el nombre en localStorage
            localStorage.setItem('emailUsuario', email); // Guarda el email en localStorage
            console.log('Nombre y email guardados en localStorage'); // Mensaje de éxito
            window.location.href = 'cuenta.html'; // Redirige a la página de inicio
        } else {
            document.getElementById('message').innerText = result.message; // Muestra mensaje de error
        }
    } catch (error) {
        console.error('Error en la solicitud:', error);
        document.getElementById('message').innerText = 'Hubo un error al intentar iniciar sesión';
    }
});
