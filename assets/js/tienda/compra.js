document.addEventListener("DOMContentLoaded", () => {
    const emailUsuario = localStorage.getItem("emailUsuario");
    if (!emailUsuario) {
        alert("Debes iniciar sesión para realizar una compra.");
        window.location.href = "login.html"; // Redirige al usuario a la página de inicio de sesión
        return;
    }

    // Obtener los productos del carrito
    fetch(`../../index.php?controller=Carrito&action=verCarrito&email=${emailUsuario}`)
        .then(response => response.json())
        .then(data => {
            if (data && data.length > 0) {
                mostrarProductos(data);
                calcularTotal(data);
                inicializarPayPal(data);
            } else {
                document.getElementById("productos-compra").innerText = "Tu carrito está vacío.";
            }
        })
        .catch(error => console.error("Error al cargar el carrito:", error));
});

function mostrarProductos(productos) {
    const productosCompra = document.getElementById("productos-compra");
    productosCompra.innerHTML = "";

    productos.forEach(producto => {
        productosCompra.innerHTML += `
            <div class="producto-compra">
                <img src="../../img/producto/${producto.idProducto}1.jpg" alt="${producto.Nombre}" width="100px">
                <div>
                    <h4>${producto.Nombre}</h4>
                    <p>Precio: $${producto.Precio}</p>
                    <p>Cantidad: ${producto.cantidad}</p>
                </div>
            </div>
        `;
    });
}

function calcularTotal(productos) {
    let total = 0;
    productos.forEach(producto => {
        total += producto.Precio * producto.cantidad;
    });
    document.getElementById("total-compra").innerText = `Total: $${total.toFixed(2)}`;
}

function inicializarPayPal(productos) {
    const pagosPorEmpresa = {};
    
    productos.forEach(producto => {
        const idEmpresa = producto.idEmpresa;
        if (!pagosPorEmpresa[idEmpresa]) {
            pagosPorEmpresa[idEmpresa] = { total: 0, productos: [], idPaypal: producto.idPaypal };
        }
        pagosPorEmpresa[idEmpresa].total += producto.Precio * producto.cantidad;
        pagosPorEmpresa[idEmpresa].productos.push(producto);
    });

    paypal.Buttons({
        createOrder: (data, actions) => {
            const items = Object.values(pagosPorEmpresa).map(empresa => ({
                amount: { value: empresa.total.toFixed(2) },
                payee: { email_address: empresa.idPaypal }
            }));

            return actions.order.create({
                purchase_units: items
            });
        },
        onApprove: (data, actions) => {
            return actions.order.capture().then(details => {
                alert("Pago realizado con éxito.");
                window.location.href = "confirmacion.html"; // Redirige a la página de confirmación
            });
        },
        onError: (err) => {
            console.error("Error en el pago:", err);
            alert("Hubo un error al procesar el pago.");
        }
    }).render('#paypal-button-container');
}
