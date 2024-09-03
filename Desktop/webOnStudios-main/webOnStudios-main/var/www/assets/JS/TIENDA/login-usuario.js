$("#registerbuton").click(validarFormulario);

function validarFormulario() {
    let email = $("#nickname").val();
    let contrasena = $("#contrasena").val();

    $("#mensajeerrorN").html(""); 
    $("#mensajeerrorC").html(""); 


    if (!email) {
        $("#mensajeerrorN").html("Por favor ingresa tu nickname o email.");
        return;
    }
    if (!contrasena) {
        $("#mensajeerrorC").html("Por favor ingresa tu contraseña.");
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