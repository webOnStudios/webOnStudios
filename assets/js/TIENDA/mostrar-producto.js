document.addEventListener('DOMContentLoaded', function () {
    const categoria = "<?php echo $categoria; ?>";
    
    if (categoria) {
        fetch(`index.php?controller=Producto&action=obtenerProductosPorCategoria&categoria=${encodeURIComponent(categoria)}`)
            .then(response => response.json())
            .then(data => {
                const productosContainer = document.getElementById('productos-lista');

                if (data.length > 0) {
                    data.forEach(producto => {
                        productosContainer.innerHTML += `
                            <div class="col-md-4">
                                <div class="producto">
                                    <h3>${producto.nombreProducto}</h3>
                                    <p>${producto.descripcionProducto}</p>
                                    <p>Precio: $${producto.precioProducto}</p>
                                    <p>Stock: ${producto.stockProducto}</p>
                                </div>
                            </div>
                        `;
                    });
                } else {
                    productosContainer.innerHTML = '<p>No hay productos disponibles en esta categoría.</p>';
                }
            })
            .catch(error => {
                console.error('Error al cargar los productos:', error);
            });
    }
});