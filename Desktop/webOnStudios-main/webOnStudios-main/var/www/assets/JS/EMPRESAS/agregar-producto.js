$("#publicar").click(validarFormulario);

function validarFormulario() {
    let productName = $("#productName").val();
    let productCategory = $("#productCategory").val();
    let productPrice = $("#productPrice").val();
    let productStock = $("#productStock").val();
    let productDescription = $("#productDescription").val();
    let productImages = $("#productImages").get(0).files.length;

    $("#mensajeError").html("");

    if (!productName) {
        $("#mensajeError").html("Por favor ingresa el nombre del producto.");
        return;
    }
    if (!productCategory) {
        $("#mensajeError").html("Por favor selecciona una categoría.");
        return;
    }
    if (!productPrice) {
        $("#mensajeError").html("Por favor ingresa el precio del producto.");
        return;
    }
    if (!productStock) {
        $("#mensajeError").html("Por favor ingresa el stock disponible.");
        return;
    }
    if (!productDescription) {
        $("#mensajeError").html("Por favor ingresa una descripción del producto.");
        return;
    }
    if (productImages === 0) {
        $("#mensajeError").html("Por favor sube al menos una imagen.");
        return;
    }
}