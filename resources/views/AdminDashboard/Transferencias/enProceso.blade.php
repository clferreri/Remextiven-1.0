@extends('AdminDashboard/layouts/layout')

@section('styles')
<link rel="stylesheet" href="{{ asset("css/Utilidades/wizards.css")}}">
<link rel="stylesheet" href="{{ asset("assets/$temaDashboard/plugins/select2/css/select2.min.css")}}">
<link rel="stylesheet" href="{{ asset("assets/$temaDashboard/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}">
@endsection

@section('contenidoHeader')
    
@endsection


@section('menu-transferencias')
  menu-open
@endsection

@section('link-transferencias')
  active
@endsection

@section('link-transferencias-generar')
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

  <!-- CONTENIDO! -->
  <section class="content">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="far fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Envios completados</span>
                <span class="info-box-number">56</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box">
                <span class="info-box-icon bg-warning"><i class="far fa-paper-plane"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">Envios pendientes</span>
                  <span class="info-box-number">10</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                  <span class="info-box-icon bg-danger"><i class="far fa-clock"></i></span>
    
                  <div class="info-box-content">
                    <span class="info-box-text">Atrasados</span>
                    <span class="info-box-number">2</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-primary"><i class="far fa-flag"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Envios totales</span>
                      <span class="info-box-number">67</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Envios</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
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
                    <td>239</td>
                    <td>Cristian Ferreri Cesar</td>
                    <td>Santander</td>
                    <td>50420 VES</td>
                    <td>
                    <div class="dropdown show" id="estadoEnvio1">
                    <span class="badge badge-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pendiente</span>
    
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#" onclick="CambioDeEstadoEnvio(1,2);">En proceso</a>
                        <a class="dropdown-item" href="#" onclick="CambioDeEstadoEnvio(1,5);">Anulado</a>
                      </div>
                    </div>
                    
                    </td>
                    <td>20/10/2019</td>
                    <td><button class="btn" style="height: 25px; margin-top:-15px;"><i class="fa fa-eye" aria-hidden="true"></i>
                    </button></td>
                  </tr>
                @endforeach


            
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->

  <script>
    function CambioEstadoPendiente(){
      var codigoHTML = '<span class="badge badge-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pendiente</span>' +
                    '<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">' +
                    '<a class="dropdown-item" href="#" onclick="CambioDeEstadoEnvio(1,2);">En proceso</a>' +
                    '<a class="dropdown-item" href="#" onclick="CambioDeEstadoEnvio(1,5);">Anulado</a>' +
                    '</div>'
    }

    function CambioEstadoEnProceso(){
      var codigoHTML = '<span class="badge badge-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">En proceso</span>' +
                    '<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">' +
                    '<a class="dropdown-item" href="#" onclick="CambioDeEstadoEnvio(2,1);">Pendiente</a>' +
                    '<a class="dropdown-item" href="#" onclick="CambioDeEstadoEnvio(2,5);">Anulado</a>' +
                    '</div>'
      $("#estadoEnvio1").html(codigoHTML); 
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


    function CambioDeEstadoEnvio(estadoAnterior, estadoNuevo){
      //Si el estado esta en pendiente y pasa a En Proceso
      if (estadoAnterior == 1 && estadoNuevo == 2){
        CambioEstadoEnProceso();         
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
        if (estadoNuevo == 3){
          alert("no se puede pasar a transfiriendo")
        }
        else if (estadoNuevo == 2){
          alert("No");
        }
      }

      else{
        alert("Debe respetar el orden de cambio de estados.")
      }
    }
  </script>
@endsection