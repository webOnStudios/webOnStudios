
$("#registerbuton").click(validarFormulario);

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
function validarFormulario() {
    let nombre = $("#nombre").val();
    let apellido = $("#apellido").val();
    let nickname = $("#nickname").val();
    let contrasena = $("#contrasena").val();
    let email = $("#email").val();
    let CI = $("#CI").val();
    let fechaNac = $("#fechaNac").val();
    let terminos = $("#terminos").is(":checked");

    $("#mensajeerrorN").html(" ");
    $("#mensajeerrorNA").html(" ");
    $("#mensajeerrorC").html(" ");
    $("#mensajeerrorE").html(" ");
    $("#mensajeerrorCI").html(" ");
    $("#mensajeerrorF").html(" ");
    $("#mensajeerrorCheck").html(" ");

    if (!nombre) {
        $("#mensajeerrorNA").html("Por favor ingresa tu nombre.");
        return;
    }
    if (!apellido) {
        $("#mensajeerrorNA").html("Por favor ingresa tu apellido.");
        return;
    }
    if (!nickname) {
        $("#mensajeerrorN").html("Por favor ingresa tu nickname.");
        return;
    }
    if (!contrasena) {
        $("#mensajeerrorC").html("Por favor ingresa tu contraseña.");
        return;
    }
    if (contrasena.length<8) {
        $("#mensajeerrorC").html("La contraseña debe tener al menos 8 caracteres");
        return;
    }

    let tieneNumero = false;
    let tieneMayuscula = false;
    
    for (let i = 0; i < contrasena.length; i++) {
        if (contrasena[i] >= '0' && contrasena[i] <= '9') {
            tieneNumero = true;
        }
        if (contrasena[i] >= 'A' && contrasena[i] <= 'Z') {
            tieneMayuscula = true;
        }
        if (tieneNumero && tieneMayuscula) {
            break;
        }
    }
    
    if (!tieneNumero) {
        $("#mensajeerrorC").html("La contraseña debe contener al menos un número.");
        return;
    }
    
    if (!tieneMayuscula) {
        $("#mensajeerrorC").html("La contraseña debe contener al menos una letra mayúscula.");
        return;
    }
    
    if (!email) {
        $("#mensajeerrorE").html("Por favor ingresa tu email.");
        return;
    }
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(email)) {
        $("#mensajeerrorE").html("Por favor ingresa un email válido.");
        return;
    }

    if (!CI) {
        $("#mensajeerrorCI").html("Por favor ingresa tu CI.");
        return;
    }
    /*if (CI.length !== 8) {
        $("#mensajeerrorC").html("La cédula debe tener exactamente 8 dígitos.");
        return;
    }
    let mult = (parseInt(CI[0], 10)*2)+(parseInt(CI[1], 10)*9)+(parseInt(CI[2], 10)*8)+(parseInt(CI[3],10)*7)+(parseInt(CI[4],10)*6)+(parseInt(CI[5],10)*3)+(parseInt(CI[6],10)*4);
    let residuo = mult%10;
    let nummult = (residuo - 10) % 10;

    let numfin = parseInt(CI[7], 10);
    if(nummult != numfin){
        $("#mensajeerrorCI").html("Debes poner una cédula válida");
        return;
    }
    */
    if (!fechaNac) {
        $("#mensajeerrorF").html("Por favor selecciona tu fecha de nacimiento.");
        return;
    }
    if (!terminos) {
        $("#mensajeerrorCheck").html("Debes aceptar los términos y condiciones.");
        return;
    }

}
function limitarCaracteres(event) {
    const input = event.target;
    if (input.value.length > 8) {
        input.value = input.value.slice(0, 8); 
    }
}
