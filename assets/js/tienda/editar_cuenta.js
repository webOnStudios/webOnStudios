document.addEventListener('DOMContentLoaded', async function() {
    const email = localStorage.getItem('emailUsuario');

    if (!email) {
        window.location.href = 'login.html';
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
            const { Nombre, Apellido, Email } = result.data;
            document.getElementById('nombre').value = Nombre;
            document.getElementById('apellido').value = Apellido;
            document.getElementById('email').value = Email;
        } else {
            document.getElementById('message').innerText = result.message; 
            window.location.href = 'login.html';
        }
    } catch (error) {
        console.error('Error en la solicitud:', error);
        document.getElementById('message').innerText = 'Hubo un error al obtener los datos del usuario'; 
    }

    document.getElementById('editUserDataForm').addEventListener('submit', async function(event) {
        event.preventDefault();

        const nombre = document.getElementById('nombre').value;
        const apellido = document.getElementById('apellido').value;
        const currentPassword = document.getElementById('currentPassword').value;
        const newPassword = document.getElementById('newPassword').value;
        const confirmPassword = document.getElementById('confirmPassword').value;

        if (newPassword !== confirmPassword) {
            document.getElementById('message').innerText = 'Las contraseñas no coinciden'; 
            return;
        }

        try {
            const response = await fetch('../../index.php?controller=Usuario&action=actualizarDatos', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    email,
                    nombre,
                    apellido,
                    currentPassword,
                    newPassword
                })
            });

            const result = await response.json();
            document.getElementById('message').innerText = result.message; 

            if (result.status === 'success') {

                setTimeout(() => {
                    window.location.href = 'cuenta.html';
                }, 1000); 
            }
        } catch (error) {
            console.error('Error en la solicitud:', error);
            document.getElementById('message').innerText = 'Hubo un error al actualizar los datos'; 
        }
    });

    document.getElementById('cancelBtn').addEventListener('click', function() {
        window.location.href = 'cuenta.html'; 
    });
});

document.getElementById('busqueda-form').addEventListener('submit', function(event) {
    event.preventDefault(); 

    const nombre = this.buscar.value; 
    
    window.location.href = `busqueda.html?nombre=${encodeURIComponent(nombre)}`;
});