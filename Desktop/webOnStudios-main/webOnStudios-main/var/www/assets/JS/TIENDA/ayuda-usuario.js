$("#guardar").click(validarFormularioAyuda);

function validarFormularioAyuda() {

    let nombre = $("#name").val();
    let email = $("#email").val();
    let issue = $("#problemas").val();

    $("#mensajeErrorN").html(""); 
    $("#mensajeErrorE").html(""); 
    $("#mensajeErrorI").html(""); 

    if (!nombre) {
        $("#mensajeErrorN").html("Por favor ingresa tu nombre.");
        return;
    }
    if (!email) {
        $("#mensajeerrorE").html("Por favor ingresa tu email.");
        return;
    }

    if (!issue) {
        $("#mensajeErrorI").html("Por favor describe tu problema.");
        return;
    }

}