function procesopago(){

    var nom, card, date, cvv;

    /*Variables*/
    nom = document.getElementById('idnombre').value;
    card = document.getElementById('idcard').value;
    date = document.getElementById('iddate').value;
    cvv = document.getElementById('idcvv').value;
    checkbox = document.getElementById('casilla2');
    
    verificaciondate = /^(0[1-9]|1[0-2])\/\d{2}$/; /* Formato MM/AA para validar fecha de expiracion*/

    /* Verificamos que todos los campos esten llenos*/
    if (nom == "" || card == "" || date =="" || cvv ==""){
        alert ("¡Verifique que los campos esten llenos!");
        return false;
    }
    if (card.length < 16 || card.length > 16){
        alert("¡Verifique los digitos de su tarjeta debe contener 16 digitos!");
        return false;
    }
    if(!verificaciondate.test(date)){
        alert("¡verifique la fecha de expiracion!");
        return false;
    }
    if(cvv.length < 3 || cvv.length > 3){
        alert("¡Verifique su codigo cvv!");
        return false;
    }
    if (!checkbox.checked) {
        /*Si todas las validaciones pasan y el checkbox habilitado, permitirá el envio del formulario*/
           alert("Acepta Los Terminos Y Condiciones Para Proceder Con Su Compra");
           return false;
        }
    window.location.href = "resumencompra"; /* Nos dirigira al html de resumen de compra mientras la sesion esta activa */
    return false; 
}

function autoCompleteSlash(event) {
    var input = event.target; // Obtener el campo de entrada
    var value = input.value.replace(/\//g, ''); // Remover cualquier '/' existente

    // Verificar que el valor contenga solo dígitos
    if (!/^\d*$/.test(value)) {
        // Si no es solo dígitos, eliminar el último carácter ingresado
        value = value.slice(0, -1);
    }

    // Comprobar la longitud del valor
    if (value.length >= 2) {
        // Agregar el símbolo '/' después de los primeros 2 caracteres
        value = value.slice(0, 2) + '/' + value.slice(2);
    }

    // Limitar a 5 caracteres (MM/AA)
    if (value.length > 5) {
        value = value.slice(0, 5);
    }

    // Asignar el nuevo valor al campo de entrada
    input.value = value;
}
