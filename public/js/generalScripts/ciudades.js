$(document).ready(function () {
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#cmbPais').change(function(){
        var pais = $(this).val();
    //we will send data and recive data fom our AjaxController
    $.ajax({
        url:'api/citysOfCountry',
        data:{'pais': pais},
        type:'post',
        dataType: "json",
        success: function (response) {
                    $('#cmbCiudad').empty();
                    $('#cmbCiudad').append("<option disabled selected>Seleccione una ciudad ...</option>");
                    $.each(response, function (index, value) { 
                         $("#cmbCiudad").append("<option value="+ value.IdCiudad +">" + value.Ciudad + "</option>");
                    });
        },
        statusCode: {
            404: function() {
            alert('El servicio Remextiven no se encuentra disponible');
            }
        },
        error:function(x,xs,xt){
            //nos dara el error si es que hay alguno
            window.open(JSON.stringify(x));
            //alert('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
        }
    });
});


// $('#chkNl').change(function(){
//     if ($(this).is(':checked')){
//         $('#txtNl').val(1);
//     }
//     else{
//         $('#txtNl').val(0);
//     }
    
// });

}); //END READY