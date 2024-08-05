$("#guardar").click(validarFormularioAyuda);
function validarFormularioAyuda() {

    let name = $("#name").val();
    let email = $("#email").val();
    let issue = $("#issue").val();

    $("#mensajeError").html(""); 

    if (!name) {
        $("#mensajeError").html("Por favor ingresa tu nombre.");
        return;
    }
    if (!email) {
        $("#mensajeError").html("Por favor ingresa tu correo electrónico.");
        return;
    }
    if (!issue) {
        $("#mensajeError").html("Por favor describe tu problema.");
        return;
    }

}