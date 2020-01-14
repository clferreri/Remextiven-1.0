@extends('AdminDashboard/layouts/layout')

@section('contenidoHeader')
    
@endsection


@section('menu-clientes')
  menu-open
@endsection

@section('link-clientes')
  active
@endsection

@section('link-clientes-generar')
  active
@endsection



@section('contenido')  
 <!-- CUERPO DE LA PAGINA-->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Generar Cliente</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Generar Cliente</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Datos del Usuario</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="formularioNuevoCliente">
                <div class="card-body">

                  <div class="row">
                      <div class="form-group col-12 col-md-6">
                        <label for="exampleInputPassword1">Primer Nombre</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text d-none d-sm-block"><i class="fas fa-address-card"></i></span>
                            </div>
                            <input type="text" class="form-control" id="txtNombre" placeholder="Primer nombre" name="nombre" onblur="casillaNombre();">
                          </div>
                      </div>

                      <div class="form-group col-12 col-md-6">
                        <label for="exampleInputPassword1">Segundo Nombre</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text d-none d-sm-block"><i class="fas fa-address-card"></i></span>
                            </div>
                            <input type="text" class="form-control" id="txtNombre" placeholder="segundo nombre" name="nombre" onblur="casillaNombre();">
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="form-group col-12 col-md-6">
                        <label for="exampleInputPassword1">Primer Apellido</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text d-none d-sm-block"><i class="fas fa-address-card"></i></span>
                          </div>
                          <input type="text" class="form-control" id="txtPrimerApellido" placeholder="Primer apellido / apellido Paterno" name="apellido" onblur="casillaApellido();">
                        </div>        
                      </div>

                      <div class="form-group col-12 col-md-6">
                        <label for="exampleInputPassword1">Segundo Apellido</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text d-none d-sm-block"><i class="fas fa-address-card"></i></span>
                            </div>
                            <input type="text" class="form-control" id="txtSegundoApellido" placeholder="Segundo apellido / apellido Materno" name="segundoApellido" onblur="casillaApellido2();">
                          </div>  
                        
                      </div>
                  </div>
                 
                  <div class="row">
                      <div class="form-group col-12 col-md-6">
                          <label for="exampleInputPassword1">Documento</label>
                          <div class="input-group">
                            <input type="text" class="form-control col-8" id="txtDocumento" placeholder="Cedula / Pasaporte" onblur="casillaDocumento();">
                            <select class="form-control col-4" id="cmbTipoDocumento">
                                <option value="DNI" selected>DNI</option>
                                <option value="PAS">PAS</option>
                            </select>
                          </div>                  
                      </div>
                      <div class="form-group col-12 col-md-6">
                        <label for="exampleInputPassword1">Pais Emision de Documento</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-globe-americas"></i></span>
                          </div>
                          <select class="form-control" id="cmbPaisEmisionDocumento" onchange="quitarInvalido('cmbPaisEmisionDocumento');">
                            <option value="0" disabled selected>Seleccione un Pais...</option>
                            @foreach ($paises as $pais)
                                <option value="{{ $pais->IdPais }}" style="background-image:url({{$pais->ImagenBandera}});">{{$pais->Pais }}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="form-group col-12 col-md-6">
                          <label for="exampleInputPassword1">Pais</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-globe-americas"></i></span>
                            </div>
                            <select class="form-control" id="cmbPaisResidente" onchange="quitarInvalido('cmbPaisResidente');">
                              <option value="0" disabled selected>Seleccione un Pais...</option>
                              @foreach ($paises as $pais)
                                <option value="{{ $pais->IdPais }}" style="background-image:url({{$pais->ImagenBandera}});">{{$pais->Pais }}</option>
                              @endforeach
                            </select>
                          </div>
                      </div>
                      <div class="form-group col-12 col-md-6">
                        <label for="exampleInputPassword1">Ciudad</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-city"></i></span>
                            </div>
                            <select class="form-control" id="cmbCiudadResidente" onchange="quitarInvalido('cmbCiudadResidente');">
                              <option value="1"  selected>Seleccione una Ciudad...</option>
                            </select>
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="form-group col-12 col-md-6">
                        <label for="exampleInputPassword1">Dirección</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-home"></i></span>
                            </div>
                            <input type="text" class="form-control col-8" id="txtDireccion" placeholder="Ingresa la dirección" onblur="casillaDireccion();">
                            <input type="text" class="form-control col-4" id="txtNumeroPuerta" placeholder="N° Puerta" onblur="quitarInvalidoCasillaNumerica('txtNumeroPuerta');">
                          </div>
                      </div>

                      <div class="form-group col-12 col-md-6">
                        <label for="exampleInputPassword1">Telefono</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                          </div>
                          <input type="text" class="form-control" id="txtTelefono" placeholder="Ingresa un telefono de contacto" onblur="quitarInvalidoCasillaNumerica('txtTelefono');">
                        </div>
                      </div>
                  </div>

                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" id="btnAgregarCliente" class="btn btn-success col-6 col-sm-5 col-md-3 float-right">Agregar</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
            </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    
  @endsection


  @section('scripts')
    <script src="{{ asset('js/generalScripts/validacionesGenerales.js') }}"></script>
    <script src="{{ asset('js/generalScripts/Ascripts/Dashboard/Cliente/altaCliente.js') }}"></script>
  @endsection