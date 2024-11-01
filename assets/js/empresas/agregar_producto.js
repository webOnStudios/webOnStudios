document.addEventListener("DOMContentLoaded", function () {
    const emailEmpresa = localStorage.getItem("emailEmpresa");
    const mensaje = document.getElementById("mensaje");
    const formularioProducto = document.getElementById("formularioProducto");

    if (emailEmpresa) {
        // Si hay una empresa registrada, muestra el formulario
        mensaje.style.display = "none";
        formularioProducto.style.display = "block";
    } else {
        // Si no hay empresa registrada, muestra el mensaje
        mensaje.style.display = "block";
        formularioProducto.style.display = "none";
    }
});

document.getElementById("formularioProducto").addEventListener("submit", function(event) {
    event.preventDefault(); 

    const emailEmpresa = localStorage.getItem("emailEmpresa");

    if (!emailEmpresa) {
        document.getElementById("mensaje").style.display = "block"; 
        return;
    }

    // Obtener los valores del formulario
    const nombre = document.getElementById("Nombre").value;
    const descripcion = document.getElementById("Descripcion").value;
    const precio = parseFloat(document.getElementById("Precio").value);
    const cantidad = parseInt(document.getElementById("Cantidad").value);
    const categoria = document.getElementById("Categoria").value;

    // Crear un objeto FormData para incluir las imágenes
    const formData = new FormData();
    formData.append("emailEmpresa", emailEmpresa);
    formData.append("Nombre", nombre);
    formData.append("Descripcion", descripcion);
    formData.append("Precio", precio);
    formData.append("Cantidad", cantidad);
    formData.append("Categoria", categoria);

    // Agregar las imágenes seleccionadas
    const imagenes = document.querySelectorAll('input[type="file"]');
    for (let i = 0; i < imagenes.length; i++) {
        const archivo = imagenes[i].files[0];
        if (archivo) {
            formData.append("imagenes[]", archivo);
        }
    }

    fetch("../../index.php?controller=Producto&action=agregarProducto", { 
        method: "POST",
        body: formData // Enviar el FormData que incluye los archivos
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message); 
            document.getElementById("formularioProducto").reset(); // Resetear el formulario
        } else {
            alert(data.message); 
        }
    })
    .catch(error => {
        console.error("Error al agregar el producto:", error);
        alert("Ocurrió un error al intentar agregar el producto.");
    });
});
