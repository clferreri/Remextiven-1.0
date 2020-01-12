$(document).ready(function(){

    sessionStorage.setItem('Moneda', 'USD');
    //configuracion inicial
    limpiarFormulario();
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
    moneda = sessionStorage.getItem('Moneda');
    var montoRecibir = 0;
    if(banco.includes('BANESCO')){
        montoRecibir = $("#txtMontoRecibirBanesco").val();        
    }else{
        montoRecibir = $("#txtMontoRecibir").val();     
    }
    $("#txtTicketMontoRecibir").html(montoRecibir);
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

function ponerImagen(imagen, simbolo){
    $("#banderita").html('<img class="d-none d-sm-inline-block" style="margin-top: -5px;" src="'+ imagen + '"> <span> </span><label class="pt-1">' + simbolo + '</label>');
    sessionStorage.setItem('Moneda', simbolo);
    coti =  JSON.parse(sessionStorage.getItem('Cotizacion'));   

    if (coti != null){
        if(simbolo == 'USD'){
            $("#lblTasaBanesco").html(coti.TasaBanescoUSD);
            $("#lbTasaOtro").html(coti.TasaOtroUSD);
        }    
        else{
            $("#lblTasaBanesco").html(coti.TasaBanescoUYU);
            $("#lbTasaOtro").html(coti.TasaOtroUYU);
        }
    }
    CalcularMontoRecibir();
}

function CalcularMontoRecibir(){
    var valor = parseInt($("#txtMontoEnviar").val());
    var moneda = sessionStorage.getItem('Moneda')
    
    if (isNaN($("#lblTasaBanesco").html()) || isNaN($("#lbTasaOtro").html())){
       $("#txtMontoRecibir").val('A espera de tasa');
       $("#txtMontoRecibirBanesco").val('A espera de tasa');
    }
    else{              
        coti =  JSON.parse(sessionStorage.getItem('Cotizacion'));     
        if (moneda == 'PES'){
            $("#txtMontoRecibir").val((valor * coti.TasaOtroUYU).toFixed(2));
            $("#txtMontoRecibirBanesco").val((valor * coti.TasaBanescoUYU).toFixed(2));
        }
        else{
            $("#txtMontoRecibir").val((valor * coti.TasaOtroUSD).toFixed(2));
            $("#txtMontoRecibirBanesco").val((valor * coti.TasaBanescoUSD).toFixed(2));
        }
    }      
    
    $("#txtTicketMontoEnviar").html(valor + ' ' + moneda);
  }

function altaTransferencia(cliente, montoEnviar, moneda, beneficiario, metodoPago){
    $.ajax({
        url:'../api/createTransfer',
        data:{'idUsuario': cliente, 
        'montoEnviar': montoEnviar,
        'idMoneda': moneda,
        'idBeneficiario': beneficiario,
        'idMedioPago': metodoPago,
        'idTipoTransferencia': $("#cmbPropositoEnvio").val(),
            
        },
        type:'post',
        dataType: "json",
        async:true,
        success: function (response) {
            alert('ok');
            
        },
        statusCode: {
            404: function() {
                alertaToast(tipoAlertaExclamacion, servicioOFF, 3500);
            }
        },
        error:function(x,xs,xt){
            alertaToast(tipoAlertaError, 'Error al generar la transferencia. Contacte a Sistemas', 3500);
        }
    });
}
