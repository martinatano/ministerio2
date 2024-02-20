<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <title>Document</title>
</head>

<body>
    <header>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="./index.html">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/7/72/Escudo_del_Ejército_Argentino.png"
                        alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                    Ejercito Argentino
                </a>
                <a href="./usuarios.html">Usuarios</a>
                <a href="./form.php">Formulario</a>
            </div>
        </nav>
    </header>
    <main>
        <form action="" class="formulario" id="formulario">
        <div class="form_grupo" id="grupogrado">
            <label for="grados">Grado:</label>
            <select name="grado" id="grados">
                <option value="">Selecciona un grado:</option>
                <option value="1">SV EC</option>
                <option value="2">SV</option>
                <option value="3">VP</option>
                <option value="4">CB</option>
                <option value="5">CI</option>
                <option value="6">SG</option>
                <option value="7">SI</option>
                <option value="8">SA</option>
                <option value="9">SP</option>
                <option value="10">SM</option>
                <option value="11">ST</option>
                <option value="12">TT</option>
                <option value="13">TP</option>
                <option value="14">TP</option>
                <option value="15">CT</option>
                <option value="16">MY</option>
                <option value="17">TC</option>
                <option value="18">CR</option>
                <option value="19">CY</option>
                <option value="20">GB</option>
                <option value="21">GD</option>
                <option value="22">TG</option>
            </select>
        </div>
        <br>
        <div class="form_grupo" id="grupoapellido">
            <label for="apellidos" class="formulario_label" >Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" class="formulario_input" name="apellidos" required>
        </div>
        <p class="formulario__input-error" id="errorapellido">El apellido no puede contener numeros</p>
        <br>
        <div class="form_grupo" id="gruponombre">
        <label for="nombres" class="formulario_label">Nombres:</label>
        <input type="text" id="nombres" name="nombres" class="formulario_input" required>
        </div>
        <p class="formulario__input-error" id="errornombre">El nombre no puede contener numeros o caracteres especiales.</p>
        <br>
        <div class="form_grupo" id="grupodni">
        <label for="dni" class="formulario_label">DNI:</label>
        <input type="text" id="dni" name="dni" class="formulario_input" required>
        </div>
        <p class="formulario__input-error" id="errordni">El dni tiene que ser de 8 digitos y solo puede contener numeros.</p>
        <br>
        <div class="form_grupo" id="grupoedad">
        <label for="edad" class="formulario_label">Edad:</label>
        <input type="number" id="edad" name="edad" class="formulario_input" required>    
        </div> 
        <p class="formulario__input-error" id="erroredad">la edad tiene que ser entre 18 y 100 años.</p>
        <br>
        <div class="form_grupo" id="grupoSexo">
        <label for="sexo" id="sexo" class="formulario_label">Sexo:</label>
            <input type="radio" id="masculino" name="sexo" value="masculino" class="formulario_input" required>
            <label for="masculino"  class="formulario_label">Masculino</label>
        
            <input type="radio" id="femenino" name="sexo" value="femenino" class="formulario_input" required>
            <label for="femenino"  class="formulario_label">Femenino</label>
        </div>
        <p class="formulario__input-error" id="errorsexo">Debe seleccionar una opcion</p>
        <br>
        <div class="form_grupo" id="grupofecha">
        <label for="fechaNacimiento" class="formulario_label">Fecha de Nacimiento:</label>
        <input type="date" id="fechaNacimiento" name="fechaNacimiento" class="formulario_input" required>
        </div>
        <p class="formulario__input-error" id="errorfecha">Debes tener entre 18 y 100 años.</p>
        <br>
        <div class="form_grupo" id="grupodomicilio">
        <label for="domicilio" class="formulario_label">Domicilio:</label>
        <input type="text" id="domicilio" name="domicilio" class="formulario_input" required>
        </div>
        <p class="formulario__input-error" id="errordomicilio">Debe completar el campo.</p>
        <br>
        <button type="button" id="Enviar">Enviar</button>
    </form>
    <br>
    <br>
    
    <div id="respuesta"></div>
    </main>
