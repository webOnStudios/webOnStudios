document.addEventListener('DOMContentLoaded', async function() {
    const email = localStorage.getItem('emailUsuario'); // Obtener el email desde localStorage

    if (!email) {
        document.getElementById('loginPrompt').style.display = 'block'; // Mostrar opciones de login
        return; // Salir si no hay email
    }

    try {
        const response = await fetch('../../index.php?controller=Usuario&action=obtenerDatos', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ email }) // Enviar el email en el cuerpo de la solicitud
        });

        const result = await response.json();

        if (result.status === 'success') {
            document.getElementById('userData').style.display = 'block'; // Mostrar opciones de login
            const { CI, Nombre, Apellido, Email } = result.data;
            document.getElementById('ci').textContent = CI;
            document.getElementById('nombre').textContent = Nombre;
            document.getElementById('apellido').textContent = Apellido;
            document.getElementById('email').textContent = Email;
        } else {
            document.getElementById('message').innerText = result.message;
            document.getElementById('loginPrompt').style.display = 'block'; // Mostrar opciones de login
        }
    } catch (error) {
        console.error('Error en la solicitud:', error);
        document.getElementById('message').innerText = 'Hubo un error al obtener los datos del usuario';
    }

});
// Manejador para el botón de desloguear
document.getElementById('logoutBtn').addEventListener('click', function() {
    localStorage.removeItem('emailUsuario'); // Elimina el email del localStorage
    localStorage.removeItem('nombreUsuario'); // Elimina el nombre del localStorage, si lo has guardado
    window.location.href = 'login.html'; // Redirige a la página de inicio de sesión
});

document.getElementById('busqueda-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Evitar el envío del formulario por defecto

    const nombre = this.buscar.value; // Obtener el valor del campo de búsqueda

    // Redirigir a la página de búsqueda
    window.location.href = `busqueda.html?nombre=${encodeURIComponent(nombre)}`;
});