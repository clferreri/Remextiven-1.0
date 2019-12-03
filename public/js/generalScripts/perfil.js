$(document).ready(function () {
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#btnActualizarDatosPerfil').click(function(){
    //we will send data and recive data fom our AjaxController
    $.ajax({
        url:'updateProfile',
        data:{'pais':$("#cmbPais").val(), 'ciudad':$("#cmbCiudad").val(), 'dir':$("#txtDir").val(), 'numPuerta':$("#txtNumPuerta").val(), 'codigoPostal':$("#txtCodigoPostal").val(), 'tel':$("#txtTel").val() , 'tel2':$("#txtTel2").val() },
        type:'post',
        dataType: "json",
        success: function (response) {
                  
        },
        statusCode: {
            404: function() {
            alert('El servicio Remextiven no se encuentra disponible');
            }
        },
        error:function(x,xs,xt){
            //nos dara el error si es que hay alguno
            window.open(JSON.stringify(x));
            alert('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
        }
    });
});


//OTRO ACAA


// $('#chkNl').change(function(){
//     if ($(this).is(':checked')){
//         $('#txtNl').val(1);
//     }
//     else{
//         $('#txtNl').val(0);
//     }
    
// });

}); //END READY