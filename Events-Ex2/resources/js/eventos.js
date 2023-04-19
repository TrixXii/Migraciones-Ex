function mostrarFormulario() {
    document.getElementById('alerta-eliminar').style.display = 'block';
}

function ocultarFormulario() {
    document.getElementById('alerta-eliminar').style.display = 'none';
}

function eliminar() {
    document.getElementById('formulario-eliminar').submit();
}