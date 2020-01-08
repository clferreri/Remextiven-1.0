@extends('AdminDashboard/layouts/layout')

@section('contenidoHeader')
    
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

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">              
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Verificación</h3>
                  </div>
                  <!-- /.card-header -->

                  <div class="card-body">
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-info"></i>¿Como verificarlo?</h5>
                        1) Tome la foto del documento entregada por el cliente y la del mismo y valide que sea la misma persona<br/>
                        2) Guarde en su equipo los archivos a subir con la siguiente <a href="#" data-toggle="modal" data-target="#modalNomenclatura">nomenclatura</a> <br/>
                        3) Si considera que coinciden proceda a subir los archivos y verificando asi su identidad.
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-md-7 m-auto">
                            <label for="cmbClientes">Cliente</label>
                            <select id="cmbClientes" class="form-control select2bs4" style="width: 100%;">
                                <option value="0" disabled selected="selected">Seleccione un usuario...</option>
                                @foreach ($usuariosPersonas as $usuario)
                                  <option value="{{$usuario->IdUsuarioR}}">{{$usuario->DatosPersona->Nombre . ' ' . $usuario->DatosPersona->PrimerApellido . ' ' . $usuario->DatosPersona->SegundoApellido . ' - ' . $usuario->DatosPersona->Documento }}</option>
                                @endforeach
                            </select>              
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12 col-md-7 m-auto">
                            <label for="fileDocuments">Archivos</label>
                            <input class="form-control" multiple type="file" name="" id="">
                            <p class="text-muted">Recuerde darles nombre utilizando la nomenclatura antes de subirlos</p>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <button class="col-12 col-md-7 btn btn-success m-auto">Validar verificación</button>
                    </div>
                  </div>
          </div>
        </div>
    </section>
@endsection


@section('scripts')

@endsection