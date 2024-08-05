$("#registerbuton").click(validarFormulario);

function validarFormulario() {
    let nombre = $("#nombre").val();
    let contrasena = $("#contrasena").val();
    let telefono = $("#nickname").val();
    let email = $("#email").val();
    let CI = $("#CI").val();
    let terminos = $("#terminos").is(":checked");

    if (!nombre) {
        $("#mensajeerrorN").html("Por favor ingresa el nombre de la empresa.");
        return;
    }
    if (!contrasena) {
        $("#mensajeerror").html("Por favor ingresa una contraseña.");
        return;
    }
    if (!telefono) {
        $("#mensajeerror").html("Por favor ingresa tu teléfono.");
        return;
    }
    if (!email) {
        $("#mensajeerror").html("Por favor ingresa tu email empresarial.");
        return;
    }
    if (!CI) {
        $("#mensajeerror").html("Por favor ingresa la cédula de la empresa.");
        return;
    }
    if (!terminos) {
        $("#mensajeerror").html("Debes aceptar los términos y condiciones.");
        return;
    }
}

$("#mostrartexto").click(CambiarTexto);

function CambiarTexto() {
    var passwordField = $("#contrasena");
    var fieldType = passwordField.attr("type");

    if (fieldType === "password") {
        passwordField.attr("type", "text");
    } else {
        passwordField.attr("type", "password");
    }
}
function limitarCaracteres(event) {
    let input = event.target;
    if (input.value.length > 8) {
        input.value = input.value.slice(0, 8);
    }
}