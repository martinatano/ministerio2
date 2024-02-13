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
                <a href="./form.html">Formulario</a>
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
        <br>
        <div class="form_grupo" id="gruponombre">
        <label for="nombres">Nombres:</label>
        <input type="text" id="nombres" name="nombres" required>
        </div>
        <br>
        <div class="form_grupo" id="grupodni">
        <label for="dni">DNI:</label>
        <input type="text" id="dni" name="dni" required>
        </div>
        <br>
        <div class="form_grupo" id="grupoedad">
        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" required>    
        </div> 
        <br>
        <div class="form_grupo" id="gruposexo">
        <label for="sexo" id="sexo">Sexo:</label>
            <input type="radio" id="masculino" name="sexo" value="masculino" required>
            <label for="masculino">Masculino</label>
        
            <input type="radio" id="femenino" name="sexo" value="femenino" required>
            <label for="femenino">Femenino</label>
        </div>
        <br>
        <div class="form_grupo" id="grupofecha">
        <label for="fechaNacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fechaNacimiento" name="fechaNacimiento" required>
        </div>
        <br>
        <div class="form_grupo" id="grupodomicilio">
        <label for="domicilio">Domicilio:</label>
        <input type="text" id="domicilio" name="domicilio" required>
        </div>
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

    const validarFormulario = (e) => {
        switch(e.target.name){
            case "apellidos":
                if(expresiones.apellidos.test(e.target.value)){
                    document.getElementById("grupoapellido").classList.remove('form_incorrecto'); 
                    document.getElementById('grupoapellido').classList.add('form_correcto')
                }else{
                    document.getElementById('grupoapellido').classList.add('form_incorrecto');
                    document.getElementById('grupoapellido').classList.remove('form_correcto');
                }
                break;
            case "nombres":
                
                break;

            case "dni":
                
                break;
            case "edad":

                break;
            case "sexo":
                
                break;
            case "fechaNacimiento":
                
                break;
            case "domicilio":
                
                break;
        }
    }


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

    var ruta = "grado="+grados+"&ape="+apellidos+"&nom="+nombre+"&dni="+dni+"&edad="+edad+"&sexo="+sexo+"&fechaNac="+fechaNac+"&dom="+domicilio;


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