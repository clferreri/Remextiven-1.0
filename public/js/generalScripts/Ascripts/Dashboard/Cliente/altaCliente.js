$(document).ready(function () {
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#btnAgregarCliente').click(crearCliente);
    $('#cmbPaisResidente').change(function(){
        var pais = $(this).val();
    //we will send data and recive data fom our AjaxController
    $.ajax({
        url:'../api/citysOfCountry',
        data:{'pais': pais},
        type:'post',
        dataType: "json",
        success: function (response) {
                    $('#cmbCiudadResidente').empty();
                    $('#cmbCiudadResidente').append("<option disabled selected>Seleccione una ciudad ...</option>");
                    $.each(response, function (index, value) { 
                         $("#cmbCiudadResidente").append("<option value="+ value.IdCiudad +">" + value.Ciudad + "</option>");
                    });
                    $("#cmbCiudadResidente").focus();
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
});


function crearCliente(){
    var email = $("#txtEmail").val();
    var fechaNacimiento = $("#dtpFechaNacimiento").val();
    var nombre = $("#txtNombre").val();
    var apellido = $("#txtPrimerApellido").val();
    var apellido2 = $("#txtSegundoApellido").val();
    var documento = $("#txtDocumento").val();
    var tipoDocumento = $("#cmbTipoDocumento").val();
    var paisEmisor = $("#cmbPaisEmisionDocumento").val();
    var paisResidente = $("#cmbPaisResidente").val();
    var ciudadResidente = $("#cmbCiudadResidente").val();
    var direccion = $("#txtDireccion").val();
    var numeroPuerta = $("#txtNumeroPuerta").val();
    var tel = $("#txtTelefono").val();

    if (validarDatosCliente(email, fechaNacimiento, nombre, apellido, documento, paisEmisor, paisResidente, ciudadResidente,direccion, numeroPuerta, tel)){
        $("#mantaLoading").modal('show');
        $.ajax({
            url:'../api/createClient',
            data:{'email': email, 'nombre': nombre, 'apellido': apellido, 'segundoApellido': apellido2, 'documento': documento, 'tipoDocumento': tipoDocumento, 'fechaNacimiento': fechaNacimiento, 'paisDocumento': paisEmisor, 'pais': paisResidente, 'ciudad': ciudadResidente, 'dir': direccion, 'numeroPuerta': numeroPuerta, 'telefono': tel},
            type:'post',
            dataType: "json",
            success: function (response) {
                $("#formularioNuevoCliente")[0].reset();
                $("#mantaLoading").modal('hide');
                alertaToast(tipoAlertaOK, response.respuesta, 3500);
    
                    
            },
            statusCode: {              
                404: function() {
                $("#mantaLoading").modal('hide');
                alertaToast(tipoAlertaError, 'El servicio Remextiven no se encuentra disponible', 3500);
                }
            },
            error:function(x,xs,xt){
                $("#mantaLoading").modal('hide');
                var errores = x.responseJSON.errors;
                $.each( errores, function( key, value ) {
                    alertaToast(tipoAlertaError, value[0],3500);
               });
            }
        });
    }

    else{
        Swal.fire({
            icon: 'error',
            title: 'Error al cargar cliente',
            text: 'Valide los datos ingresados',
          });       
    }


}

function validarDatosCliente(email, fechaNacimiento, nombre, apellido, documento, paisEmisor, paisResidente, ciudadResidente, dir, numPuerta, tel){
    
    var validacionCorrecta = true

    //Valido el email
    if (!validarMail(email)){
        $("#txtEmail").addClass('is-invalid');
        validacionCorrecta = false
    }

    //Valido que sea mayor
    if (!mayorDeEdad(fechaNacimiento)){
        $("#dtpFechaNacimiento").addClass('is-invalid');
        validacionCorrecta = false
    }

    //Valido el nombre
    if (nombre == '' || nombre == ' ' || nombre.length < 4){
        $("#txtNombre").addClass('is-invalid');
        validacionCorrecta = false
    }

    //Valido el apellido
    if (apellido == '' || apellido == ' ' || apellido.length < 4){
        $("#txtPrimerApellido").addClass('is-invalid');
        validacionCorrecta = false
    }

    //Valido el documento
    if (isNaN(documento) || documento.length < 6){
        $("#txtDocumento").addClass('is-invalid');
        validacionCorrecta = false
    }

    //Valido que seleccione un pais
    if (paisEmisor < 1){
        $("#cmbPaisEmisionDocumento").addClass('is-invalid');
        validacionCorrecta = false
    }

    //Valido que seleccione un pais
    if (paisResidente < 1){
        $("#cmbPaisResidente").addClass('is-invalid');
        validacionCorrecta = false
    }

    //Valido que seleccione una ciudad
    if (ciudadResidente < 1){
        $("#cmbCiudadResidente").addClass('is-invalid');
        validacionCorrecta = false
    }

    if (dir == '' || dir == ' ' || dir.length < 3){
        $("#txtDireccion").addClass('is-invalid');
        validacionCorrecta = false
    }

    if (isNaN(numPuerta) || numPuerta.length < 3){
        $("#txtNumeroPuerta").addClass('is-invalid');
        validacionCorrecta = false
    }

    if (isNaN(tel) || tel.length < 8){
        $("#txtTelefono").addClass('is-invalid');
        validacionCorrecta = false
    }

    return validacionCorrecta;
}



function casillaCorreo(){
    if (validarMail($("#txtEmail").val())){
        $("#txtEmail").removeClass('is-invalid');       
    }
    else{
        $("#txtEmail").addClass('is-invalid');  
    }
}

function casillaFechaNac(){
    if (mayorDeEdad($("#dtpFechaNacimiento").val())){
        $("#dtpFechaNacimiento").removeClass('is-invalid');
    }
}


function casillaNombre(){
    var nombre = $("#txtNombre").val();
    if (nombre != '' && nombre != ' ' && nombre.length >= 4){
        $("#txtNombre").removeClass('is-invalid');
    }
}

function casillaApellido(){
    var ape = $("#txtPrimerApellido").val();
    if (ape != '' && ape != ' ' && ape.length > 5){
        $("#txtPrimerApellido").removeClass('is-invalid');
    }
}

function casillaApellido2(){
    var ape = $("#txtSegundoApellido").val();
    if (ape != '' && ape != ' ' && ape.length > 5){
        $("#txtSegundoApellido").removeClass('is-invalid');
    }
}

function casillaDocumento(){
    if (!isNaN($("#txtDocumento").val()) && $("#txtDocumento").val().length > 7){
        $("#txtDocumento").removeClass('is-invalid');
    }
}

function quitarInvalido(idInput){
    $("#"+idInput).removeClass('is-invalid');
}

function casillaDireccion(){
    var dir = $("#txtDireccion").val();
    if (dir != '' && dir != ' ' && dir.length >= 3){
        $("#txtDireccion").removeClass('is-invalid');
    }
}

function quitarInvalidoCasillaNumerica(idInput){
    if (!isNaN($("#"+idInput).val())){
        $("#"+idInput).removeClass('is-invalid');
    }
}
