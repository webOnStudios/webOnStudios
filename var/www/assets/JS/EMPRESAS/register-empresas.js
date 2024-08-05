$("#registerbuton").click(validarFormulario);

function validarFormulario() {
    let nombre = $("#nombre").val();
    let contrasena = $("#contrasena").val();
    let telefono = $("#nickname").val();
    let email = $("#email").val();
    let CI = $("#CI").val();
    let terminos = $("#terminos").is(":checked");

    $("#mensajeerrorN").html(" ");
    $("#mensajeerrorP").html(" ");
    $("#mensajeerrorT").html(" ");
    $("#mensajeerrorE").html(" ");
    $("#mensajeerrorC").html(" ");
    $("#mensajeerrorCheck").html(" ");
    
    if (!nombre) {
        $("#mensajeerrorN").html("Por favor ingresa el nombre de la empresa.");
        return;
    }
    if (!contrasena) {
        $("#mensajeerrorP").html("Por favor ingresa una contraseña.");
        return;
    }
    if (!telefono) {
        $("#mensajeerrorT").html("Por favor ingresa tu teléfono.");
        return;
    }
    if (!email) {
        $("#mensajeerrorE").html("Por favor ingresa tu email empresarial.");
        return;
    }
    if (!CI) {
        $("#mensajeerrorC").html("Por favor ingresa la cédula de la empresa.");
        return;
    }
    if (!terminos) {
        $("#mensajeerrorCheck").html("Debes aceptar los términos y condiciones.");
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