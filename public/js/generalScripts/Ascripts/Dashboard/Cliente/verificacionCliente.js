$(document).ready(function () {
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#btnVerificarCliente').click(verificarCliente);

});


function verificarCliente(){
    var cliente = $("#cmbClientes").val();

    if(cliente <= 0){
        Swal.fire({
            icon: 'error',
            title: 'Error al verificar cliente',
            text: 'Debe seleccionar un cliente valido',
          });    
        return false;
    }
    
    if($("#archivos")[0].files.length <2){
        Swal.fire({
            icon: 'error',
            title: 'Error al verificar cliente',
            text: 'Debe cargar minimo 2 archivos',
          });    
        return false;
    }
    else{
        $.each( $("#archivos")[0].files, function( key, value ) {
            if((value.size / 1024) > 1024){
                Swal.fire({
                    icon: 'error',
                    title: 'Error al verificar cliente',
                    text: 'Los archivos deben pesar menos de 1 MB',
                  });    
                return false;
            }
          });
    }

    return true;
    
}

