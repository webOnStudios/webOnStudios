const nombre = localStorage.getItem('nombreEmpresa');
if (nombre) {
    document.getElementById('nombreEmpresa').textContent = (nombre);
} else {
    document.getElementById('nombreEmpresa').textContent = (' ');
}

document.getElementById('logoutBtn').addEventListener('click', function() {
    localStorage.removeItem('emailEmpresa'); 
    localStorage.removeItem('nombreEmpresa'); 
    window.location.href = 'login.html'; 
});


document.addEventListener('DOMContentLoaded', async function() {
    const email = localStorage.getItem('emailEmpresa'); 

    try {
        const response = await fetch('../../index.php?controller=Empresa&action=obtenerDatos', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ email }) 
        });

        const result = await response.json();

        if (result.status === 'success') {
            const { Root_CI, Nombre, Apellido, Email, Direccion, Logo } = result.data;
            document.getElementById('ci').textContent = Root_CI;
            document.getElementById('nombre').textContent = Nombre;
            document.getElementById('direccion').textContent = Direccion;
            document.getElementById('email').textContent = Email;

            const logoElement = document.getElementById('empresaLogo');
            if (Logo) {
                logoElement.src = `../../img/empresa/${Logo}`;
            } else {
                logoElement.src = '../../assets/img/blank-profile.png';
            }
        } else {
            document.getElementById('message').innerText = result.message;
        }
    } catch (error) {
        console.error('Error en la solicitud:', error);
        document.getElementById('message').innerText = 'Hubo un error al obtener los datos de la empresa';
    }

    try {
        const response = await fetch('../../index.php?controller=Producto&action=obtenerProductosPorEmpresa', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ emailEmpresa: email }) 
        });

        const result = await response.json();

        if (result.success) {
            const productos = result.data;
            const tablaProductos = document.getElementById('tablaProductos');

            // Crear cabecera de la tabla
            tablaProductos.innerHTML = `
                <h2>Todos sus productos</h2>
                <br><br>
                <table border="1">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Categoría</th>
                            <th>Imagenes</th> 
                        </tr>
                    </thead>
                    <tbody id="tablaCuerpo">
                    </tbody>
                </table>
            `;

            // Obtener el cuerpo de la tabla
            const tablaCuerpo = document.getElementById('tablaCuerpo');

            // Crear y agregar filas a la tabla
            productos.forEach(producto => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${producto.Nombre}</td>
                    <td>${producto.Descripcion}</td>
                    <td>$${producto.Precio}</td>
                    <td>${producto.Cantidad}</td>
                    <td>${producto.Categoria}</td>
                    <td><img src="../../img/producto/${producto.fotoPath}" alt="Foto del producto" width="100" /></td> 
                `;
                tablaCuerpo.appendChild(row);
            });

        } else {
            document.getElementById('tablaProductos').innerText = result.message;
        }
    } catch (error) {
        console.error('Error al obtener los productos:', error);
    }
});


