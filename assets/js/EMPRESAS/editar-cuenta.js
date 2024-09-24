$("#actualizar").click(validarFormularioEmpresa);
function validarFormularioEmpresa() {


    let nombreEmpresa = $("#nombreEmpresa").val();
    let emailEmpresa = $("#emailEmpresa").val();
    let telefonoEmpresa = $("#telefonoEmpresa").val();

    $("#mensajeErrorEmpresa").html(""); 

    if (!nombreEmpresa) {
        $("#mensajeErrorEmpresa").html("Por favor ingresa el nombre de la empresa.");
        return;
    }
    if (!emailEmpresa) {
        $("#mensajeErrorEmpresa").html("Por favor ingresa el correo electrónico de la empresa.");
        return;
    }
    if (!telefonoEmpresa) {
        $("#mensajeErrorEmpresa").html("Por favor ingresa el teléfono de la empresa.");
        return;
    }


}


$("#guardar").click(validarFormularioProducto);

function validarFormularioProducto() {
    let nombre = $("#nombre").val();
    let precio = $("#precio").val();
    let descripcion = $("#descripcion").val();
    let categoria = $("#categoria").val();

    $("#mensajeerror-p").html(""); 

    if (!nombre) {
        $("#mensajeerror-p").html("Por favor ingresa el nombre del producto.");
        return;
    }
    if (!precio) {
        $("#mensajeerror-p").html("Por favor ingresa el precio del producto.");
        return;
    }
    if (!descripcion) {
        $("#mensajeerror-p").html("Por favor ingresa una descripción del producto.");
        return;
    }
    if (!categoria) {
        $("#mensajeerror-p").html("Por favor ingresa la categoría del producto.");
        return;
    }
}