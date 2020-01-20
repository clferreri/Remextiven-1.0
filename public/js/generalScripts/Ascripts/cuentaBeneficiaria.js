function altaBeneficiario(){
    var nombreTitular = $("#txtBeneficiarioNombre").val();
    var apellidoTitular = $("#txtBeneficiarioApellido").val();
    var documentoTitular = $("#txtBeneficiarioDocumento").val();
    var tipoDocumentoTitular = $("#cmbBeneficiarioTipoDocumento").val();
    var bancoBeneficiario = $("#cmbBeneficiarioBanco").val();
    var tipoCuenta = $("#cmbBeneficiarioTipoCuenta").val();
    var numeroCuenta = $("#txtBeneficiarioNumeroCuenta").val();
    var alias = $("#txtBeneficiarioAlias").val();
    var cliente = $('#cmbClientes').val();

    if (validarDatosBeneficiario(nombreTitular, apellidoTitular, documentoTitular, bancoBeneficiario, tipoCuenta, numeroCuenta, alias)){
        $("#modalAgregarCuentaBancaria").modal('hide');
        // $("#mantaLoading").modal('show');
        $.ajax({
            url:'../api/createBeneficiaryAccount',
            data:{'idUsuario': cliente, 'idBanco': bancoBeneficiario, 'tipoCuenta': tipoCuenta, 'numeroCuenta': numeroCuenta, 'nombreTitular': nombreTitular, 'apellidoTitular': apellidoTitular, 'tipoDocumento': tipoDocumentoTitular, 'documento': documentoTitular, 'alias': alias},
            type:'post',
            dataType: "json",
            success: function (response) {
                $("#cmbBeneficiario").append('<option value="'+ response.IdCuenta +'">' + response.Alias + '</option>');
                var datosBeneficiarios = JSON.parse(sessionStorage.getItem('Beneficiarios'));
                var nuevoBeneficiario = {'Beneficiario': response.NombreTitular + ' ' + response.ApellidoTitular, 'Banco': response.banco.Banco, 'Cuenta': response.TipoCuenta, 'NumeroCuenta': response.NumeroCuenta}
                datosBeneficiarios.push(nuevoBeneficiario);
                // $("#mantaLoading").modal('hide');
                sessionStorage.setItem('Beneficiarios', JSON.stringify(datosBeneficiarios));
                
            },
            statusCode: {
                404: function() {
                    $("#mantaLoading").modal('hide');
                    alertaToast(tipoAlertaExclamacion, servicioOFF, 3500);
                }
            },
            error:function(x,xs,xt){
                $("#mantaLoading").modal('hide');
                alertaToast(tipoAlertaError, 'Error al cargar las cuentas beneficiarias.', 3500);
            }
        });
    }
}


function validarDatosBeneficiario(nombre, apellido, documentoTitular, bancoBenef, tipoCuenta, numeroCuenta, alias){
    var realizarAlta = true;
    var mensaje ="<ul>";
    if (nombre == '' || nombre == ' ' || nombre.length < 4){
        $("#txtBeneficiarioNombre").addClass('is-invalid');
        realizarAlta = false;
        mensaje += '<li>Nombre vacío o demasiado corto.</li>';
    }

    if (apellido == '' || apellido == ' ' || apellido.length < 4){
        $("#txtBeneficiarioApellido").addClass('is-invalid');
        realizarAlta = false;
        mensaje += '<li>Apellido vacío o demasiado corto.</li>';
    }

    if (isNaN(documentoTitular) || documentoTitular.length < 8){
        $("#txtBeneficiarioDocumento").addClass('is-invalid');
        realizarAlta = false;
        mensaje += '<li>El documento contiene caracteres no numéricos o su longitud es menor a 8.</li>';
    }

    if (bancoBenef == 0){
        $("#cmbBeneficiarioBanco").addClass('is-invalid');
        realizarAlta = false;
        mensaje += '<li>No se seleccionó un banco.</li>';
    }
    
    if (tipoCuenta == 0){
        $("#cmbBeneficiarioTipoCuenta").addClass('is-invalid');
        realizarAlta = false;
        mensaje += '<li>No se seleccionó un tipo de cuenta.</li>';
    }

    if (isNaN(numeroCuenta) || numeroCuenta.length < 20){
        $("#txtBeneficiarioNumeroCuenta").addClass('is-invalid');
        realizarAlta = false;
        mensaje += '<li>El número de cuenta no es valido o su longitud es menor de 20.</li>';
    }

    if (alias == '' || alias == ' ' || alias.length < 3){
        $("#txtBeneficiarioAlias").addClass('is-invalid');
        realizarAlta = false;
        mensaje += '<li>Alias vacío o demasiado corto.</li>';
    }
    mensaje += '</ul>'
    
    if (!realizarAlta){
        alertaCajaHTML(tipoAlertaError, 'Datos no validos. Favor de corregir los siguientes errores', mensaje);
    }

    return realizarAlta
}


function obtenerBeneficiarios(){
    var idUsu = $("#cmbClientes").val();
    if (idUsu != 0){
        $.ajax({
            url:'../api/BeneficiaryAccount',
            data:{'idUsuario': idUsu},
            type:'post',
            dataType: "json",
            success: function (response) {
                $('#cmbBeneficiario').empty();
                $('#cmbBeneficiario').append('<option disabled value="0" selected>Seleccione un Beneficiario ...</option>');
                var datosBenef = new Array(); 
                $.each(response, function (index, value) {                      
                        var nuevoDatoBenef = {'Beneficiario': value.NombreTitular + ' ' + value.ApellidoTitular, 'Banco': value.banco.Banco, 'Cuenta': value.TipoCuenta, 'NumeroCuenta': value.NumeroCuenta}
                        datosBenef.push(nuevoDatoBenef);
                        $("#cmbBeneficiario").append('<option value="'+ value.IdCuenta +'">' + value.Alias + '</option>');
                });

                sessionStorage.setItem('Beneficiarios', JSON.stringify(datosBenef));
            },
            statusCode: {
                404: function() {
                    alertaToast(tipoAlertaExclamacion, servicioOFF, 3500);
                }
            },
            error:function(x,xs,xt){
                alertaToast(tipoAlertaError, 'Error al cargar las cuentas beneficiarias.', 3500);
            }
        });
    }
}