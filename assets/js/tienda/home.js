const nombre = localStorage.getItem('nombreUsuario');
if (nombre) {
    document.getElementById('nombre').textContent = ('Bienvenido/a ' + nombre);
} else {
    document.getElementById('nombre').textContent = (' ');
}

// Manejar el evento de submit del formulario
    document.getElementById('busqueda-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Evitar el envío del formulario por defecto

        const nombre = this.buscar.value; // Obtener el valor del campo de búsqueda

        // Redirigir a la página de búsqueda
        window.location.href = `busqueda.html?nombre=${encodeURIComponent(nombre)}`;
    });


    document.getElementById('busqueda-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Evitar el envío del formulario por defecto

        const nombre = this.buscar.value; // Obtener el valor del campo de búsqueda

        // Redirigir a la página de búsqueda
        window.location.href = `busqueda.html?nombre=${encodeURIComponent(nombre)}`;
    });