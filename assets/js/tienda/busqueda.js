document.addEventListener("DOMContentLoaded", function() {
    // Obtener el parámetro de búsqueda de la URL
    const urlParams = new URLSearchParams(window.location.search);
    const nombre = urlParams.get('nombre');

    if (nombre) {
        // Realizar la búsqueda en el servidor
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
                mostrarResultados(data.data); // Mostrar los resultados
            } else {
                document.getElementById('resultados').innerText = 'No se encontraron productos';
            }
        })
        .catch(error => console.error('Error:', error));
    }

    function mostrarResultados(productos) {
        const resultadosDiv = document.getElementById('resultados');
        resultadosDiv.innerHTML = ''; // Limpiar resultados anteriores
    
        productos.forEach(producto => {
            const productoDiv = document.createElement('section');
            productoDiv.className = 'product-card d-flex'; // Clases para el diseño
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
                    <button class="btn btn-like" ">
                        <i class="fas fa-heart"></i> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAfVJREFUSEuVVttBwzAQkzxJOgntJJRJgEkok6SbkEks8Cvx41zAP01s53TSvUrsiwB0vJpP9Z32fnzLW8cJwb+YjVi1hRrcMgplVy2AXxBnx8N+dij85EUwI0s6C3gmcAa0CQSFTzp3CzJKugJ4EnAmsAUDAj4deWuVDTa7GEhaEQ3nkFQ3fvbv+XoARgSuLQo3UO+k25KkSdl9eWlNXhsrxL+zNgCkz94c+V7SZf9E8meAa4xO2c3Px1a7YVwtnr0wy1UB6APANQEM7pqUbAbx2xvJl+BpDSDb7EAjlYvlxGHgTvLSAfgvgUtCnOmUA2tI17HZSJ5K+UTN5f2HwOsIkNXJXk8CW0kYnbi7yABHJUt6DRlgZtCjTVvBiyNjSieHc9VJPgW6LCMoD3MgHd4d3aVN01wUkhYIK6ilS/papzkfYaNL2u+F1nQ+CD6AIFQzl9FSS6kj2AQ2MegqvSDL+8AgtIwOpM2uKuDJ+NBZbR0ispcPKRtBhkquqUVZ3Kk0yv2o6UVGT89dMzBITOwq3GWZBabKInumSH4RuFJYQvUOsgyWc9tv5oExReoBFrOrMEkGN9Kd7BHbylGNzBlKYpayC2tQysU28Mvoe5RFs9kfmJBshknzN2HiY1Zx7lEt1/9aSamDSRYVYzW07cYxz/s0/Qbx5Pkjtz3MCAAAAABJRU5ErkJggg=="/>
                    </button>
                    <button class="btn btn-cart" ">
                        <i class="fas fa-shopping-cart"></i> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAgtJREFUSEuVVt1ZwzAQkzxJ2aTdpLzCEC1DwCvdhG5CJ4mI/8/xhQ/ykK+J7bvTSaeUcC8CUFuxT+l3uREyuwCMx9KL+Kpc8aEesL/Hcz3GuGc3zlRd2rmXwN/td6HGKauSck+EB4gbyTfv4J9TlI25RQS0lAQ96onkfdtYy8GvPLXGb8rUojOITwB3kqdxOZdV0a4oC4e/8LGtSNIBwHdp14kh3FOlfaOTwBFCU5rTaEkRwRlIXDxbhUwITOK8b6tGk6ASaFA8SD4l7qsIshAApluVCMhgJD+W1PBZhUj6gnAE8UzylkTghih1k8zIdRZ4Cwn5MGhDm2PFsUXxwIMMCUWtpCbrJOdVSZG7yOETyceUwMTAIh1YyQaKZFsgxT7ZtpiC7mRo6ptBj2q5rCGvW7IrghDbUqqSlqGl1Zd2vaiopUq2kD25WWNzkZIHtrZtJ7lYZDtgFPW1Dt1xVc6VIbx5hrgq7LIiuXKSdUxo7NeOfs0k6Qggwu+qnGYnunBSTOdqQGB8o3q9nd5Fy2XdH7kwVwtaB6NYSxk0L4E9/j/XNNH6d6qJchwA3zreAbwA+Ajkq0UpKa2prE3u6+tirMjaRJdmDhXVU2vKChrP7szBCGqR3lkQkHxtAXOChi6veRzYpM1mNx/0qXX7LPWV6kWT5Y7RHEeeFO2HoJ2DvX8PDuvOK1u1zf4DmlY1Mhw9ebQAAAAASUVORK5CYII="/>
                    </button> 
                </article>
            </section>
            `;
    
            resultadosDiv.appendChild(productoDiv);
        });


    }
});


document.getElementById('busqueda-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Evitar el envío del formulario por defecto

    const nombre = this.buscar.value; // Obtener el valor del campo de búsqueda

    // Redirigir a la página de búsqueda
    window.location.href = `busqueda.html?nombre=${encodeURIComponent(nombre)}`;
});