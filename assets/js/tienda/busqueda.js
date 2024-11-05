document.addEventListener("DOMContentLoaded", function() {
    const urlParams = new URLSearchParams(window.location.search);
    const nombre = urlParams.get("nombre");

    if (nombre) {
        fetch("../../index.php?controller=Producto&action=buscarProductoPorNombre", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ nombre: nombre })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                mostrarResultados(data.data);
            } else {
                document.getElementById("resultados").innerText = "No se encontraron productos";
            }
        })
        .catch(error => console.error("Error:", error));
    }

    function mostrarResultados(productos) {
        const resultadosDiv = document.getElementById("resultados");
        resultadosDiv.innerHTML = "";

        productos.forEach(producto => {
            const productoDiv = document.createElement("section");
            productoDiv.className = "product-card d-flex";
            productoDiv.id = "producto";

            productoDiv.innerHTML = `
                <section class="row" id="producto">
                    <article class="col md-2">
                        <img src="${producto.imagen || '../../assets/img/default.jpg'}" class="producto-imagen" width="200" alt="${producto.Nombre}">
                    </article>
                    <article class="col md-5">
                        <h4>${producto.Nombre}</h4>
                        <h4>$${producto.Precio}</h4>
                        <p>${producto.Descripcion}</p>
                    </article>
                    <article class="col md-5">
                        <button class="btn btn-megusta" data-id="${producto.idProducto}">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAfVJREFUSEuVVttBwzAQkzxJOgntJJRJgEkok6SbkEks8Cvx41zAP01s53TSvUrsiwB0vJpP9Z32fnzLW8cJwb+YjVi1hRrcMgplVy2AXxBnx8N+dij85EUwI0s6C3gmcAa0CQSFTzp3CzJKugJ4EnAmsAUDAj4deWuVDTa7GEhaEQ3nkFQ3fvbv+XoARgSuLQo3UO+k25KkSdl9eWlNXhsrxL+zNgCkz94c+V7SZf9E8meAa4xO2c3Px1a7YVwtnr0wy1UB6APANQEM7pqUbAbx2xvJl+BpDSDb7EAjlYvlxGHgTvLSAfgvgUtCnOmUA2tI17HZSJ5K+UTN5f2HwOsIkNXJXk8CW0kYnbi7yABHJUt6DRlgZtCjTVvBiyNjSieHc9VJPgW6LCMoD3MgHd4d3aVN01wUkhYIK6ilS/papzkfYaNL2u+F1nQ+CD6AIFQzl9FSS6kj2AQ2MegqvSDL+8AgtIwOpM2uKuDJ+NBZbR0ispcPKRtBhkquqUVZ3Kk0yv2o6UVGT89dMzBITOwq3GWZBabKInumSH4RuFJYQvUOsgyWc9tv5oExReoBFrOrMEkGN9Kd7BHbylGNzBlKYpayC2tQysU28Mvoe5RFs9kfmJBshknzN2HiY1Zx7lEt1/9aSamDSRYVYzW07cYxz/s0/Qbx5Pkjtz3MCAAAAABJRU5ErkJggg==" alt="Heart">
                        </button>
                        <button class="btn btn-carrito" data-id="${producto.idProducto}">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAjlJREFUSEuFVcuB6jAMnHEl0Al0slx3i4BXxHJdOoFOoBLPixQnlmOz60O+iqX5SCHCIgCVe78uB0LttcfE6O3dsinBulFMVT5497INHd+V/HZaV62JiFVXXC08jxmgiY/WBJLmWOEF6kamf01pka53CELVld4SvCaoHx+Z+CjkD1BG3ls9tqysuA1ylj4A/AB4MPG4qh6+UpZMY5LG5eKGIa5GA2coawfqaTsQOJJ8bGle0HqCwWq17B0HKf8ANCSmxclFDvxmRyBMOpUE0RTRgfN1tyTtADxNcCbuHZmbwFwzs7IuswaFxMSlh6Iv39gUpsWdwgHEieRtSdDV5AmARDJLpt2HgFtKPC3Ao7lrYVXsVyL3i+0cRUHjVQeRJT0nWncC9ol8LewP1V9pchuxiD0LMRJZa0F6kOm4bBooaoUqvJ+n82UWmyfjoljZ9Yi8S7pP1j4AOCWjNPAybKKSYBYbeJEmdmzVtp2k7HODJsY6NDeG2Prd9lPWXcBhssiFycbHxisek8+Tuy4sSLdTudVgM3MkHQSYo6qBijWjZctr16pP8Mcgy9J5CjEt5hWT1UePFEfLwmY3ooem3RhtMNuqW/uubreMw6tslKVvCp+grmT6iha0dwA+BVxT4tdo+g76oGUxK3s/eeOsE3SWZKLPVbdDSjQXNytYqh9Sy99Kyl4lgCvJFkHWN1gQ+Lv2r9PPonf8DrSJvNeJ+0uCjqvOXUXA2DB/Cu7E9n+lrrqBUl2egd3/A3dvTjDNEI4KAAAAAElFTkSuQmCC" alt="Cart">
                        </button>
                    </article>
                </section>
            `;

            resultadosDiv.appendChild(productoDiv);
            productoDiv.addEventListener("click", function() {
                window.location.href = `producto.html?id=${producto.idProducto}`;
            });
            // Función para 'Me Gusta'
            const botonMeGusta = productoDiv.querySelector(".btn-megusta");
            botonMeGusta.addEventListener("click", function() {
                const idProducto = botonMeGusta.getAttribute("data-id");

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
                        alert("Producto agregado al carrito"); // Muestra el mensaje de éxito
                    } else {
                        alert(data.message || "Error al agregar el producto al carrito.");
                    }
                })
                .catch(error => console.error("Error al agregar al carrito:", error));
            });

        });
    }
});


document.getElementById('busqueda-form').addEventListener('submit', function(event) {
    event.preventDefault(); 

    const nombre = this.buscar.value; 

    window.location.href = `busqueda.html?nombre=${encodeURIComponent(nombre)}`;
});