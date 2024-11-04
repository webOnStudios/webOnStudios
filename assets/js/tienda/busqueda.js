document.addEventListener("DOMContentLoaded", function() {

    const urlParams = new URLSearchParams(window.location.search);
    const nombre = urlParams.get('nombre');

    if (nombre) {
        fetch('../../index.php?controller=Producto&action=buscarProductoPorNombre', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ nombre: nombre })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                mostrarResultados(data.data); 
            } else {
                document.getElementById('resultados').innerText = 'No se encontraron productos';
            }
        })
        .catch(error => console.error('Error:', error));
    }

    function mostrarResultados(productos) {
        const resultadosDiv = document.getElementById('resultados');
        resultadosDiv.innerHTML = ''; 

        productos.forEach(producto => {
            const productoDiv = document.createElement('section');
            productoDiv.className = 'product-card d-flex'; 
            productoDiv.id = 'producto';

            productoDiv.innerHTML = `
                <section class="row" id="producto">
                    <article class="col md-2">
                        <img src="${producto.imagen || '../../assets/img/default.jpg'}" class="producto-imagen" width="200" alt="${producto.Nombre}">
                    </article>
                    <article class="col md-5">
                        <h4>${producto.Nombre}</h4>
                        <h4>$${producto.Precio}</h4>
                        <p>${producto.Descripcion}</p>
                    </article>
                    <article class="col md-5">
                        <button class="btn btn-like" data-id="${producto.idProducto}">
                            <i class="fas fa-heart"></i> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAfVJREFUSEuVVttBwzAQkzxJOgntJJRJgEkok6SbkEks8Cvx41zAP01s53TSvUrsiwB0vJpP9Z32fnzLW8cJwb+YjVi1hRrcMgplVy2AXxBnx8N+dij85EUwI0s6C3gmcAa0CQSFTzp3CzJKugJ4EnAmsAUDAj4deWuVDTa7GEhaEQ3nkFQ3fvbv+XoARgSuLQo3UO+k25KkSdl9eWlNXhsrxL+zNgCkz94c+V7SZf9E8meAa4xO2c3Px1a7YVwtnr0wy1UB6APANQEM7pqUbAbx2xvJl+BpDSDb7EAjlYvlxGHgTvLSAfgvgUtCnOmUA2tI17HZSJ5K+UTN5f2HwOsIkNXJXk8CW0kYnbi7yABHJUt6DRlgZtCjTVvBiyNjSieHc9VJPgW6LCMoD3MgHd4d3aVN01wUkhYIK6ilS/papzkfYaNL2u+F1nQ+CD6AIFQzl9FSS6kj2AQ2MegqvSDL+8AgtIwOpM2uKuDJ+NBZbR0ispcPKRtBhkquqUVZ3Kk0yv2o6UVGT89dMzBITOwq3GWZBabKInumSH4RuFJYQvUOsgyWc9tv5oExReoBFrOrMEkGN9Kd7BHbylGNzBlKYpayC2tQysU28Mvoe5RFs9kfmJBshknzN2HiY1Zx7lEt1/9aSamDSRYVYzW07cYxz/s0/Qbx5Pkjtz3MCAAAAABJRU5ErkJggg=="/>
                        </button>
                    </article>
                </section>
            `;

            // Añadir evento al botón de "Me gusta"
            productoDiv.querySelector('.btn-like').addEventListener('click', function() {
                const email = localStorage.getItem('email');
                const productoId = this.getAttribute('data-id');

                if (email) {

                    console.log(`Producto ${productoId} marcado como Me Gusta por el usuario ${email}`);
                } else {

                    localStorage.setItem('productoIdMeGusta', productoId);
                    window.location.href = 'me-gusta.html';
                }
            });

            resultadosDiv.appendChild(productoDiv);
        });
    }
});


document.getElementById('busqueda-form').addEventListener('submit', function(event) {
    event.preventDefault(); 

    const nombre = this.buscar.value; 

    window.location.href = `busqueda.html?nombre=${encodeURIComponent(nombre)}`;
});