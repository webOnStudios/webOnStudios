document.addEventListener("DOMContentLoaded", function () {
    const emailEmpresa = localStorage.getItem("emailEmpresa");
    const mensaje = document.getElementById("mensaje");
    const formularioProducto = document.getElementById("formularioProducto");

    if (emailEmpresa) {

        mensaje.style.display = "none";
        formularioProducto.style.display = "block";
    } else {

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

    const nombre = document.getElementById("Nombre").value;
    const descripcion = document.getElementById("Descripcion").value;
    const precio = parseFloat(document.getElementById("Precio").value);
    const cantidad = parseInt(document.getElementById("Cantidad").value);
    const categoria = document.getElementById("Categoria").value;

    const formData = new FormData();
    formData.append("emailEmpresa", emailEmpresa);
    formData.append("Nombre", nombre);
    formData.append("Descripcion", descripcion);
    formData.append("Precio", precio);
    formData.append("Cantidad", cantidad);
    formData.append("Categoria", categoria);

    const imagenes = document.querySelectorAll('input[type="file"]');
    for (let i = 0; i < imagenes.length; i++) {
        const archivo = imagenes[i].files[0];
        if (archivo) {
            formData.append("imagenes[]", archivo);
        }
    }

    fetch("../../index.php?controller=Producto&action=agregarProducto", { 
        method: "POST",
        body: formData 
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message); 
            document.getElementById("formularioProducto").reset(); 
        } else {
            alert(data.message); 
        }
    })
    .catch(error => {
        console.error("Error al agregar el producto:", error);
        alert("Ocurrió un error al intentar agregar el producto.");
    });
});