</body>

<script>
    const formulario = document.getElementById('formulario');
    const inputs = document.querySelectorAll('#formulario input');

    const expresiones = {
        apellidos: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
        nombres: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
        dni: /^\d{8,9}$/,
        domicilio: /^[a-zA-Z0-9]{1,50}$/
    }

    function validarEdad(texto){
          // Verificar si el texto contiene solo números
    if (/^\d+$/.test(texto)) {
        var edad = parseInt(texto);
        // Verificar si la edad está dentro del rango permitido
        if (edad >= 18 && edad <= 100) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
    }

    function calcularEdad(fechaNacimiento) {
    var hoy = new Date();
    var edad = hoy.getFullYear() - fechaNacimiento.getFullYear();
    var mes = hoy.getMonth() - fechaNacimiento.getMonth();
    if (mes < 0 || (mes === 0 && hoy.getDate() < fechaNacimiento.getDate())) {
        edad--;
    }
    return edad;
}

    const validarFormulario = (e) => {
        switch(e.target.name){
            case "apellidos":
                if(expresiones.apellidos.test(e.target.value)){
                    document.getElementById("grupoapellido").classList.remove('form_incorrecto'); 
                    document.getElementById('grupoapellido').classList.add('form_correcto');
                    document.getElementById('errorapellido').classList.remove('formulario__input-error-activo');
                }else{
                    document.getElementById('grupoapellido').classList.add('form_incorrecto');
                    document.getElementById('grupoapellido').classList.remove('form_correcto');
                    document.getElementById('errorapellido').classList.add('formulario__input-error-activo');
                    e.preventDefault();
                }
                break;
            case "nombres":
                if(expresiones.nombres.test(e.target.value)){
                    document.getElementById("gruponombre").classList.remove('form_incorrecto'); 
                    document.getElementById('gruponombre').classList.add('form_correcto');
                    document.getElementById('errornombre').classList.remove('formulario__input-error-activo');
                }else{
                    document.getElementById('gruponombre').classList.add('form_incorrecto');
                    document.getElementById('gruponombre').classList.remove('form_correcto');
                    document.getElementById('errornombre').classList.add('formulario__input-error-activo');
                    e.preventDefault();
                }
                break;

            case "dni":
                if(expresiones.dni.test(e.target.value)){
                    document.getElementById("grupodni").classList.remove('form_incorrecto'); 
                    document.getElementById('grupodni').classList.add('form_correcto');
                    document.getElementById('errordni').classList.remove('formulario__input-error-activo');
                    $.ajax({
                        url: 'https://dnis-api.onrender.com/',
                        type: 'GET',
                     success: function (dnis) {
                        console.log(dnis);
                         var dniIngresado = e.target.value;
                         var dniExiste = dnis.includes(dniIngresado);

                if (dniExiste) {
                    console.log('El DNI ingresado está en la lista de la API.');
                    // Por ejemplo, mostrar un mensaje de error
                    document.getElementById('grupodni').classList.add('form_incorrecto');
                    document.getElementById('grupodni').classList.remove('form_correcto');
                    document.getElementById('errordni').classList.add('formulario__input-error-activo');
                    e.preventDefault();
                } else {
                    // El DNI no está en la lista de la API, puedes continuar con la validación
                    console.log('El DNI ingresado no está en la lista de la API.');
                }
            }
        });

                }else{
                    document.getElementById('grupodni').classList.add('form_incorrecto');
                    document.getElementById('grupodni').classList.remove('form_correcto');
                    document.getElementById('errordni').classList.add('formulario__input-error-activo');
                    e.preventDefault();
                }
                break;
            case "edad":
                if(/^\d+$/.test(e.target.value)){
                var edad = parseInt(e.target.value);
                if (edad >= 18 && edad <= 100) {
                    document.getElementById("grupoedad").classList.remove('form_incorrecto'); 
                    document.getElementById('grupoedad').classList.add('form_correcto'); 
                    document.getElementById('erroredad').classList.remove('formulario__input-error-activo');
                } else {
                    document.getElementById('grupoedad').classList.add('form_incorrecto');
                    document.getElementById('grupoedad').classList.remove('form_correcto');
                    document.getElementById('erroredad').classList.add('formulario__input-error-activo');
                    e.preventDefault();
                }
            } else {
                document.getElementById('grupoedad').classList.add('form_incorrecto');
                document.getElementById('grupoedad').classList.remove('form_correcto');
                e.preventDefault();
            }
                break;
            case "sexo":
                if (document.querySelector('input[name="sexo"]:checked')) {
                document.getElementById("grupoSexo").classList.remove('form_incorrecto'); 
                document.getElementById('grupoSexo').classList.add('form_correcto');
                document.getElementById('errorsexo').classList.remove('formulario__input-error-activo');
            } else {
                document.getElementById('grupoSexo').classList.add('form_incorrecto');
                document.getElementById('grupoSexo').classList.remove('form_correcto');
                document.getElementById('errorsexo').classList.add('formulario__input-error-activo');
                e.preventDefault();
            }
            break;
                break;
            case "fechaNacimiento":
                var fechaNacimiento = new Date(e.target.value);
            // Calculamos la edad restando la fecha de nacimiento al día de hoy
            var edad = calcularEdad(fechaNacimiento);
            // Verificamos si la edad está dentro del rango permitido
            if (edad >= 18 && edad <= 100) {
                document.getElementById("grupofecha").classList.remove('form_incorrecto'); 
                document.getElementById('grupofecha').classList.add('form_correcto');
                document.getElementById('errorfecha').classList.remove('formulario__input-error-activo');
            } else {
                document.getElementById('grupofecha').classList.add('form_incorrecto');
                document.getElementById('grupofecha').classList.remove('form_correcto');
                document.getElementById('errorfecha').classList.add('formulario__input-error-activo');
                e.preventDefault();
            }
                break;
            case "domicilio":
                if(expresiones.domicilio.test(e.target.value)){
                    document.getElementById("grupodomicilio").classList.remove('form_incorrecto'); 
                    document.getElementById('grupodomicilio').classList.add('form_correcto');
                    document.getElementById('errordomicilio').classList.remove('formulario__input-error-activo');
                }else{
                    document.getElementById('grupodomicilio').classList.add('form_incorrecto');
                    document.getElementById('grupodomicilio').classList.remove('form_correcto');
                    document.getElementById('errordomicilio').classList.add('formulario__input-error-activo');
                    e.preventDefault();
                }
                break;
        }
    }
    document.getElementById("formulario").addEventListener("submit", function(e) {
    // Realiza todas las validaciones antes de enviar el formulario
    // Si alguna validación falla, se cancelará el envío del formulario
    validarFormulario(e);
});



    inputs.forEach((input) => {
        input.addEventListener('keyup', validarFormulario);
        input.addEventListener('blur', validarFormulario);
        });


    $('#Enviar').click(function(){
    var grados = document.getElementById('grados').options[document.getElementById('grados').selectedIndex].text;
    var apellidos = document.getElementById('apellidos').value;
    var nombre = document.getElementById('nombres').value;
    var dni = document.getElementById('dni').value;
    var edad = document.getElementById('edad').value;
    var sexo = document.querySelector('input[name="sexo"]:checked').value;
    var fechaNac = document.getElementById('fechaNacimiento').value;
    var domicilio = document.getElementById('domicilio').value;

    var ruta = "grado="+grados+"&Ape="+apellidos+"&nom="+nombre+"&dni="+dni+"&edad="+edad+"&sexo="+sexo+"&fechaNac="+fechaNac+"&dom="+domicilio;

    function validarDni(){
        $.ajax({
            url: 'https://dnis-api.onrender.com/',
            method:'GET',
            success: (function(dnis){

            })
        })
    }

    $.ajax({
        url: 'archivo_php.php',
        type: 'POST',
        data: ruta,
    })

    .done(function(res){
        $('#respuesta').html(res)
    })
    .fail(function(){
        console.log("error");
    })
    .always(function(){
        console.log("complete");
    })
} )
</script>

</html> 