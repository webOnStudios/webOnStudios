document.getElementById('loginForm').addEventListener('submit', async function (event) {
    event.preventDefault();

    const email = document.getElementById('email').value;
    const contrasena = document.getElementById('contrasena').value;

    try {
        const response = await fetch('../../index.php?controller=Empresa&action=login', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `email=${encodeURIComponent(email)}&contrasena=${encodeURIComponent(contrasena)}`
        });

        const result = await response.json();
        

        console.log('Respuesta del servidor:', result);

        if (result.status === 'success') {
            localStorage.setItem('nombreEmpresa', result.nombre); 
            localStorage.setItem('emailEmpresa', email); 
            console.log('Nombre y email guardados en localStorage'); 
            window.location.href = 'cuenta.html'; 
        } else {
            document.getElementById('message').innerText = result.message; 
        }
    } catch (error) {
        console.error('Error en la solicitud:', error);
        document.getElementById('message').innerText = 'Hubo un error al intentar iniciar sesión';
    }
});
