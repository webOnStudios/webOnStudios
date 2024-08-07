$("#mostrartexto").click(CambiarTexto);
$("#registerbuton").click(validarFormulario);


function CambiarTexto() {
var passwordField = $("#contrasena");
var fieldType = passwordField.attr("type");

if (fieldType === "password") {
    passwordField.attr("type", "text");
} else {
    passwordField.attr("type", "password");
}
}

function validarFormulario() {
let nickname = $("#nickname").val();
let contrasena = $("#contrasena").val();

if (!nickname) {
    $("#mensajeerror").html("Por favor ingresa tu nickname o email.");
    return;
}
if (!contrasena) {
    $("#mensajeerror").html("Por favor ingresa tu contraseña.");
    return;
}
}
