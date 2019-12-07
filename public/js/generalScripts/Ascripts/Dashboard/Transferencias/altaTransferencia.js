$(document).ready(function(){

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
