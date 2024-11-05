document.addEventListener("DOMContentLoaded", () => {
    const email = localStorage.getItem("emailUsuario");

    if (!email) {
        // Si no hay usuario, no mostramos nada.
        document.getElementById("carrito-resultados").innerHTML = "<p>Debes iniciar sesión para ver tu carrito.</p>";
        document.getElementById("subtotal").style.display = "none"; // Oculta el subtotal
        document.getElementById("boton-comprar").style.display = "none"; // Oculta el botón de comprar
        return;
    }

    // Realiza la solicitud al servidor para obtener los productos del carrito
    fetch("../../index.php?controller=Carrito&action=verCarrito&email=" + email)
        .then(response => response.json())
        .then(data => {
            if (data.length > 0) {
                mostrarProductos(data);

            } else {
                document.getElementById("carrito-resultados").innerHTML = "<p>Tu carrito está vacío.</p>";
            }
        })
        .catch(error => console.error("Error al cargar el carrito:", error));
});

function mostrarProductos(productos) {
    const carritoResultados = document.getElementById("carrito-resultados");
    let subtotal = 0;

    carritoResultados.innerHTML = ''; // Limpiar resultados anteriores

    productos.forEach(producto => {
        const precioTotal = producto.precio * producto.cantidad;
        subtotal += precioTotal;

        carritoResultados.innerHTML += `
            <div class="producto" data-id="${producto.idProducto}">
                <img src="../../img/producto/${producto.idProducto}1.jpg" alt="${producto.nombre}">
                <div class="info-producto">
                    <h4>${producto.nombre}</h4>
                    <p>Precio: $${producto.precio}</p>
                    <p>Cantidad: <span class="cantidad">${producto.cantidad}</span></p>
                    <button class="btn-aumentar" data-id="${producto.idProducto}"><box-icon name='plus' color='#fffefe'></box-icon></button>
                    <button class="btn-disminuir" data-id="${producto.idProducto}"><box-icon name='minus' color='#fffefe'></box-icon></button>
                    <button class="btn-eliminar" data-id="${producto.idProducto}"><box-icon name='trash' color='#fffefe'></box-icon></button>
                </div>
            </div>
        `;
    });


    document.getElementById("subtotal").innerText = `Subtotal: $${subtotal.toFixed(2)}`;

    agregarEventosBotones();
}

function agregarEventosBotones() {

    document.querySelectorAll(".btn-aumentar").forEach(boton => {
        boton.addEventListener("click", () => {
            const idProducto = boton.getAttribute("data-id");
            actualizarCantidadProducto(idProducto, 1); 
        });
    });


    document.querySelectorAll(".btn-disminuir").forEach(boton => {
        boton.addEventListener("click", () => {
            const idProducto = boton.getAttribute("data-id");
            actualizarCantidadProducto(idProducto, -1); 
        });
    });

    document.querySelectorAll(".btn-eliminar").forEach(boton => {
        boton.addEventListener("click", () => {
            const idProducto = boton.getAttribute("data-id");
            eliminarProducto(idProducto);
        });
    });
}

function actualizarCantidadProducto(idProducto, cambio) {
    const email = localStorage.getItem("emailUsuario");

    fetch("../../index.php?controller=Carrito&action=actualizarCantidad", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ idProducto, email, cambio })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {

            cargarProductos();
        } else {
            console.error("Error al actualizar la cantidad:", data.message);
        }
    })
    .catch(error => console.error("Error al actualizar la cantidad:", error));
}

function eliminarProducto(idProducto) {
    const email = localStorage.getItem("emailUsuario");

    fetch("../../index.php?controller=Carrito&action=eliminarProducto", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ idProducto, email })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            cargarProductos();
        } else {
            console.error("Error al eliminar el producto:", data.message);
        }
    })
    .catch(error => console.error("Error al eliminar el producto:", error));
}

function cargarProductos() {

    const email = localStorage.getItem("emailUsuario");

    fetch("../../index.php?controller=Carrito&action=verCarrito&email=" + email)
        .then(response => response.json())
        .then(data => {
            if (data.length > 0) {
                mostrarProductos(data);
            } else {
                document.getElementById("carrito-resultados").innerHTML = "<p>Tu carrito está vacío.</p>";
                document.getElementById("subtotal").innerText = ""; 

            }
        })
        .catch(error => console.error("Error al cargar el carrito:", error));
}



document.getElementById("boton-comprar").addEventListener("click", () => {

    window.location.href = "compra.html";
});
document.getElementById('busqueda-form').addEventListener('submit', function(event) {
    event.preventDefault(); 

    const nombre = this.buscar.value; 


    window.location.href = `busqueda.html?nombre=${encodeURIComponent(nombre)}`;
});

document.addEventListener("DOMContentLoaded", () => {
    const API_URL = "https://api.exchangerate-api.com/v4/latest/USD";
    let exchangeRate = parseFloat(localStorage.getItem("exchangeRate")) || null;

    if (!exchangeRate) {
        fetch(API_URL)
            .then(response => response.json())
            .then(data => {
                exchangeRate = data.rates["UYU"]; 
                localStorage.setItem("exchangeRate", exchangeRate);
            })
            .catch(error => console.error("Error al obtener la tasa de cambio:", error));
    }

    const opcionDolares = document.querySelector(".menu-content a[href='#opcion1']");
    const opcionPesos = document.querySelector(".menu-content a[href='#opcion2']");


    opcionDolares.addEventListener("click", () => {
        convertirPrecios("USD");
    });

    opcionPesos.addEventListener("click", () => {
        convertirPrecios("UYU");
    });

    function convertirPrecios(moneda) {
        const precios = document.querySelectorAll(".info-producto p");
        let subtotalElement = document.getElementById("subtotal");
        let subtotal = parseFloat(subtotalElement.dataset.subtotalOriginal) || 0;


        precios.forEach(precio => {
            if (precio.textContent.includes("Precio: $")) {
                const precioText = precio.textContent;
                const precioOriginal = parseFloat(precioText.replace(/[^0-9.-]+/g, ""));

                if (!precio.dataset.precioOriginal) {
                    precio.dataset.precioOriginal = precioOriginal;
                }

                const precioBase = parseFloat(precio.dataset.precioOriginal);

                if (moneda === "USD") {
                    if (exchangeRate) {
                        const precioConvertido = (precioBase / exchangeRate).toFixed(2);
                        precio.textContent = `Precio: U$S ${precioConvertido}`;
                    } else {
                        console.error("La tasa de cambio no está disponible.");
                    }
                } else if (moneda === "UYU") {
                    precio.textContent = `Precio: $${precioBase.toFixed(2)}`;
                }
            }
        });


        if (!subtotalElement.dataset.subtotalOriginal) {
            subtotalElement.dataset.subtotalOriginal = subtotal;
        }
        const subtotalBase = parseFloat(subtotalElement.dataset.subtotalOriginal);

        if (moneda === "USD" && exchangeRate) {
            subtotal = (subtotalBase / exchangeRate).toFixed(2);
            subtotalElement.textContent = `Subtotal: U$S ${subtotal}`;
        } else if (moneda === "UYU") {
            subtotalElement.textContent = `Subtotal: $${subtotalBase.toFixed(2)}`;
        }

        localStorage.setItem("ultimaMoneda", moneda);
    }

    const ultimaMoneda = localStorage.getItem("ultimaMoneda") || "UYU";
    convertirPrecios(ultimaMoneda);
});
