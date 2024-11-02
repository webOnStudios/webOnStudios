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

// Seleccionar las imágenes usando los id
const firstImage = document.getElementById('first').previousElementSibling;
const secondImage = document.getElementById('second');

// Añadir un evento de clic a la segunda imagen
secondImage.addEventListener('click', () => {
    // Guardar la ruta de la primera imagen temporalmente
    const tempSrc = firstImage.src;
    
    // Intercambiar las rutas de las imágenes
    firstImage.src = secondImage.src;
    secondImage.src = tempSrc;
});
