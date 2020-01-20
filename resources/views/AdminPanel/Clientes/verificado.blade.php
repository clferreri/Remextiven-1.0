@extends('AdminPanel/layouts/layout')

@section('menu-clientes')
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
    <div class="col-12 m-auto justify-content-center">              
        <div class="note note-info col-12 col-xs-6 m-auto">
            <div class="note-icon"><i class="fas fa-check"></i></div>
            <div class="note-content">
              <h4><b>Verificacion Cliente</b></h4>
              <p>El cliente <strong>{{$nombre}}</strong> fue correctamente verificado</p>
            </div>            
        </div>       
    </div>
  </div>
  <div class="row mt-2">
    <button style="margin: auto !important;" class="btn btn-primary col-12 col-xs-6 col-md-4 col-lg-3">Volver a la verificación</button>
  </div>
@endsection