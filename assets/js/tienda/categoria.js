document.getElementById('busqueda-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Evitar el envío del formulario por defecto

    const nombre = this.buscar.value; // Obtener el valor del campo de búsqueda

    // Redirigir a la página de búsqueda
    window.location.href = `busqueda.html?nombre=${encodeURIComponent(nombre)}`;
});