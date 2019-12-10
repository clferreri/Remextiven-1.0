$(document).ready(function(){

    sessionStorage.setItem('Moneda', 'USD');
    //configuracion inicial
    limpiarFormulario();
    VES();
    USD();
    cotizaciones();
    ////////////////////////////7

    $("#cmbClientes").change(function(){
        var opcionSeleccionada = $("#cmbClientes")[0].selectedIndex -1;
        var usuario = JSON.parse(sessionStorage.getItem('Clientes'));
        $("#txtNombreCliente").html(usuario[opcionSeleccionada]['Nombre']);
        $("#txtDNICliente").html(usuario[opcionSeleccionada]['Dni']);
        $("#txtCorreoCliente").html(usuario[opcionSeleccionada]['Email']);
        $("#imgAvatar").attr('src', 'https://images.vexels.com/media/users/3/145908/preview2/52eabf633ca6414e60a7677b0b917d92-creador-de-avatar-masculino.jpg');

        //coloco en el ticket el cliente
        ClienteTicket(usuario[opcionSeleccionada]['Nombre'], usuario[opcionSeleccionada]['Dni']);
        obtenerBeneficiarios();
    });

    $("#cmbBeneficiario").change(function(){
        var opcionSeleccionada = $("#cmbBeneficiario")[0].selectedIndex -1;
        var beneficiario = JSON.parse(sessionStorage.getItem('Beneficiarios'));

        $("#txtDatosBeneficiarioNombre").html(beneficiario[opcionSeleccionada]['Beneficiario']);
        $("#txtDatosBeneficiarioBanco").html(beneficiario[opcionSeleccionada]['Banco']);
        $("#txtDatosBeneficiarioCuenta").html(beneficiario[opcionSeleccionada]['Cuenta']);
        $("#txtDatosBeneficiarioNumero").html(beneficiario[opcionSeleccionada]['NumeroCuenta']);

        BeneficiarioTicket(beneficiario[opcionSeleccionada]['Beneficiario'], 'Venezuela', beneficiario[opcionSeleccionada]['Banco'], beneficiario[opcionSeleccionada]['Cuenta'], beneficiario[opcionSeleccionada]['NumeroCuenta']);
    });


    $("#cmbMargen").change(function(){
        ModificarMargen();
    });

    
});


function ClienteTicket (cliente, dni){
    cliente = cliente.split(' ') // separa el string según espacios en blanco
         .slice(0, -1) // toma todos los elementos menos el último
         .join(' ');
    $("#txtTicketCliente").html(cliente);
    $("#txtTicketDni").html(dni);
}

function BeneficiarioTicket(beneficiario, pais, banco, tipoCuenta, numeroCuenta){
    $("#txtTicketBeneficiario").html(beneficiario);
    $("#txtTicketPais").html(pais);
    $("#txtTicketBanco").html(banco);
    $("#txtTicketTipoCuenta").html(tipoCuenta);
    $("#txtTicketNumeroCuenta").html(numeroCuenta);
}


function limpiarFormulario(){
    $("#cmbClientes")[0].selectedIndex = 0;

    $("#txtNombreCliente").html('-');
    $("#txtDNICliente").html('-');
    $("#txtCorreoCliente").html('-');

    $("#txtMontoEnviar").val('');
    $("#txtMontoRecibir").val('');

    $("#cmbBeneficiario")[0].selectedIndex = 0;

    $("#txtDatosBeneficiarioNombre").html('-');
    $("#txtDatosBeneficiarioBanco").html('-');
    $("#txtDatosBeneficiarioCuenta").html('-');
    $("#txtDatosBeneficiarioNumero").html('-');
    
}

function CotizacionesAjax(){
    VES();
    USD();
}

function cotizaciones(){
    var cotizacionVES = sessionStorage.getItem('CotiVES');
    if (cotizacionVES == null){
        setTimeout(cotizaciones, 600);
    }
    else{
        $("#txtCambioVESBanesco").html(cotizacionVES + ' VES');
        $("#txtCambioVES").html(cotizacionVESOtrosBancos(cotizacionVES) + ' VES');
        $("#txtCambioUSD").html(sessionStorage.getItem('CotiUSD') + ' USD');
    }
}

function cotizacionVESOtrosBancos(VES){
    //PARAM VES SON LOS BOLIVARES QUE YA ESTAN CON EL PORCENTAJE DE GANANCIA
    var margenActual = parseInt($("#txtMargenActual").val());
    var margenDeVES = (1 - margenActual) * 100;
    var RealVES = (VES * 100) / margenDeVES

    return (RealVES * (1 - (margenActual + 0.02))).toFixed(2);

}

function VES(){
    $.ajax({
        url:'../api/cotizacionVESRemextiven',
        type:'get',
        dataType: "json",
        async:true,
        success: function (response) {
            sessionStorage.setItem('CotiVES', response);
            
        },
        statusCode: {
            404: function() {
                alertaToast(tipoAlertaExclamacion, servicioOFF, 3500);
            }
        },
        error:function(x,xs,xt){
            alertaToast(tipoAlertaError, 'Error al cargar cotizacion VES.', 3500);
        }
    });
}

