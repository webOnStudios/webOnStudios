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
    if (contrasena.length<8) {
        $("#mensajeerrorP").html("La contraseña debe tener al menos 8 caracteres");
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
        $("#mensajeerrorP").html("La contraseña debe contener al menos un número.");
        return;
    }
    
    if (!tieneMayuscula) {
        $("#mensajeerrorP").html("La contraseña debe contener al menos una letra mayúscula.");
        return;
    }
    if (!telefono) {
        $("#mensajeerrorT").html("Por favor ingresa tu teléfono.");
        return;
    }
    if(telefono.length !== 9){
        $("#mensajeerrorT").html("Por favor ingresa un teléfono válido.");
        return;
    }
    const regex = /^09\d{7}$/;

    if(regex.test(telefono)){
        $("#mensajeerrorE").html("Por favor ingresa un teléfono válido.");
        return;
    }
    if (!email) {
        $("#mensajeerrorE").html("Por favor ingresa tu email empresarial.");
        return;
    }
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(email)) {
        $("#mensajeerrorE").html("Por favor ingresa un email válido.");
        return;
    }
    if (!CI) {
        $("#mensajeerrorC").html("Por favor ingresa la cédula de la empresa.");
        return;
    }
    if (!CI) {
        $("#mensajeerrorC").html("Por favor ingresa la cédula de la empresa.");
        return;
    }

    if (CI.length !== 12) {
        $("#mensajeerrorC").html("La cédula debe tener exactamente 12 dígitos.");
        return;
    }

    let mult = (parseInt(CI[0], 10)*2)+(parseInt(CI[1], 10)*9)+(parseInt(CI[2], 10)*8)+(parseInt(CI[3],10)*7)+(parseInt(CI[4],10)*6)+(parseInt(CI[5],10)*3)+(parseInt(CI[6],10)*4)+parseInt(CI[7],10)+(parseInt(CI[8],10)*2)+(parseInt(CI[9],10)*9)+(parseInt(CI[10],10)*8);
    let residuo = mult%11;
    let nummult;
    if(residuo=0){
        nummult=0;
    }else if(residuo=1){
        nummult=1;
    }else{
        nummult= 11-residuo;
    }

    let numfin = parseInt(CI[11],10);
    if(nummult != numfin){
        $("#mensajeerrorC").html("Debes poner una cédula válida");
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
    if (input.value.length > 12) {
        input.value = input.value.slice(0, 12);
    }
}