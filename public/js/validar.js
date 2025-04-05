function validar(){

    // Creacion de variables de los valores del formulario
    var nom, app, apm, numero, col, cp, city, estado, tel, correo, contra, e_mail, passverificar, checkbox;

    // asignacion de variables a los vaores de los campos del formulario

    nom = document.getElementById('idnombre').value;
    app = document.getElementById('idapaterno').value;
    apm = document.getElementById('idamaterno').value;
    calle = document.getElementById('idcalle').value;
    numero = document.getElementById('idno').value;
    col = document.getElementById('idcol').value;
    cp = document.getElementById('idcp').value;
    city = document.getElementById('idciudad').value;
    estado = document.getElementById('idestado').value;
    tel = document.getElementById('idtelefono').value;
    correo = document.getElementById('idcorreo').value;
    contra = document.getElementById('idcontrasena').value;
    checkbox = document.getElementById('idcasilla1');


    /* Expresiones regulares para validar email y contraseña*/
    e_mail = /\w+@\w+\.\w+/; /* Acepta mas general el formato del correo */
    passverificar = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d{2}).{8,}$/; /* verificar si la contraseña cumple con 8 caracteres y que cuente con almenos una mayuscula 1 minuscula y 2 digitos */

    /*Verifica que los campos esten llenos*/

    if (nom == "" || app == "" || apm == "" || calle == "" || numero == "" || col == "" || cp =="" || city =="" || estado == "" || tel == "" || correo == "" || contra == ""){
        alert ("Todos los campos son obligatorios");
        return false;
    }
    /*validacion para que algunos campos no contengan numeros*/
    if (Number(nom)){
        alert("El nombre no es valido, ingrese solamente letras");
        return false;
    }
    if (Number(app)){
        alert("El apellido paterno no es valido, ingrese solamente letras");
        return false;
    }
    if (Number(apm)){
        alert("El apellido materno no es valido, ingrese solamente letras");
        return false;
    }
    if (Number(calle)){
        alert("El nombre de su calle no es valido, ingrese solamente letras");
        return false;
    }
    if (Number(col)){
        alert("El nombre de su colonia no es valido, ingrese solamente letras");
        return false;
    }

    /* Verifica que la longitud del codigo postal no sea mayor ni menor a 5 */
    if(cp.length < 5 || cp.length > 5){
        alert("Digitos invalidos, Verifique su codigo postal debe ser de 5 digitos");
        return false;
    }
    if (Number(city)){
        alert("El nombre de su ciudad no es invalido, ingrese solamente letras");
        return false;
    }
    if (Number(estado)){
        alert("El nombre de su estado no es invalido, ingrese solamente letras");
        return false;
    }
    /* validar longitud del numero de telefono que sea igual a 10 digitos*/
    if(tel.length < 10 || tel.length > 10){
        alert("Verifique Su numero de telefono, debe contener 10 digitos");
        return false;
    }
    /*Validar formato de email*/
    if(!e_mail.test(correo)){
        alert("Formato de correo electronico incorrecto");
        return false;
    }
    /*Validar que la contraseña cumpla con el formato indicado*/
    if(!passverificar.test(contra)){
        alert("La contraseña debe contener al menos 8 caracteres, 1 mayuscula, 1 minusculas y 2 digitos.");
        return false;
    }
    /* validar longitud de los caracteres que ingresara por el usuario en los campos*/
    if(nom.length > 26 || app.length > 25 || apm.length > 25 || calle.length > 30 || numero.length > 5 || col.length > 30 || city.length > 30 || estado.length > 30 || correo.length > 50 || contra.length > 255){
        alert("Estos Campos Exceden el numero de caracteres permitidos");
        return false;
    }
    if (!checkbox.checked) {
    /*Si todas las validaciones pasan y el checkbox habilitado, permitirá el envio del formulario*/
       alert("Acepta Los Terminos Y Condiciones Para Proceder Con El Registro");
       return false;
    }
    return true;
}
function Mayus(campo) {
    // Elimina cualquier carácter que no sea una letra y convierte el texto a mayúsculas
    campo.value = campo.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ ]/g, "").toUpperCase();

    if (/[0-9]/.test(nom) || /[0-9]/.test(app) || /[0-9]/.test(apm) || /[0-9]/.test(calle) || /[0-9]/.test(col) || /[0-9]/.test(city) || /[0-9]/.test(estado)) {
        alert("Por favor, ingrese solo letras en los campos indicados.");
        return false;
    }
    
}
function mostrarContrasena() {
        var passwordField = document.getElementById("idcontrasena");
        var icon = document.querySelector(".toggle-password");
    
        if (passwordField.type === "password") {
            passwordField.type = "text";
            icon.src = "img/eyeclose.png"; // Cambia a la imagen de ojo cerrado
        } else {
            passwordField.type = "password";
            icon.src = "img/eyeopen.jpg"; // Cambia a la imagen de ojo abierto
        }
    }

function Numeros(event) {
        var input = event.target;
        input.value = input.value.replace(/[^0-9]/g, ''); // Elimina cualquier carácter que no sea un número
}
