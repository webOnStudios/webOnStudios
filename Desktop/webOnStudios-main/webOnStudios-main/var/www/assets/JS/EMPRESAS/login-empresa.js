$("#registerbuton").click(validarFormulario);

function validarFormulario() {
    let email = $("#email").val();
    let contrasena = $("#contraseña").val();

    $("#mensajeerrorE").html(""); 
    $("#mensajeerrorC").html(""); 


    if (!email) {
        $("#mensajeerrorE").html("Por favor ingresa tu email empresarial.");
        return;
    }
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(email)) {
        $("#mensajeerrorE").html("Por favor ingresa un email válido.");
        return;
    }
    
    if (!contrasena) {
        $("#mensajeerrorC").html("Por favor ingresa tu contraseña.");
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