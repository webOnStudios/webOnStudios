const nombre = localStorage.getItem('nombreUsuario');
if (nombre) {
    document.getElementById('nombre').textContent = ('Bienvenido/a ' + nombre);
} else {
    document.getElementById('nombre').textContent = (' ');
}

    document.getElementById('busqueda-form').addEventListener('submit', function(event) {
        event.preventDefault();

        const nombre = this.buscar.value; 


        window.location.href = `busqueda.html?nombre=${encodeURIComponent(nombre)}`;
    });


    document.getElementById('busqueda-form').addEventListener('submit', function(event) {
        event.preventDefault(); 

        const nombre = this.buscar.value;


        window.location.href = `busqueda.html?nombre=${encodeURIComponent(nombre)}`;
    });

const firstImage = document.getElementById('first').previousElementSibling;
const secondImage = document.getElementById('second');

secondImage.addEventListener('click', () => {
    const tempSrc = firstImage.src;
    
    
    firstImage.src = secondImage.src;
    secondImage.src = tempSrc;
});
