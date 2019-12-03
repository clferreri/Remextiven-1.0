$(document).ready(function () {
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $("#txtNumeroTarjeta").keyup(function(){
        var longitud = $(this).val().length;
        if (longitud == 4 || longitud == 9 || longitud == 14){
            $(this).val($(this).val() + " ");
        }
    });

    $('#btnAgregarMedioPago').click(function(){
        $("#loadingModal").modal('show')
        $("#modalAgregarMedioPago").modal('hide');
        var titular = $("#txtTitular").val();
        var numeroTarjeta = $("#txtNumeroTarjeta").val();
        var fechaVencimiento = $("#dtpFechaVencimiento").val();
        $("#txtTitular").val('');
        $("#dtpFechaVencimiento").val('');
        $("#dtpFechaVencimiento").val('');
    //we will send data and recive data fom our AjaxController
    $.ajax({
        url:'AddCreditCard',
        data:{'titular': titular, 'numeroTarjeta': numeroTarjeta, 'fechaVencimiento': fechaVencimiento},
        type:'post',
        dataType: "json",
        success: function (response) {
                    var tablaTarjetaPago = '<table class="table">' +
                                                '<thead>' +
                                                    '<tr>' +
                                                        '<th scope="col">ID</th>' +
                                                        '<th scope="col">Titular</th>' +
                                                        '<th scope="col">Numero Tarjeta</th>' +
                                                        '<th scope="col">Vencimiento</th>' +
                                                        '<th scope="col">Acciones</th>' +
                                                    '</tr>' +
                                                '</thead>' +
                                                '<tbody>';
                    $.each(response, function (index, value) {
                                var idTarjeta = value.IdTarjeta;
                                  tablaTarjetaPago +=   '<tr>' +
                                                            '<th>' + value.IdTarjeta + '</th>' +
                                                            '<td>' + value.NombreTitular + '</td>' +
                                                            '<td>' + value.numero + '</td>' +
                                                            '<td>' + value.Vencimiento + '</td>' +
                                                            '<td><div class="btnIconDelete" onclick="borrarTarjeta(' + idTarjeta + ')"><img src="img/icons/mediumIcons/trash.png" alt="Borrar"/></div> </td>' +
                                                        '</tr>';
                    });

                    tablaTarjetaPago += '</tbody></table>';
                    $("#tablaMediosDePago").html(tablaTarjetaPago);
                    $("#loadingModal").modal('hide');
                    toastr.success('Se agrego correctamente la tarjeta', 'Medio de pago agregado',{
                        "closeButton": true,
                        "progressBar": true,
                        "extendedTimeOut": "2000"
                      });

                
        },
        statusCode: {
            404: function() {
            $("#loadingModal").modal('hide');
            alert('El servicio Remextiven no se encuentra disponible');
            }
        },
        error:function(x,xs,xt){
            $("#loadingModal").modal('hide');
            obj = JSON.parse(x['responseText']);
            var textoError = Object.keys(obj['errors']);
            toastr.error(obj['errors'][textoError], obj['message'],{
                "closeButton": true,
                "progressBar": true,
                "extendedTimeOut": "2000"
              });
            
            
        }
    });
    
});


}); //END READY


function borrarTarjeta(idTarjeta){
    $.confirm({
        icon: 'far fa-question-circle',
        animation:'zoom',
        closeAnimation: 'scale',
        title: 'Borrar cuenta bancaria',
        content: '¿Esta seguro de borrar la cuenta bancaria?',
        type: 'orange',
        typeAnimated: true,
        buttons: {
            Borrar: {
                text: 'Confirmar',
                btnClass: 'btn-green',
                action: function(){
                    $("#loadingModal").modal('show')
        $.ajax({
            url:'DeleteCreditCard',
            data:{'IdTarjeta': idTarjeta},
            type:'post',
            dataType: "json",
            success: function (response) {
                        var tablaTarjetaPago = '<table class="table">' +
                                                    '<thead>' +
                                                        '<tr>' +
                                                            '<th scope="col">ID</th>' +
                                                            '<th scope="col">Titular</th>' +
                                                            '<th scope="col">Numero Tarjeta</th>' +
                                                            '<th scope="col">Vencimiento</th>' +
                                                            '<th scope="col">Acciones</th>' +
                                                        '</tr>' +
                                                    '</thead>' +
                                                    '<tbody>';
                        $.each(response, function (index, value) {
                                    var idTarjeta = value.IdTarjeta;
                                    tablaTarjetaPago +=   '<tr>' +
                                                                '<th>' + value.IdTarjeta + '</th>' +
                                                                '<td>' + value.NombreTitular + '</td>' +
                                                                '<td>' + value.numero + '</td>' +
                                                                '<td>' + value.Vencimiento + '</td>' +
                                                                '<td><div class="btnIconDelete" onclick="borrarTarjeta(' + idTarjeta + ')"><img src="img/icons/mediumIcons/trash.png" alt="Borrar"/></div> </td>' +
                                                            '</tr>';
                        });

                        tablaTarjetaPago += '</tbody></table>';
                        $("#tablaMediosDePago").html(tablaTarjetaPago);
                        $("#loadingModal").modal('hide');
                        toastr.success('Se elimino la tarjeta seleccionada', 'Medio de pago eliminado',{
                            "closeButton": true,
                            "progressBar": true,
                            "extendedTimeOut": "2000"
                        });

                    
            },
            statusCode: {
                404: function() {
                $("#loadingModal").modal('hide');
                toastr.warning('El servicio de remextiven no se encuentra disponible', 'Error del sistema',{
                    "closeButton": true,
                    "progressBar": true,
                    "extendedTimeOut": "2000"
                });
                }
            },
            error:function(x,xs,xt){
                $("#loadingModal").modal('hide');
                obj = JSON.parse(x['responseText']);
                var textoError = Object.keys(obj['errors']);
                toastr.error(obj['errors'][textoError], obj['message'],{
                    "closeButton": true,
                    "progressBar": true,
                    "extendedTimeOut": "2000"
                });
                            
            }
        });
            }},
Cancel:{
    text: 'Cancelar',
    btnClass: 'btn-red',
    function () {
    }
} 
}
});

}