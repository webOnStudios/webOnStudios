

document.getElementById('busqueda-form').addEventListener('submit', function(event) {
    event.preventDefault(); 

    const nombre = this.buscar.value; 


    window.location.href = `busqueda.html?nombre=${encodeURIComponent(nombre)}`;
});