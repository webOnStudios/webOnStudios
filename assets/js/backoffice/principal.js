// Función para cargar los datos de la empresa
async function cargarDatosEmpresa() {
    try {
        const response = await fetch('../../index.php?controller=Empresa&action=obtenerEmpresas');
        const result = await response.json();

        if (result.success) {
            const empresas = result.data;
            const tablaEmpresa = document.querySelector('#tabla-empresa tbody');
            tablaEmpresa.innerHTML = '';

            empresas.forEach(empresa => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${empresa.idEmpresa}</td>
                    <td>${empresa.Email}</td>
                    <td>${empresa.Root_CI}</td>
                    <td>********</td>
                    <td>${empresa.Direccion}</td>
                    <td><img src="../../img/empresa/${empresa.Logo}" alt="Logo" width="50"></td>
                    <td>${empresa.Nombre}</td>
                    <td>${empresa.suspendido}</td>
                    <td>${empresa.idPaypal}</td>
                    <td>
                        <button class="btn btn-primary btn-sm" onclick="editarEmpresa(${empresa.idEmpresa})">Editar</button>
                        <button class="btn btn-danger btn-sm" onclick="suspenderEmpresa(${empresa.idEmpresa})">Suspender</button>
                    </td>
                `;
                tablaEmpresa.appendChild(row);
            });
        }
    } catch (error) {
        console.error('Error al cargar datos de empresa:', error);
    }
}

// Función para cargar los datos de los productos
async function cargarDatosProducto() {
    try {
        const response = await fetch('../../index.php?controller=Producto&action=obtenerProductos');
        const result = await response.json();

        if (result.success) {
            const productos = result.data;
            const tablaProducto = document.querySelector('#tabla-producto tbody');
            tablaProducto.innerHTML = '';

            productos.forEach(producto => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${producto.idProducto}</td>
                    <td>$${producto.Precio}</td>
                    <td>${producto.Nombre}</td>
                    <td>${producto.Descripcion}</td>
                    <td>${producto.Cantidad}</td>
                    <td>${producto.Categoria}</td>
                    <td>${producto.suspendido}</td>
                    <td>
                        <button class="btn btn-primary btn-sm" onclick="editarProducto(${producto.idProducto})">Editar</button>
                        <button class="btn btn-danger btn-sm" onclick="suspenderProducto(${producto.idProducto})">Suspender</button>
                    </td>
                `;
                tablaProducto.appendChild(row);
            });
        }
    } catch (error) {
        console.error('Error al cargar datos de producto:', error);
    }
}

// Función para cargar los datos de los usuarios
async function cargarDatosUsuarios() {
    try {
        const response = await fetch('../../index.php?controller=Usuario&action=obtenerUsuarios');
        const result = await response.json();

        if (result.success) {
            const usuarios = result.data;
            const tablaUsuarios = document.querySelector('#tabla-usuarios tbody');
            tablaUsuarios.innerHTML = '';

            usuarios.forEach(usuario => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${usuario.IdUsuario}</td>
                    <td>${usuario.Email}</td>
                    <td>${usuario.CI}</td>
                    <td>${usuario.Nombre}</td>
                    <td>${usuario.Apellido}</td>
                    <td>********</td>
                    <td>${usuario.suspendido}</td>
                    <td>
                        <button class="btn btn-primary btn-sm" onclick="editarUsuario(${usuario.IdUsuario})">Editar</button>
                        <button class="btn btn-danger btn-sm" onclick="suspenderUsuario(${usuario.IdUsuario})">Suspender</button>
                    </td>
                `;
                tablaUsuarios.appendChild(row);
            });
        }
    } catch (error) {
        console.error('Error al cargar datos de usuarios:', error);
    }
}

// Funciones para editar y suspender

async function editarEmpresa(id) {
    // Implementa la lógica para editar empresa usando el ID
    // Podría abrir un formulario modal para la edición
    console.log(`Editar empresa con ID: ${id}`);
}

async function suspenderEmpresa(id) {
    try {
        const response = await fetch('../../index.php?controller=Empresa&action=suspenderEmpresa', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ idEmpresa: id })
        });
        const result = await response.json();
        if (result.success) {
            alert("Empresa suspendida correctamente.");
            cargarDatosEmpresa();
        } else {
            alert("Error al suspender la empresa.");
        }
    } catch (error) {
        console.error("Error al suspender la empresa:", error);
    }
}

// Implementa las funciones suspenderProducto, suspenderUsuario, editarProducto, y editarUsuario de manera similar...

// Llamadas a las funciones al cargar el DOM
document.addEventListener('DOMContentLoaded', () => {
    cargarDatosEmpresa();
    cargarDatosProducto();
    cargarDatosUsuarios();
});
