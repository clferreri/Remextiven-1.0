@extends('AdminPanel/layouts/layout')

@section('styles')
  <style>
    .badge:hover{
      cursor: pointer; 
    }
    .link{
      cursor:pointer;
    }
  </style>
@endsection

@section('contenidoHeader')
    
@endsection

@section('menu-transferencias')
  active
@endsection

@section('link-transferencias-proceso')
  active
@endsection

@section('contenido')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Gestion de envios pendientes</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
            <li class="breadcrumb-item active">Envios Pendientes</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  
<!-- PANEL INDICADORES -->
<div class="row">
  <div class="panel panel-primary w-100">
    <div class="panel-heading">
      <h4 class="panel-title">Indicadores</h4>
      <div class="panel-heading-btn">
        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
      </div>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-12 col-md-6 col-xl-3">
          <div class="widget widget-stats bg-green">
            <div class="stats-icon"><i class="far fa-thumbs-up"></i></div>
              <div class="stats-info">
                <h4>ENVIOS COMPLETADOS</h4>
                <p>{{$completados}}</p>	
              </div>
              <div class="stats-link">
                <a href="javascript:;">Mas Información <i class="fa fa-arrow-alt-circle-right"></i></a>
              </div>
          </div>
        </div> 
      
        <div class="col-12 col-md-6 col-xl-3">
          <div class="widget widget-stats bg-warning">
            <div class="stats-icon"><i class="far fa-paper-plane"></i></div>
              <div class="stats-info">
                <h4>ENVIOS PENDIENTES</h4>
                <p>{{$pendientes}}</p>	
              </div>
              <div class="stats-link">
                <a href="javascript:;">Mas Información <i class="fa fa-arrow-alt-circle-right"></i></a>
              </div>
          </div>
        </div>     
      
        <div class="col-12 col-md-6 col-xl-3">
          <div class="widget widget-stats bg-danger">
            <div class="stats-icon"><i class="far fa-clock"></i></div>
              <div class="stats-info">
                <h4>ATRASADOS</h4>
                <p>{{$atrasados}}</p>	
              </div>
              <div class="stats-link">
                <a href="javascript:;">Mas Información <i class="fa fa-arrow-alt-circle-right"></i></a>
              </div>
          </div>
        </div>  
        
        <div class="col-12 col-md-6 col-xl-3">
          <div class="widget widget-stats bg-success">
            <div class="stats-icon"><i class="far fa-flag"></i></div>
              <div class="stats-info">
                <h4>ENVIOS TOTALES</h4>
                <p>{{$totales}}</p>	
              </div>
              <div class="stats-link">
                <a href="javascript:;">Mas Información <i class="fa fa-arrow-alt-circle-right"></i></a>
              </div>
          </div>
      </div>   
      </div>   
    </div>
  </div>
</div>
<!-- /PANEL INDICADORES -->