function USD(){
    $.ajax({
        url:'../api/cotizacionUSDRemextiven',
        type:'get',
        dataType: "json",
        async:true,
        success: function (response) {
            sessionStorage.setItem('CotiUSD', response);
            
        },
        statusCode: {
            404: function() {
                alertaToast(tipoAlertaExclamacion, servicioOFF, 3500);
            }
        },
        error:function(x,xs,xt){
            alertaToast(tipoAlertaError, 'Error al cargar cotizacion USD.', 3500);
        }
    });
}

function ponerImagen(imagen, simbolo){
    $("#banderita").html('<img class="d-none d-sm-inline-block" style="margin-top: -5px;" src="'+ imagen + '"> <span> </span><label class="pt-1">' + simbolo + '</label>');
    sessionStorage.setItem('Moneda', simbolo);
    var cotiVES = sessionStorage.getItem('CotiVES');
    var dolar = sessionStorage.getItem('CotiUSD');

    if(simbolo == 'USD'){
        $("#txtCambioVESBanesco").html(cotiVES + ' VES');
        $("#txtCambioVES").html((((cotiVES / 9) * 10) * 0.88).toFixed(2) + ' VES');
    }

    else{
        $("#txtCambioVESBanesco").html((cotiVES / dolar).toFixed(2) + ' VES');
        $("#txtCambioVES").html(((((cotiVES / 9) * 10) * 0.88) / dolar).toFixed(2) + ' VES');
    }

    CalcularMontoRecibir();
}

function CalcularMontoRecibir(banescoVES = 0, otroVES = 0){
    var valor = $("#txtMontoEnviar").val();
    var margen = $("#cmbMargen").val(); 
    var margenActual = $("#txtMargenActual").val();
    var moneda = sessionStorage.getItem('Moneda')
    var tasaBanesco = sessionStorage.getItem('CotiVES'); 

    if (banescoVES != 0 && otroVES != 0 || $("#chkEditarMargen").prop('checked')){
        if (banescoVES != 0 && otroVES != 0){
            tasaBanesco = banescoVES;
            tasa = otroVES;
        }else{
            tasaBanesco = ((tasaBanesco * 100) / ((1 - margenActual) * 100 )) * (1 - margen);
            tasa = cotizacionVESOtrosBancos(tasaBanesco)
        }
        
    }
    else{      
        var tasa = cotizacionVESOtrosBancos(sessionStorage.getItem('CotiVES'));               
        if (moneda == 'PES'){
            tasaBanesco = tasaBanesco / sessionStorage.getItem('CotiUSD');
            tasa = tasa / sessionStorage.getItem('CotiUSD');        
        }
    }
        $("#txtMontoRecibir").val((valor * tasa).toFixed(2));   
        $("#txtMontoRecibirBanesco").val((valor * tasaBanesco).toFixed(2));

        $("#txtTicketMontoEnviar").html(valor + ' ' + moneda);
  }


function cotizacionUSDaVES(banesco = false){
    return sessionStorage.getItem('CotiVES');
 
}

function cotizacionPESaVES(banesco = false){
    var cotiVES = sessionStorage.getItem('CotiVES');
    var dolar = sessionStorage.getItem('CotiUSD');
        if (banesco){
            return (cotiVES / dolar).toFixed(2);
    }
     else{
            return ((((cotiVES / 9) * 10) * 0.88) / dolar).toFixed(2);
    }
}



function HabilitarModificarMargen(){
    var margenActual = $("#txtMargenActual").val();
    $('#cmbMargen option[value="' + margenActual + '"]').removeAttr("selected");
    if ($("#chkEditarMargen").prop('checked')){
        $("#cmbMargen").prop('disabled', false);
        $("#cmbMargen").prop("selectedIndex", 0);
        
    }
    else{
        $('#cmbMargen option[value="' + margenActual + '"]').attr("selected", true);
        $("#cmbMargen").prop('disabled', true);
    }
}

function ModificarMargen(){
    var margenSeleccionado = $("#cmbMargen").val();
    var margenActual = $("#txtMargenActual").val();
    var VES = sessionStorage.getItem('CotiVES');
    var realVES = (VES * 100) / ((1 - margenActual) * 100);

    ConfigurarNuevaTasa(realVES, margenSeleccionado);

}


function ConfigurarNuevaTasa(valorVES, nuevoMargen){
    var moneda = sessionStorage.getItem('Moneda')
    var montoEnviar = $("#txtMontoEnviar").val();
    if (isNaN(montoEnviar)){
        montoEnviar = 0;
    }

    var montoBanesco = (valorVES * (1 - nuevoMargen)).toFixed(2);
    var montoOtros = (valorVES * ((1 - nuevoMargen) - 0.02)).toFixed(2);
    if (moneda == 'USD'){
        $("#txtCambioVESBanesco").html(montoBanesco);
        $("#txtCambioVES").html(montoOtros);
    }
    else{
        var cambio = sessionStorage.getItem('CotiUSD');
        $("#txtCambioVESBanesco").html((montoBanesco / cambio).toFixed(2));
        $("#txtCambioVES").html((montoOtros / cambio).toFixed(2));
    }

    CalcularMontoRecibir(montoBanesco, montoOtros);

}

