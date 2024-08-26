$("#registerbuton").click(validarFormulario);

function validarFormulario() {
    let nickname = $("#nickname").val();
    let contrasena = $("#contraseña").val();

    $("#mensajeerror").html(""); 

    if (!nickname) {
        $("#mensajeerror").html("Por favor ingresa tu email empresarial.");
        return;
    }
    if (!contrasena) {
        $("#mensajeerror").html("Por favor ingresa tu contraseña.");
        return;
    }
}


$("#mostrartexto").click(CambiarTexto);

function CambiarTexto() {
    var passwordField = $("#contraseña");
    var fieldType = passwordField.attr("type");

    if (fieldType === "password") {
        passwordField.attr("type", "text");
    } else {
        passwordField.attr("type", "password");
    }
}