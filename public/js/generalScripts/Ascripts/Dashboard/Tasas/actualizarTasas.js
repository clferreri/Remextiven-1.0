$(document).ready(function(){
    var contadorCambio = 0;
    $("#txtUyuUSD").focusin(quitarColor);

    $("#txtCopUSD").keyup(Calcular);
    $("#txtCopUSD").keypress(escribirSoloNumerosConComa);

    $("#txtVesCop").keyup(Calcular);
    $("#txtVesCop").keypress(escribirSoloNumerosConComa);

    $("#txtUyuUSD").keyup(Calcular);
    $("#txtUyuUSD").keypress(escribirSoloNumerosConComa);
});

function ComaPorPunto(id){
    var valor = $("#"+id).val();
    var valor = valor.replace(",",".");
    $("#"+id).val(valor);
}

function quitarColor(){
    $("#txtUyuUSD").removeClass('text-success');
}

function CargarTasaDolar(){ 
        $("#txtUyuUSD").addClass('text-warning');
        $("#txtUyuUSD").val('Cargando Estimado...');
        $.ajax({
            url:'../api/cotizacionUSDRemextiven',
            type:'get',
            dataType: "json",
            async:true,
            success: function (response) {
                $("#txtUyuUSD").val(response);
                $("#txtUyuUSD").removeClass('text-warning');
                $("#txtUyuUSD").addClass('text-success');               
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


function ValidarDatos(){
    var formularioValido = true;
    var tituloErrores = "Error al configurar Tasa";

    if (isNaN($("#txtCopUSD").val()) || $("#txtCopUSD").val().length == 0){
        formularioValido = false;
        alertaCaja('error', tituloErrores, 'El valor ingresado en USD/COP no es numérico');
        return formularioValido;
    }
    else if($("#txtCopUSD").val() == 0){
        formularioValido = false;
        alertaCaja('error', tituloErrores, 'El valor ingresado en USD/COP no puede ser 0');
        return formularioValido;
    }

    if (isNaN($("#txtVesCop").val()) || $("#txtVesCop").val().length == 0){
        formularioValido = false;
        alertaCaja('error', tituloErrores, 'El valor ingresado en Tasa CambioPaya no es numérico');
        return formularioValido;
    }
    else if($("#txtVesCop").val() == 0){
        formularioValido = false;
        alertaCaja('error', tituloErrores, 'El valor ingresado en CambioPaya no puede ser 0');
        return formularioValido;
    }

    if (isNaN($("#txtUyuUSD").val()) || $("#txtUyuUSD").val().length == 0){
        formularioValido = false;
        alertaCaja('error', tituloErrores, 'El valor ingresado en USD/UYU no es numérico');
        return formularioValido;
    }
    else if($("#txtUyuUSD").val() == 0){
        formularioValido = false;
        alertaCaja('error', tituloErrores, 'El valor ingresado en USD/UYU no puede ser 0');
        return formularioValido;
    }

    return formularioValido
}


function ActualizarTasa(){
    if (ValidarDatos()){
        $("#mantaLoading").modal('show');
        $.ajax({
            url:'../api/configRateSend',
            data:{'COPXUSD': $("#txtCopUSD").val(), 'COPXVES': $("#txtVesCop").val(), 'UYUXUSD': $("#txtUyuUSD").val()},
            type:'post',
            dataType: "json",
            success: function (response) {
                $("#tdBanescoUSD").html(response.TasaBanescoUSD + ' VES');
                $("#tdBanescoUYU").html(response.TasaBanescoUYU + ' VES');
                $("#tdOtroUSD").html(response.TasaOtroUSD + ' VES');
                $("#tdOtroUYU").html(response.TasaOtroUYU + ' VES');

                $("#txtCopUyu").val(response.UYUCOP);
                $("#txtVesUyu").val(response.UYUVES);
                $("#txtVesUsd").val(response.USDVES);
                
                $("#mantaLoading").modal('hide');  
                
                alertaToast(tipoAlertaOK, 'Tasas actualizadas exitosamente', 2200);
            },
            statusCode: {              
                404: function() {
                $("#mantaLoading").modal('hide');
                alertaToast(tipoAlertaError, 'El servicio Remextiven no se encuentra disponible', 3500);
                }
            },
            error:function(x,xs,xt){
                $("#mantaLoading").modal('hide');
                alert(JSON.stringify(x));
                alert(xs);
                alert(xt);
            }
        });
    }
}

function ActualizarMargen(){
    $("#mantaLoading").modal('show');
    $.ajax({
        url:'../api/configPercenSend',
        data:{'idMargen': $("#cmbMargen").val()},
        type:'post',
        dataType: "json",
        success: function (response) {
            console.log(response);
            $("#tdBanescoUSD").html(response.TasaBanescoUSD + ' VES');
            $("#tdBanescoUYU").html(response.TasaBanescoUYU + ' VES');
            $("#tdOtroUSD").html(response.TasaOtroUSD + ' VES');
            $("#tdOtroUYU").html(response.TasaOtroUYU + ' VES');
            $("#txtMargenTexto").html($('#cmbMargen option:selected').text());
            
            $("#mantaLoading").modal('hide');  
            
            alertaToast(tipoAlertaOK, 'Margen actualizado correctamente', 2200);
        },
        statusCode: {              
            404: function() {
            $("#mantaLoading").modal('hide');
            alertaToast(tipoAlertaError, 'El servicio Remextiven no se encuentra disponible', 3500);
            }
        },
        error:function(x,xs,xt){
            $("#mantaLoading").modal('hide');
            alert(JSON.stringify(x));
            alert(xs);
            alert(xt);
        }
    });

}


function Calcular(){
    //Calculando UYU/COP////////////
    var USDCOP = $("#txtCopUSD").val();
    var USDUYU = $("#txtUyuUSD").val();
    if(!isNaN(USDCOP) && !isNaN(USDUYU)){
        if(USDCOP > 0 && USDUYU > 0){
            $("#txtCopUyu").val((USDCOP/USDUYU).toFixed(2));
        }
        else{
            $("#txtCopUyu").val(0);
        }
    }
    else{
        $("#txtCopUyu").val('ERROR');
    }
    ///////////////////////////////////7
    
    //Calculando UYU/VES y USD/VES
    var VESCOP = $("#txtVesCop").val();
    if(!isNaN(USDCOP) && !isNaN(VESCOP)){
        if(USDCOP > 0 && VESCOP > 0){
            $("#txtVesUsd").val((USDCOP/VESCOP).toFixed(2));
        }
        else{
            $("#txtVesUsd").val(0);
        }
    }
    else{
        $("#txtVesUsd").val('ERROR');
    }

    ///////////////////////////////////////
    var UYUCOP = $("#txtCopUyu").val();
    if(!isNaN(UYUCOP) && !isNaN(VESCOP)){
        if(UYUCOP > 0 && VESCOP > 0){
            $("#txtVesUyu").val((UYUCOP/VESCOP).toFixed(2));
        }
        else{
            $("#txtVesUyu").val(0);
        }
    }
    else{
        $("#txtVesUyu").val('ERROR');
    }
}