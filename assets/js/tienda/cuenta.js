document.addEventListener('DOMContentLoaded', async function() {
    const email = localStorage.getItem('emailUsuario'); 

    if (!email) {
        document.getElementById('loginPrompt').style.display = 'block'; 
        return; 
    }

    try {
        const response = await fetch('../../index.php?controller=Usuario&action=obtenerDatos', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ email }) 
        });

        const result = await response.json();

        if (result.status === 'success') {
            document.getElementById('userData').style.display = 'block'; 
            const { CI, Nombre, Apellido, Email } = result.data;
            document.getElementById('ci').textContent = CI;
            document.getElementById('nombre').textContent = Nombre;
            document.getElementById('apellido').textContent = Apellido;
            document.getElementById('email').textContent = Email;
        } else {
            document.getElementById('message').innerText = result.message;
            document.getElementById('loginPrompt').style.display = 'block'; 
        }
    } catch (error) {
        console.error('Error en la solicitud:', error);
        document.getElementById('message').innerText = 'Hubo un error al obtener los datos del usuario';
    }

});

document.getElementById('logoutBtn').addEventListener('click', function() {
    localStorage.removeItem('emailUsuario'); 
    localStorage.removeItem('nombreUsuario'); 
    window.location.href = 'login.html'; 
});

document.getElementById('busqueda-form').addEventListener('submit', function(event) {
    event.preventDefault(); 

    const nombre = this.buscar.value; 


    window.location.href = `busqueda.html?nombre=${encodeURIComponent(nombre)}`;
});