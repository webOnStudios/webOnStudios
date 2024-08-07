
$("#mostrartexto").click(CambiarTexto);
$("#registerbuton").click(validarFormulario);

function CambiarTexto() {
    console.log("CambiarTexto fue llamado");
    var passwordField = $("#contrasena");
    var fieldType = passwordField.attr("type");
    
    if (fieldType === "password") {
        passwordField.attr("type", "text");
    } else {
        passwordField.attr("type", "password");
    }
}

function validarFormulario() {
    let nombre = $("#nombre").val();
    let apellido = $("#apellido").val();
    let nickname = $("#nickname").val();
    let contrasena = $("#contrasena").val();
    let email = $("#email").val();
    let CI = Number($("#CI").val());
    let fechaNac = $("#fechaNac").val();
    let terminos = $("#terminos").is(":checked");

    if (!nombre) {
        $("#mensajeerror").html("Por favor ingresa tu nombre.");
        return;
    }
    if (!apellido) {
        $("#mensajeerror").html("Por favor ingresa tu apellido.");
        return;
    }
    if (!nickname) {
        $("#mensajeerror").html("Por favor ingresa tu nickname.");
        return;
    }
    if (!contrasena) {
        $("#mensajeerror").html("Por favor ingresa tu contraseña.");
        return;
    }
    if (!email) {
        $("#mensajeerror").html("Por favor ingresa tu email.");
        return;
    }
    if (!CI) {
        $("#mensajeerror").html("Por favor ingresa tu CI.");
        return;
    }
    if (!fechaNac) {
        $("#mensajeerror").html("Por favor selecciona tu fecha de nacimiento.");
        return;
    }
    if (!terminos) {
        $("#mensajeerror").html("Debes aceptar los términos y condiciones.");
        return;
    }
}


function limitarCaracteres(event) {
const input = event.target;
if (input.value.length > 8) {
    input.value = input.value.slice(0, 8); 
}
}
