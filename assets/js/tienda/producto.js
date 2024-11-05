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
        
        if (productoDetalle) {
            productoDetalle.innerHTML = `
                <h2>${producto.Nombre}</h2>
                <img src="${producto.imagen || '../../assets/img/default.jpg'}" alt="${producto.Nombre}" width="400">
                <p>Precio: $${producto.Precio}</p>
                <p>${producto.Descripcion}</p>
            `;
        } else {
            console.error("No se encontró el elemento con id 'productoDetalle'");
        }
    }
});
