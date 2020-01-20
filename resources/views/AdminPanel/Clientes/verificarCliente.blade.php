@extends('AdminPanel/layouts/layout')

@section('contenidoHeader')
    
@endsection

@section('styles')
  <link href="{{ asset("assets/$temaDashboardRemextiven/plugins/boostrap-file/css/fileinput.min.css" )}}" rel="stylesheet" />
  <link href="{{ asset("assets/$temaDashboardRemextiven/plugins/boostrap-file/css/fileinput-rtl.min.css" )}}" rel="stylesheet" />
  <!-- Select2 -->
  <link href="{{ asset("assets/$temaDashboardRemextiven/plugins/select2/dist/css/select2.min.css") }}" rel="stylesheet" />
@endsection

@section('menu-clientes')
  menu-open
@endsection

@section('link-clientes')
  active
@endsection

@section('link-clientes-verificar')
  active
@endsection

@section('contenido')  
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Verificar Cliente</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
            <li class="breadcrumb-item active">Verificar Cliente</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="row">
    <div class="col-md-12">              
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Verificación</h3>
        </div>
        <!-- /.card-header -->

        <div class="card-body">
          <div class="note note-primary m-b-15">
            <div class="note-icon f-s-20 d-none d-md-flex">
              <i class="icon fas fa-info fa-2x"></i>
            </div>
            <div class="note-content">
              <h4 class="m-t-5 m-b-5 p-b-2">¿Como verificarlo?</h4>
              <ul class="m-b-5 p-l-25">
                <li>Tome la foto del documento entregada por el cliente y la del mismo y valide que sea la misma persona.</li>
                <li>Guarde en su equipo todos los archivos suministrados por el cliente con un nombre que haga referencia al archivo.</li>
                <li>Si considera que coinciden y todo es correcto, proceda a subir los archivos verificando asi su identidad.</li>
              </ul>
              <br/>
              <p>Al verificar el cliente asume que valido los datos suminsitrados asi como la coincidencia y veracidad de los archivos entregados, aceptando los terminos del <a href="#">contrato de verificación</a></p>
            </div>
          </div>
          @if (count($usuariosPersonas) > 0)
          <form action="{{route('verificacionCliente')}}" onsubmit="return verificarCliente()" method="POST" enctype="multipart/form-data">
            @csrf
              <div class="row">
                <div class="form-group col-12 col-md-7 m-auto">
                  <label for="cmbClientes">Cliente</label>
                  <select id="cmbClientes" class="default-select2 form-control select2-hidden-accessible" name="cliente" style="width: 100%;" required>
                  
                    <option value="0" disabled selected="">Seleccione un Cliente...</option>
                    @foreach ($usuariosPersonas as $usuario)
                      <option value="{{$usuario->IdUsuarioR}}">{{$usuario->DatosPersona->Nombre . ' ' . $usuario->DatosPersona->PrimerApellido . ' ' . $usuario->DatosPersona->SegundoApellido . ' - ' . $usuario->DatosPersona->Documento }}</option>
                    @endforeach
                  </select>              
                </div>
              </div>
                        
              <div class="row mt-5">
                <div class="col-12">
                  <label for="archivos">Archivos</label>
                  <input id="archivos" name="imagenes[]" type="file" multiple data-overwrite-initial="false" class="file-loading" accept="image/png, .jpeg, .jpg, image/gif, application/pdf" required>        
                </div>
                <!-- end panel-body -->
              </div>
              <br/>
              <button class="btn btn-success col-12 col-md-5 col-xl-4" type="submit">Verificar Cliente</button>
            </form>
          @else
            <br/>
            <center><h1 class="text-success">¡No hay clientes para verificar!</h1></center>
          @endif
        
        </div>
        <!-- /card body-->
        
        <div class="row mt-2 mb-2">
         
        </div>
      </div>
    </div>
  </div>

@endsection


@section('scripts')

<script src="{{ asset("assets/$temaDashboardRemextiven/plugins/boostrap-file/js/fileinput.min.js") }}"></script>
<!-- Select2 -->
<script src="{{ asset("assets/$temaDashboardRemextiven/plugins/select2/dist/js/select2.min.js") }}"></script>
<script src="{{ asset('js/generalScripts/Ascripts/Dashboard/Cliente/verificacionCliente.js') }}"></script>
<script>
  $("#archivos").fileinput({
    uploadAsync: false,
    dropZoneEnabled: true,
    minFileCount: 2,
    maxFileCount: 4,
    showUpload: false,
    showRemove: true,
  });

  //Initialize Select2 Elements
  $('#cmbClientes').select2();

</script>
@endsection