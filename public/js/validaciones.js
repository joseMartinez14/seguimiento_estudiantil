function validaCamposRegistro(){
    if(validateEmail() && validaContrasena()){
        mostrarMensaje("success", "Logeado correctamente");
        return true;
    }
    
    return false;
}

function validateEmail()
{
    var email = document.getElementById('email');
    var mailformat = /^[a-zA-Z^.]+@est.una.ac.cr/;
    if(email.value.match(mailformat)){
        return true;
    }
    else
    {
        mostrarMensaje("error", "Correo incorrecto");
        return false;
    }
}

function validaNumerosLetras(valor){
    var rgularExp = {
        containsNumber : /\d+/,
        containsAlphabet : /[a-zA-Z]/
    }
    var expMatch = {};
    expMatch.containsNumber = rgularExp.containsNumber.test(valor);
    expMatch.containsAlphabet = rgularExp.containsAlphabet.test(valor);

    return expMatch.containsAlphabet && expMatch.containsNumber;
}

function validaContrasena(){
    var contrasena = document.getElementById('password').value;
    if(validaNumerosLetras(contrasena)){
        return true;
    }
    mostrarMensaje("error", "Contrase;a incorrecta");
    return false;
}


function calEdad(){
    var fechaNacimiento = new Date(document.getElementById("campo-fecha-nacimiento").value);
    var edad = document.getElementById("campo-edad");
    var ageDifMs = Date.now() - fechaNacimiento;
    var ageDate = new Date(ageDifMs);
    edad.value = ageDate.getUTCFullYear() - 1970;
}

function validadCedula(){
    
}