<div class="row">
  <div class="panel panel-primary w-100">
    <div class="panel-heading">
      <h4 class="panel-title">Envios</h4>
      <div class="panel-heading-btn">
        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
      </div>
    </div>
    <div class="panel-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
          <tr class="text-center">
            <th>N°</th>
            <th>Usuario</th>
            <th>Medio de Pago</th>
            <th>Pago</th>
            <th>Estado</th>
            <th>Fecha Envio</th>
            <th>Ver</th>
          </tr>
        </thead>
        
        <tbody>
          @foreach ($transferencias as $trans)
          <tr>
              <td class="text-center">23459089452</td>
              <td>
                {{$trans->UsuarioTransferencia->DatosPersona->Nombre . ' ' . $trans->UsuarioTransferencia->DatosPersona->PrimerApellido . ' ' . $trans->UsuarioTransferencia->DatosPersona->SegundoApellido }}
              </td>
              <td>{{$trans->MedioPago->MedioDePago}}</td>
              <td>{{$trans->Cotizacion->Moneda->CodigoValor . ' ' . $trans->Cotizacion->MontoEnviar}}</td>
              <td class="text-center">

                @if ($trans->IdEstadoTransferencia == 1)
                  <div class="dropdown show" id="estadoEnvio{{$trans->IdSolicitudTransferencia}}">
                    <span class="badge badge-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$trans->Estado->Estado}}</span>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item link" onclick="CambioDeEstadoEnvio(1,2,{{$trans->IdSolicitudTransferencia}});">En proceso</a>
                      <a class="dropdown-item link" onclick="CambioDeEstadoEnvio(1,5, {{$trans->IdSolicitudTransferencia}});">Anulado</a>
                    </div>
                  </div>

                @elseif ($trans->IdEstadoTransferencia == 2)
                  <div class="dropdown show" id="estadoEnvio{{$trans->IdSolicitudTransferencia}}">
                    <span class="badge badge-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$trans->Estado->Estado}}</span>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item link" onclick="CambioDeEstadoEnvio(2,1,{{$trans->IdSolicitudTransferencia}});">Pendiente</a>
                      <a class="dropdown-item link" onclick="CambioDeEstadoEnvio(2,5, {{$trans->IdSolicitudTransferencia}});">Anulado</a>
                    </div>
                  </div>

                @elseif ($trans->IdEstadoTransferencia == 3)
                  <div class="dropdown show" id="estadoEnvio{{$trans->IdSolicitudTransferencia}}">
                    <span class="badge badge-purple  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$trans->Estado->Estado}}</span>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item link" onclick="CambioDeEstadoEnvio(2,1,{{$trans->IdSolicitudTransferencia}});">Pendiente</a>
                      <a class="dropdown-item link" onclick="CambioDeEstadoEnvio(2,5, {{$trans->IdSolicitudTransferencia}});">Anulado</a>
                    </div>
                  </div>
                @endif
             
              </td>
              <td class="text-center">{{date('d/m/Y', strtotime($trans->FechaSolicitada))}}</td>
              <td class="text-center" style="width: 100px;">
                <a class="btn" style="height: 20px; margin-top: -20px;"><i class="fa fa-eye" aria-hidden="true"></i></a>
              <a class="btn" style="height: 26px; margin-top:-15px; padding-right:1px;" target="_blank" href="{{ route('transferenciaPDFAdmin', ['id' => $trans->IdSolicitudTransferencia])}}"><i class="fas fa-file-pdf"></i></a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
  


  <script>
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

    function CambioEstadoTransfiriendo(){
      var codigoHTML = '<span class="badge badge-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Transfiriendo</span>' +
                    '<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">'
                    '<a class="dropdown-item" href="#" onclick="CambioDeEstadoEnvio(3,1)>Pendiente</a>' +
                    '<a class="dropdown-item" href="#" onclick="CambioDeEstadoEnvio(3,2)>En Proceso</a>' +
                    '<a class="dropdown-item" href="#" onclick="CambioDeEstadoEnvio(3,6)>Anulado</a>' +
                    '</div>'

      $("#estadoEnvio1").html(codigoHTML);    
    }

    function CambioEstadoAnulado(){

    }


    function CambioDeEstadoEnvio(estadoAnterior, estadoNuevo,id){
      //Si el estado esta en pendiente y pasa a En Proceso
      if (estadoAnterior == 1 && estadoNuevo == 2){
        $("#estadoEnvio"+id).html(CambioEstadoEnProceso(id));         
      }

      //Estado En Proceso pasa a Transfiriendo
      // else if (estadoAnterior == 2 && estadoNuevo == 3){
      //   $("#estadoEnvio1").html(CambioEstadoTransfiriendo());
      // }

      //De Transifeindo pasa a Listo
      // else if (estadoAnterior == 3 && estadoNuevo == 4){

      // }
      //Anulado
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
          }
        })
        
        CambioEstadoAnulado();
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
  </script>
@endsection

@section('scripts')
<script type="text/javascript" src="{{asset("js/generalScripts/Ascripts/Dashboard/Transferencias/listadoPendientes.js")}}"></script>
@endsection