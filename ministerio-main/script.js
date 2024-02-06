
let variable = 1;
console.log( variable);

function mostrarAlerta(){
    alert('esto es una alerta')
}

const array = [ 'Toyota', 'Amarok', 'Ford', 'Chevrolet'];

function agregarElemento(nuevoElemento) {
    if (!array.includes(nuevoElemento)) {
        array.push(nuevoElemento);
        console.log("Elemento agregado:", nuevoElemento);
        console.log("Array actualizado:", array);
    } else {
        console.log("Elemento ya presente en el array:", nuevoElemento);
    }
}
const contraseñas = [];

function validarContraseña() {
    let password = $('#password').val();
    let confirmPassword = $('#confirmPassword').val();
    let mensajeError = $('#mensajeError');

    if (password !== confirmPassword) {
        mensajeError.text = 'Las contraseñas no coinciden';
    } else if (contraseñas.includes(password)) {
        mensajeError.textContent = 'La contraseña ya ha sido utilizada';
    } else {
        mensajeError.textContent = '';
        contraseñas.push(password);
    }
}

function habilitarBoton(){
    const dropdown = $('#opciones');
    const botonOK = $('#botonOK');

    if(dropdown.val() !== ""){
        botonOK.prop('disabled', false);
    } else{
        botonOK.prop('disabled', true);
    }
} 

function realizarAccion(){
    alert('accion realizada');
}

const array1 = ['hola', 'chau', 'amor'];
const array2 = [1, 2, 3, 4];

const resultado = array2.concat(array1);
console.log(resultado);