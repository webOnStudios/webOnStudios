document.addEventListener("DOMContentLoaded", function() {
    // Obtén el parámetro idProducto de la URL
    const urlParams = new URLSearchParams(window.location.search);
    const idProducto = urlParams.get("id");

    if (idProducto) {
        fetch(`../../index.php?controller=Producto&action=buscarPorId&idProducto=${idProducto}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    mostrarProducto(data.data);
                } else {
                    document.getElementById("productoDetalle").innerText = "Producto no encontrado";
                }
            })
            .catch(error => console.error("Error:", error));
    }

    function mostrarProducto(producto) {
        const productoDetalle = document.getElementById("productoDetalle");
        const imagenPath = `../../img/producto/${producto.idProducto}1.jpg`;
        
        if (productoDetalle) {
            productoDetalle.innerHTML = `
            <div class="producto-detalle">
                <img src="${imagenPath}" alt="${producto.Nombre}">
                <h2>${producto.Nombre}</h2>
                <p class="precio">$${producto.Precio}</p>
                <p class="descripcion">${producto.Descripcion}</p>
                <a href="#" class="btn-comprar">Comprar ahora</a>
                <button class="btn-carrito" data-id="${producto.idProducto}">Agregar al carrito</button>
                <button class="btn-megusta" data-id="${producto.idProducto}">Me gusta</button>
            </div>
        `;
        } else {
            console.error("No se encontró el elemento con id 'productoDetalle'");
        }
    }
    const botonCarrito = productoDetalle.querySelector(".btn-carrito");
botonCarrito.addEventListener("click", function() {
    const idProducto = botonCarrito.getAttribute("data-id");
    const email = localStorage.getItem("emailUsuario");
    const cantidad = 1; // Asignamos una cantidad predeterminada

    if (!email) {
        alert("Debes iniciar sesión para agregar al carrito.");
        window.location.href = "login.html";
        return;
    }

    // Realiza la solicitud al servidor
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

// Agregar funcionalidad al botón de "Me gusta"
const botonMeGusta = productoDetalle.querySelector(".btn-megusta");
botonMeGusta.addEventListener("click", function() {
    const idProducto = botonMeGusta.getAttribute("data-id");
    const email = localStorage.getItem("emailUsuario");

    if (!email) {
        alert("Debes iniciar sesión para dar un me gusta.");
        window.location.href = "login.html";
        return;
    }

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
});
