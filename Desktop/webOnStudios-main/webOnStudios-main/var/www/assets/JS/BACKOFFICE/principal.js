$("#guardar-u").click(validarUsuario);

$("#listarUsuarios").click(listarUsuarios);

function listarUsuarios() {
    $.ajax({
        url: '/controlador/usuarioController.php', // Ruta accesible desde el navegador
        type: 'POST',
        data: { accion: 'listar' },
        dataType: 'json',
        success: function(response) {
            if (Array.isArray(response)) {
                let usuariosHtml = '';
                response.forEach(usuario => {
                    usuariosHtml += `
                        <tr>
                            <td>${usuario.cedulaUsuario}</td>
                            <td>${usuario.nicknameUsuario}</td>
                            <td>${usuario.emailUsuario}</td>
                            <td>${usuario.nombreUsuario}</td>
                            <td>${usuario.apellidoUsuario}</td>
                            <td>${usuario.fechaNacUsuario}</td>
                        </tr>
                    `;
                });
                $("#usuariosTable tbody").html(usuariosHtml);
            } else {
                console.error("Error al listar los usuarios: " + response.mensaje);
            }
        },
        error: function(xhr, status, error) {
            console.error("Error en la solicitud AJAX: " + error);
        }
    });
}
function validarUsuario() {
    let nombre = $("#nombre-u").val();
    let apellido = $("#apellido-u").val();
    let nickname = $("#nickname-u").val();
    let email = $("#email-u").val();
    let contrasena = $("#contrasena-u").val();
    let ci = $("#CI-u").val();
    let fecha = $("#fecha-u").val();

    $("#mensajeerror-u").html("");

    if (!nombre) {
        $("#mensajeerror-u").html("Por favor ingresa el nombre.");
        return;
    }
    if (!apellido) {
        $("#mensajeerror-u").html("Por favor ingresa el apellido.");
        return;
    }
    if (!nickname) {
        $("#mensajeerror-u").html("Por favor ingresa el nickname.");
        return;
    }
    if (!email) {
        $("#mensajeerror-u").html("Por favor ingresa el correo electrónico.");
        return;
    }
    if (!contrasena) {
        $("#mensajeerror-u").html("Por favor ingresa la contraseña.");
        return;
    }
    if (!ci) {
        $("#mensajeerror-u").html("Por favor ingresa la cédula.");
        return;
    }
    if (!fecha) {
        $("#mensajeerror-u").html("Por favor ingresa la fecha de nacimiento.");
        return;
    }
}

$("#guardar-p").click(validarProducto);

function validarProducto() {
    let productName = $("#nombre-p").val();
    let productPrice = $("#precio-p").val();
    let productDescription = $("#descripcion-p").val();
    let productCategory = $("#categoria-p").val();

    $("#mensajeerror-p").html("");

    if (!productName) {
        $("#mensajeerror-p").html("Por favor ingresa el nombre del producto.");
        return;
    }
    if (!productPrice) {
        $("#mensajeerror-p").html("Por favor ingresa el precio del producto.");
        return;
    }
    if (!productDescription) {
        $("#mensajeerror-p").html("Por favor ingresa una descripción del producto.");
        return;
    }
    if (!productCategory) {
        $("#mensajeerror-p").html("Por favor ingresa la categoría del producto.");
        return;
    }
}

$("#guardar-e").click(validarEmpresa);

function validarEmpresa() {
    let nombre = $("#nombre-e").val();
    let ci = $("#CI-e").val();
    let telefono = $("#telefono-e").val();
    let email = $("#email-e").val();
    let direccion = $("#direccion-e").val();

    $("#mensajeerror-e").html("");

    if (!nombre) {
        $("#mensajeerror-e").html("Por favor ingresa el nombre de la empresa.");
        return;
    }
    if (!ci) {
        $("#mensajeerror-e").html("Por favor ingresa la cédula de la empresa.");
        return;
    }
    if (!telefono) {
        $("#mensajeerror-e").html("Por favor ingresa el teléfono de la empresa.");
        return;
    }
    if (!email) {
        $("#mensajeerror-e").html("Por favor ingresa el correo electrónico de la empresa.");
        return;
    }
    if (!direccion) {
        $("#mensajeerror-e").html("Por favor ingresa la dirección de la empresa.");
        return;
    }
}