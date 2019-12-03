$(document).ready(function(){

    //VALIDACIONES MODAL PERFIL
    $("#validationtxtDir").hide();
    $("#validationtxtNumPuerta").hide();
    $("#validationtxtCodigoPostal").hide();
    $("#validationtxtTel").hide();
    $("#validationtxtTel2").hide();

    $("#txtDir").keyup(validarInputTextoYNoVacio);
    $("#txtNumPuerta").keyup(validarInputNumeroYNoVacio);
    $("#txtCodigoPostal").keyup(validarInputNumero);
    $("#txtTel").keyup(validarInputNumeroYNoVacio);
    $("#txtTel2").keyup(validarInputNumero);

    /////////////////////////////////

    //VALIDACIONES MODAL CUENTA BANCARIA
    $("#validationtxtNumeroCuenta").hide();

    $("#txtNumeroCuenta").keyup(validarInputNumeroYNoVacio);
    /////////////////////////////////


    
});


function validarModificacionPerfil(){
    var sendForm = true;
    var errors = [];
    var direccion = $("#txtDir").val();
    var numeroPuerta = $("#txtNumPuerta").val();
    var codigoPostal = $("#txtCodigoPostal").val();
    var telefono = $("#txtTel").val();
    var telefono2 = $("#txtTel2").val();

    if (direccion.length == 0){
        $("#pValidationDireccion").text("Debe ingresar una dirección");
        $("#validationDireccion").slideDown( 500 );  
        sendForm = false;
        errors.push("Debe ingresar una dirección.");
      }
    
    if(numeroPuerta.length == 0){
        $("#pValidationNumeroPuerta").text("Debe ingresar un número de puerta");
        $("#validationNumeroPuerta").slideDown( 500 );  
        sendForm = false;
        errors.push("Debe ingresar un número de puerta.");
    }

    else if(!textoSoloNumeros(numeroPuerta)){
        $("#pValidationNumeroPuerta").text("Debe ingresar números");
        $("#validationNumeroPuerta").slideDown( 500 );  
        sendForm = false;
        errors.push("Solo puede ingresar números en 'Numero de puerta'.");
    }

    if (!textoSoloNumeros(codigoPostal)){
        $("#pValidationCodigoPostal").text("Debe ingresar números");
        $("#validationCodigoPostal").slideDown( 500 );  
        sendForm = false;
        errors.push("Solo puede ingresar números en 'Codigo Postal'.");
    }


    if (!textoSoloNumeros(telefono)){
        $("#pValidationTel").text("Debe ingresar números");
        $("#validationTel").slideDown( 500 );  
        sendForm = false;
        errors.push("Solo puede ingresar números en 'Teléfono'.");
    }

    if (!textoSoloNumeros(telefono2)){
        $("#pValidationTel2").text("Debe ingresar números");
        $("#validationTel2").slideDown( 500 );  
        sendForm = false;
        errors.push("Solo puede ingresar números en 'Teléfono adicional'.");
    }


    if (!sendForm){
        var html ="<ul>"
        for (var i = 0; i < errors.length; i++){
          html +="<li>" + errors[i] +"</li>"
        }
        html += "</ul>"

        armarModal("No es posible aplicar los cambios", "Para actualizar los datos corrija los siguientes errores:",html,modalFallo);
      }
  
        return sendForm;

}


function validacionAgregarCuentaBancaria(){
    var sendForm = true;
    var errors = [];
    var numeroCuenta = $("#txtNumeroCuenta").val();
    if (isNaN(numeroCuenta) || numeroCuenta.length < 15){
        $("#pValidationtxtNumeroCuenta").text("Debe ingresar un número de cuenta valido");
        $("#validationtxtNumeroCuenta").slideDown( 500 );  
        sendForm = false;
        errors.push("El numero de cuenta no es valido.");
    }

    if (!sendForm){
        var html ="<ul>"
        for (var i = 0; i < errors.length; i++){
          html +="<li>" + errors[i] +"</li>"
        }
        html += "</ul>"

        armarModal("No es posible agregar la cuenta bancaria", "Para agregar la cuenta corrija los siguientes errores:",html,modalFallo);
      }
  
        return sendForm;
}


function validarMetodoDePago(){
    
}