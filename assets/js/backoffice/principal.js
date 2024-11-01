// Función para obtener empresas
async function obtenerEmpresas() {
    try {
        const response = await fetch('../../index.php?controller=Empresa&action=obtenerEmpresas'); // Ajusta la ruta
        const data = await response.json();
        
        if (data.success) {
            mostrarEmpresas(data.data);
        } else {
            console.error(data.message);
        }
    } catch (error) {
        console.error('Error al obtener empresas:', error);
    }
}

// Función para mostrar empresas en la tabla
function mostrarEmpresas(empresas) {
    const tablaEmpresas = document.getElementById('tablaEmpresas'); // Asegúrate de tener esta tabla en tu HTML
    tablaEmpresas.innerHTML = ''; // Limpiar tabla antes de agregar nuevos datos

    empresas.forEach(empresa => {
        const fila = document.createElement('tr');
        fila.innerHTML = `
            <td>${empresa.idEmpresa}</td>
            <td>${empresa.emailEmpresa}</td>
            <td>${empresa.cedulaEmpresa}</td>
            <td>${empresa.direccionEmpresa}</td>
            <td>${empresa.logo}</td>
        `;
        tablaEmpresas.appendChild(fila);
    });
}

// Función para obtener productos
async function obtenerProductos() {
    try {
        const response = await fetch('../../index.php?controller=Producto&action=obtenerProducto'); // Ajusta la ruta
        const data = await response.json();
        
        if (data.success) {
            mostrarProductos(data.data);
        } else {
            console.error(data.message);
        }
    } catch (error) {
        console.error('Error al obtener productos:', error);
    }
}

// Función para mostrar productos en la tabla
function mostrarProductos(productos) {
    const tablaProductos = document.getElementById('tablaProductos'); // Asegúrate de tener esta tabla en tu HTML
    tablaProductos.innerHTML = ''; // Limpiar tabla antes de agregar nuevos datos

    productos.forEach(producto => {
        const fila = document.createElement('tr');
        fila.innerHTML = `
            <td>${producto.idProducto}</td>
            <td>${producto.Nombre}</td>
            <td>${producto.Descripcion}</td>
            <td>${producto.Precio}</td>
            <td>${producto.Cantidad}</td>
            <td>${producto.Categoria}</td>
        `;
        tablaProductos.appendChild(fila);
    });
}

// Función para obtener usuarios
async function obtenerUsuarios() {
    try {
        const response = await fetch('../../index.php?controller=Usuario&action=obtenerUsuarios'); // Ajusta la ruta
        const data = await response.json();
        
        if (data.success) {
            mostrarUsuarios(data.data);
        } else {
            console.error(data.message);
        }
    } catch (error) {
        console.error('Error al obtener usuarios:', error);
    }
}

// Función para mostrar usuarios en la tabla
function mostrarUsuarios(usuarios) {
    const tablaUsuarios = document.getElementById('tablaUsuarios'); // Asegúrate de tener esta tabla en tu HTML
    tablaUsuarios.innerHTML = ''; // Limpiar tabla antes de agregar nuevos datos

    usuarios.forEach(usuario => {
        const fila = document.createElement('tr');
        fila.innerHTML = `
            <td>${usuario.idUsuario}</td>
            <td>${usuario.emailUsuario}</td>
            <td>${usuario.cedulaUsuario}</td>
            <td>${usuario.nombreUsuario}</td>
            <td>${usuario.apellidoUsuario}</td>
        `;
        tablaUsuarios.appendChild(fila);
    });
}

// Llamar a las funciones para obtener y mostrar datos
obtenerEmpresas();
obtenerProductos();
obtenerUsuarios();
