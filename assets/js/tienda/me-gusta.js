document.addEventListener("DOMContentLoaded", function() {
    const email = localStorage.getItem('emailUsuario');

    if (email) {
        fetch(`../../index.php?controller=Producto&action=getMeGustaByEmail&email=${encodeURIComponent(email)}`)
            .then(response => response.json())
            .then(data => {
                mostrarProductosMeGusta(data);
            })
            .catch(error => console.error("Error al obtener los productos me gusta:", error));
    } else {
        alert("Por favor, inicia sesión para ver tus productos favoritos.");
    }
});

function mostrarProductosMeGusta(productos) {
    const email = localStorage.getItem('emailUsuario');
    const container = document.getElementById("productosMeGusta");
    container.innerHTML = "";

    if (productos.length === 0) {
        container.innerHTML = `<p class="text-center">No tienes productos marcados como 'Me gusta'.</p>`;
        return;
    }

    productos.forEach(producto => {
        const imagenPath = `../../img/producto/${producto.idProducto}1.jpg`;

        const productoCard = document.createElement("div");
        productoCard.className = "col-md-4 mb-4";
        productoCard.innerHTML = `
            <div class="card">
                <img src="${imagenPath}" class="card-img-top" alt="${producto.Nombre}">
                <div class="card-body">
                    <h5 class="card-title">${producto.Nombre}</h5>
                    <p class="card-text">${producto.Descripcion}</p>
                    <p class="card-text"><strong>Precio: $${producto.Precio}</strong></p>
                    <button class="btn btn-danger btn-quitar-megusta" data-idproducto="${producto.idProducto}">Quitar Me Gusta</button>
                </div>
            </div>
        `;
        container.appendChild(productoCard);

        const btnQuitar = productoCard.querySelector('.btn-quitar-megusta');
        btnQuitar.addEventListener('click', function() {
            quitarMeGusta(producto.idProducto, email);
        });
    });
}

function quitarMeGusta(idProducto) {
    const email = localStorage.getItem('emailUsuario'); 

    if (!email) {
        alert("Por favor, inicia sesión para quitar un 'me gusta'.");
        return; 
    }

    fetch('../../index.php?controller=Producto&action=quitarMeGusta', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ idProducto, email }) 
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
            mostrarProductosMeGusta();
        } else {
            alert(data.message);
        }
    })
    .catch(error => console.error("Error al quitar me gusta:", error));
}

document.getElementById('busqueda-form').addEventListener('submit', function(event) {
    event.preventDefault(); 

    const nombre = this.buscar.value; 

    window.location.href = `busqueda.html?nombre=${encodeURIComponent(nombre)}`;
});

