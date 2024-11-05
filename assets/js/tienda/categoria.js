document.addEventListener("DOMContentLoaded", function() {
    // Obtener el parámetro de la categoría desde la URL
    const params = new URLSearchParams(window.location.search);
    const categoria = params.get("categoria");

    // Establecer el título de la categoría
    const tituloCategoria = document.getElementById("tituloCategoria");
    tituloCategoria.textContent += categoria;

    // Llamar a la función para obtener los productos de la categoría
    fetchProductosPorCategoria(categoria);
});

function fetchProductosPorCategoria(categoria) {
    fetch(`../../index.php?controller=Producto&action=getByCategoria&categoria=${encodeURIComponent(categoria)}`)
        .then(response => response.json())
        .then(data => {
            if (data && data.length > 0) {
                mostrarProductos(data);
            } else {
                mostrarMensajeNoHayProductos();
            }
        })
        .catch(error => console.error("Error al obtener los productos:", error));
}

function mostrarProductos(productos) {
    const container = document.getElementById("productosContainer");
    container.innerHTML = ""; 

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
                    <p class="card-text">Stock: ${producto.Cantidad}</p>
                    <button class="btn btn-primary btn-megusta" data-idproducto="${producto.idProducto}">Me gusta</button>
                    <button class="btn btn-primary btn-carrito" data-idproducto="${producto.idProducto}">Agregar al carrito</button>
                </div>
            </div>
        `;
        container.appendChild(productoCard);

        const botonMeGusta = productoCard.querySelector(".btn-megusta");
        botonMeGusta.addEventListener("click", function() {
            const idProducto = botonMeGusta.getAttribute("data-idproducto");


            const email = localStorage.getItem("emailUsuario");
            if (!email) {
                alert("Debes iniciar sesión para dar un me gusta.");
                window.location.href = "login.html"; 
                return;
            }

            console.log("ID del Producto:", idProducto);
            console.log("Email del Usuario:", email);


            fetch("../../index.php?controller=Producto&action=registrarMeGusta", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ idProducto, Email: email })
            })
            .then(response => response.json())
            .then(data => {
                console.log("Respuesta del servidor:", data); 
                if (data.success) {
                    alert("Me gusta registrado correctamente.");
                } else {
                    alert("Ya has guardado este producto");
                }
            })
            .catch(error => console.error("Error al registrar el me gusta:", error));

            
        });

        const botonCarrito = productoDiv.querySelector(".btn-carrito");
        botonCarrito.addEventListener("click", function() {
            const idProducto = botonCarrito.getAttribute("data-id");
            const email = localStorage.getItem("emailUsuario");
            const cantidad = 1; 

            if (!email) {
                alert("Debes iniciar sesión para agregar al carrito.");
                window.location.href = "login.html";
                return;
            }

            fetch("../../index.php?controller=Carrito&action=agregarAlCarrito", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ idProducto, email, cantidad })
            })
            .then(response => response.json())
            .then(data => {
                console.log("Respuesta del servidor:", data);
                if (data.success) {
                    alert("Producto agregado al carrito"); 
                } else {
                    alert(data.message || "Error al agregar el producto al carrito.");
                }
            })
            .catch(error => console.error("Error al agregar al carrito:", error));
        });

    });
}

function mostrarMensajeNoHayProductos() {
    const container = document.getElementById("productosContainer");
    container.innerHTML = ""; 

    const mensaje = document.createElement("div");
    mensaje.className = "alert alert-warning";
    mensaje.textContent = "No hay productos disponibles en esta categoría.";
    container.appendChild(mensaje);
}


document.getElementById('busqueda-form').addEventListener('submit', function(event) {
    event.preventDefault(); 

    const nombre = this.buscar.value; 

    window.location.href = `busqueda.html?nombre=${encodeURIComponent(nombre)}`;
});