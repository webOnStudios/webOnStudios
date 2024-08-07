$("#guardar").click(validarFormularioAyuda);
function validarFormularioAyuda() {
    let nombre = $("#name").val();
    let email = $("#email").val();
    let problema = $("#issue").val();

    if (!nombre) {
        $("#mensajeerror").html("Por favor ingresa tu nombre.");
        return;
    }
    if (!email) {
        $("#mensajeerror").html("Por favor ingresa tu correo electrónico.");
        return;
    }
    if (!problema) {
        $("#mensajeerror").html("Por favor describe tu problema.");
        return;
    }

    $("#mensajeerror").html("Formulario enviado con éxito. Recibira su respuestas en las siguientes horas habiles"); 
}