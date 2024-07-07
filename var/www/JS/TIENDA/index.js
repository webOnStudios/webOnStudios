$("#mostrartexto").click(CambiarTexto);
function CambiarTexto(){
    var passwordField = $('#contrasena');
    var fieldType = passwordField.attr('type');
    
    if (fieldType === 'password') {
        passwordField.attr('type', 'text');
    } else {
        passwordField.attr('type', 'password');
    }

}
function limitarCaracteres(event) {
    const input = event.target;
    const maxLength = 8;
    const value = input.value;

    if (value.length > maxLength) {
        $("#mensaje").append("el CI no debe superar los 8 caracteres")
    }
}