function CambioEstadoPendiente(id){
    return '<span class="badge badge-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pendiente</span>' +
                  '<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">' +
                  '<a class="dropdown-item link" onclick="CambioDeEstadoEnvio(1,2,' + id +');">Verificado</a>' +
                  '<a class="dropdown-item link" onclick="CambioDeEstadoEnvio(1,5,' + id +');">Anulado</a>' +
                  '</div>'
  }

  function CambioEstadoEnProceso(id){
    return '<span class="badge badge-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Verificado</span>' +
                  '<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">' +
                  '<a class="dropdown-item link" onclick="CambioDeEstadoEnvio(2,1,' + id +');">Pendiente</a>' +
                  '<a class="dropdown-item link" onclick="CambioDeEstadoEnvio(2,5,' + id +');">Anulado</a>' +
                  '</div>'
  }

  function CambioEstadoAnulado(){
    return '<span class="badge badge-danger" onclick="OperacionIrreversible()">Anulado</span>'
  }


  function CambioDeEstadoEnvio(estadoAnterior, estadoNuevo,id){
    //Si el estado esta en pendiente y pasa a En Proceso
    if (estadoAnterior == 1 && estadoNuevo == 2){
      Swal.fire({
        title: 'Cambiar estado a Verificada',
        text: "¿Esta seguro que desea realizar esta acción?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, verificar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.value) {
            
            $("#estadoEnvio"+id).html(CambioEstadoEnProceso(id));      
        }
      })
      
      CambioEstadoAnulado();
    }

    else if (estadoNuevo == 5){
      Swal.fire({
        title: 'Anular transferencia',
        text: "¿Esta seguro que desea realizar esta acción?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, anular',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.value) {
          Swal.fire(
            'Anulada',
            'La transferencia a sido anulada.',
            'success'
          )
          $("#estadoEnvio"+id).html(CambioEstadoAnulado());
        }
      })
    }

    //Estoy volviendo el envio para atras
    else if (estadoAnterior > estadoNuevo){
      if (estadoAnterior == 2 && estadoNuevo == 1){
        $("#estadoEnvio"+id).html(CambioEstadoPendiente(id)); 
      }
    }

    else{
      alert("Debe respetar el orden de cambio de estados.")
    }
  }


    function OperacionIrreversible(){
        Swal.fire({
            icon: 'warning',
            title: 'Operacion Irrebersible',
            text: 'No puede deshacer la anulación',
          })
    }

    function OperacionDenegada(){
        Swal.fire({
            icon: 'warning',
            title: 'Operacion Denegada',
            text: 'El estado de la transferencia no permite realizar cambios',
          })
    }