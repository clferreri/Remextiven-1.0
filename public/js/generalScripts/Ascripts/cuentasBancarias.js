$(document).ready(function () {
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#btnAgregarCuenta').click(function(){
        $("#loadingModal").modal('show')
        $("#modalAgregarCuentaBancaria").modal('hide');
        var banco = $("#cmbBanco").val();
        var tipoCuenta = $("#cmbTipoCuenta").val();
        var numCuenta =$("#txtNumeroCuenta").val();
        $("#cmbBanco").prop("selectedIndex", 0); 
        $("#cmbTipoCuenta").prop("selectedIndex", 0); 
        $("#txtNumeroCuenta").val('');
    //we will send data and recive data fom our AjaxController
    $.ajax({
        url:'AddBankAccount',
        data:{'banco': banco, 'tipoCuenta': tipoCuenta, 'NumeroCuenta': numCuenta},
        type:'post',
        dataType: "json",
        success: function (response) {
                    var tablaCuentasBancarias = '<table class="table">' +
                                                '<thead>' +
                                                    '<tr>' +
                                                        '<th scope="col">ID</th>' +
                                                        '<th scope="col">Banco</th>' +
                                                        '<th scope="col">Tipo de Cuenta</th>' +
                                                        '<th scope="col">N° de cuenta</th>' +
                                                        '<th scope="col">Eliminar</th>' +
                                                    '</tr>' +
                                                '</thead>' +
                                                '<tbody>';
                    $.each(response, function (index, value) {
                            var idCuenta =  value.IdCuentaBancaria;
                             tablaCuentasBancarias +=   '<tr>' +
                                                            '<th>' + value.IdCuentaBancaria + '</th>' +
                                                            '<td>' + value.nombre + '</td>' +
                                                            '<td>' + value.TipoCuenta + '</td>' +
                                                            '<td>' + value.NumeroCuenta + '</td>' +
                                                            '<td><div class="btnIconDelete" onclick="borrarCuentaBancaria(' + idCuenta + ')"><img src="img/icons/mediumIcons/trash.png" alt="Borrar"/></div> </td>' +
                                                        '</tr>';
                    });

                    tablaCuentasBancarias += '</tbody></table>';
                    $("#tablaCuentasBancarias").html(tablaCuentasBancarias);
                    $("#loadingModal").modal('hide');
                    toastr.success('Se creo la cuenta correctamente ', 'Cuenta creada',{
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


function borrarCuentaBancaria(idCuenta){
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
                        url:'DeleteBankAccount',
                        data:{'idCuentaBancaria': idCuenta},
                        type:'post',
                        dataType: "json",
                        success: function (response) {
                                    var tablaCuentasBancarias = '<table class="table">' +
                                                                '<thead>' +
                                                                    '<tr>' +
                                                                        '<th scope="col">ID</th>' +
                                                                        '<th scope="col">Banco</th>' +
                                                                        '<th scope="col">Tipo de Cuenta</th>' +
                                                                        '<th scope="col">N° de cuenta</th>' +
                                                                        '<th scope="col">Eliminar</th>' +
                                                                    '</tr>' +
                                                                '</thead>' +
                                                                '<tbody>';
                                    $.each(response, function (index, value) {
                                            var idCuenta =  value.IdCuentaBancaria;
                                             tablaCuentasBancarias +=   '<tr>' +
                                                                            '<th>' + value.IdCuentaBancaria + '</th>' +
                                                                            '<td>' + value.nombre + '</td>' +
                                                                            '<td>' + value.TipoCuenta + '</td>' +
                                                                            '<td>' + value.NumeroCuenta + '</td>' +
                                                                            '<td><a class="btnIconDelete" onclick="borrarCuentaBancaria(' + idCuenta + ')"><img src="img/icons/mediumIcons/trash.png" alt="Borrar"/></a> </td>' +
                                                                        '</tr>';
                                    });
                
                                    tablaCuentasBancarias += '</tbody></table>';
                                    $("#modalAgregarCuentaBancaria").modal('hide');
                                    $("#tablaCuentasBancarias").html(tablaCuentasBancarias);
                                    $("#loadingModal").modal('hide');
                                    toastr.success('Se elimino la cuenta seleccionada', 'Cuenta Bancaria',{
                                        "closeButton": true,
                                        "progressBar": true,
                                        "extendedTimeOut": "2000"
                                      });
                
                                
                        },
                        statusCode: {
                            404: function() {
                            $("#loadingModal").modal('hide');
                            toastr.success('Verifique su conexion a internet', 'Fallo de conexion',{
                                "closeButton": true,
                                "progressBar": true,
                                "extendedTimeOut": "2000"
                                });
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

                    
                }
            },
            Cancel:{
                text: 'Cancelar',
                btnClass: 'btn-red',
                function () {
                }
            } 
            
        }
    });
   
    
}


function limpiarModalCuentaBancaria(){
    $("#cmbBanco").prop("selectedIndex", 0); 
    $("#cmbTipoCuenta").prop("selectedIndex", 0); 
    $("#txtNumeroCuenta").val('');
    $("#txtNumeroCuenta").removeClass('is-invalid');
}