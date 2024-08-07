$("#loginButton").click(validarFormulario);

function validarFormulario(event) {
    let email = $("#email").val();
    let password = $("#password").val();

    $("#mensajeError").html(""); 

    if (!email) {
        $("#mensajeError").html("Por favor ingresa tu correo electrónico.");
        return;
    }
    if (!password) {
        $("#mensajeError").html("Por favor ingresa tu contraseña.");
        return;
    }

}