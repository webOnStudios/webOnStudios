$("#publicar").click(boton);

function boton() {
    if (confirm('¿Estás seguro de que quieres publicar este producto en nuestra tienda?')) {
        alert('Producto publicado con éxito.');
        $("#productForm").submit();
    } else {
        alert('Publicación cancelada.');
    }
}

