function validarFormulario(){
    var grado = $("#grados").val();
    var apellidos = $("#apellidos").val();
    var nombres = $("#nombres").val();
    var dni = $("#dni").val();
    var edad = $("#edad").val();
    var sexo = $("input[name='sexo']:checked").val();
    var fechaNacimiento = $("#fechaNacimiento").val();
    var domicilio = $("#domicilio").val();

    resetearEstilos();

    if(grado=== ""){
        mostrarError("grados", "Selecciona un grado");
    } else{
        aplicarEstiloValido("grados");
    }

    if (nombres === "") {
        mostrarError("nombres", "ingresa tus nombres.");
    } else{
        aplicarEstiloValido("nombres");
    }

    if (apellidos === "") {
        mostrarError("apellidos", "ingresa tus apellidos.");
    } else{
        aplicarEstiloValido("apellidos");
    }

    if (!validarEdad(edad)) {
        mostrarError("edad", "El campo Edad debe tener entre 18 y 100 años y solo permitir números.");
    } else{
        aplicarEstiloValido("edad");
    }

    if (!validarDomicilio(domicilio)) {
        mostrarError("domicilio", "El campo Domicilio debe ser alfanumérico y tener un máximo de 50 caracteres.");
    } else{
        aplicarEstiloValido("domicilio");
    }

    if (!validarDNI(dni)) {
        mostrarError("dni","El campo DNI debe tener entre 8 y 9 caracteres y solo permitir números.");
    } else{
        aplicarEstiloValido("dni");
    }

    if(todosLosCamposSonValidos()){
        enviarFormulario();
    } else{
        alert("Por favor complete los campos.")
    }
}

$(document).ready(function() {
    // Inicializar airDatepicker para el campo de fecha de nacimiento
    $('#fechaNacimiento').datepicker({
        format: 'yyyy-mm-dd',
        startDate: '1900-01-01',
        endDate: new Date(), // Fecha máxima permitida (hoy)
        language: 'es',
    });
});

function resetearEstilos(){
    $("input, select").removeClass("valido invalido");
}


function mostrarError(campoId, mensaje) {
    $("#" + campoId).addClass("invalido");
    alert(mensaje); // Puedes personalizar el manejo del mensaje de error según tus necesidades
}


function aplicarEstiloValido(campoId){
    $("#" + campoId).addClass("valido");
}

function validarEdad(fechaSeleccionada) {
    var fechaNacimiento = new Date(fechaSeleccionada);
    var hoy = new Date();
    var edad = hoy.getFullYear() - fechaNacimiento.getFullYear();


    if (edad < 18 || edad > 100) {
        alert("La edad debe estar entre 18 y 100 años.");
        
        $('#fechaNacimiento').val('');
    }
}

function validarDomicilio(domicilio) {
   
    var domicilioRegex = /^[a-zA-Z0-9\s]{1,50}$/;
    return domicilioRegex.test(domicilio);
}

function validarDNI(){
    var dniRegex = /^[0-9]{8,9}$/;
    return dniRegex.test(dni);
}


function todosLosCamposSonValidos() {

    return $("input, select").filter(".valido").length === $("input, select").length;
}

$('#Enviar').click(function(){
    var datos = $("#myForm").serialize();

    ajax({
        url: 'archivo_php.php',
        type: 'POST',
        data: datos,
    })

    .done(function(res){
        $('#respuesta').html(res)
    })
} )

/* function enviarFormulario() {
    var datos = $("#myForm").serialize();

    $.ajax({
        data: datos,
        url: 'http://localhost/ministerio-main/archivo_php.php',
        type: 'post',
        success: function (response){
            alert("El formulario fue enviado con exito");
        }
    });
} */