function abrirTransferenciaPDF(idTransferencia){
    $.ajax({
        url:'../api/openTransferPDF',
        data:{'idTransferencia': idTransferencia,            
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