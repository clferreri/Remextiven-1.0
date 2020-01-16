@extends('AdminPanel/layouts/layout')

@section('contenidoHeader')
    
@endsection


@section('menu-tasaYmargen')
  active
@endsection



@section('contenido')  
 <!-- CUERPO DE LA PAGINA-->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Configuración</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Configuración</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header ui-sortable-handle">
                <h3 class="card-title">Calculadora de Tasas</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="formularioNuevoCliente">
                <div class="card-body">

                  @if (is_null($tasa))
                    <div class="row  text-center">

                      <div class="col-12 col-sm-6 col-md-4 m-auto">
                        <label for="">USD/COP</label>
                        <div class="input-group" style="justify-content: center;">
                          <input class="form-control text-center col-6 col-md-5" type="text" id="txtCopUSD" value="0" onkeyup="ComaPorPunto('txtCopUSD');"/>
                          <div class="input-group-text" style="margin-left: -1px;">COP</div>
                        </div>
                        <p class="text-muted" style="font-size: 13px;">1 USD = X COP</p>
                      </div>

                      <div class="col-12 col-sm-6 col-md-4 m-auto">
                        <label for="">Tasa CambioPaya</label>
                        <div class="input-group" style="justify-content: center;">
                          <input class="form-control text-center col-5" type="text" id="txtVesCop" value="0" onkeyup="ComaPorPunto('txtVesCop');"/>
                          <div class="input-group-text" style="margin-left: -1px;">COP</div>
                        </div>
                        <p class="text-muted" style="font-size: 13px;">1 VES = X COP</p>
                      </div>

                      <div class="col-12 col-sm-6 col-md-4 m-auto">
                        <label for="">Tasa USD/UYU</label>
                        <div class="input-group" style="justify-content: center;">
                          <input class="form-control text-center col-5" type="text" id="txtUyuUSD" value="0" onkeyup="ComaPorPunto('txtUyuUSD');"/>
                          
                          <div class="input-group-text" style="margin-left: -1px;">UYU</div>
                        </div>
                        <p class="text-muted" style="font-size: 13px;">1 USD = X UYU</p>
                      </div>
                    
                    </div>

                    <div class="row text-center mt-2">

                      <div class="col-12 col-sm-6 col-md-4 m-auto">
                        <label for="">UYU/COP</label>
                        <div class="input-group" style="justify-content: center;">
                          <input class="form-control text-center col-5" type="text" id="txtCopUyu" value="SIN CALCULAR" readonly/>
                          <div class="input-group-text" style="margin-left: -1px;">COP</div>
                        </div>
                        <p class="text-muted" style="font-size: 13px;">1 UYU = X COP</p>
                      </div>

                      <div class="col-12 col-sm-6 col-md-4 m-auto">
                        <label for="">UYU/VES</label>
                        <div class="input-group" style="justify-content: center;">
                          <input class="form-control text-center col-5" type="text" id="txtVesUyu" value="SIN CALCULAR" readonly/>
                          <div class="input-group-text" style="margin-left: -1px;">VES</div>
                        </div>
                        <p class="text-muted" style="font-size: 13px;">1 UYU = X VES</p>
                      </div>

                      <div class="col-12 col-sm-6 col-md-4 m-auto">
                        <label for="">USD/VES</label>
                        <div class="input-group" style="justify-content: center;">
                          <input class="form-control text-center col-5" type="text" id="txtVesUsd" value="SIN CALCULAR" readonly/>
                          <div class="input-group-text" style="margin-left: -1px;">VES</div>
                        </div>
                        <p class="text-muted" style="font-size: 13px;">1 USD = X VES</p>
                      </div>
                    </div>

                    <div class="row text-center mt-3">
                      <button type="button" id="btnActualizarTasa" class="btn btn-success col-10 col-sm-8 col-md-5 m-auto" onclick="ActualizarTasa();">Actualizar</button>
                    </div>

                    <hr/>
                    <div class="row text-center mt-4 mb-3 ">
                      <table class="col-12 col-md-10 col-lg-8 table table-bordered m-auto">
                        <thead class="thead-light">
                          <tr>
                            <th class="d-none d-sm-table-cell" style="font-weight: bold; vertical-align:middle;" colspan="2">Tasa Banesco</th>
                            <th class="d-sm-none" style="font-weight: bold; vertical-align:middle;" colspan="2">Banesco</th>
                            <th class="d-none d-sm-table-cell" style="font-weight: bold" colspan="2">Tasa Otros Bancos</th>
                            <th class="d-sm-none"  style="font-weight: bold" colspan="2">Otros Bancos</th>
                          </tr>
                        </thead>
                        
                        <tr>
                          <td class="d-none d-sm-table-cell" style="font-weight: bold">Tasa USD</td>
                          <td class="d-none d-sm-table-cell" style="font-weight: bold">Tasa UYU</td>
                          <td class="d-none d-sm-table-cell" style="font-weight: bold">Tasa USD</td>
                          <td class="d-none d-sm-table-cell" style="font-weight: bold">Tasa UYU</td>
                          
                          <td class="d-sm-none" style="font-weight: bold">USD</td>
                          <td class="d-sm-none" style="font-weight: bold">UYU</td>
                          <td class="d-sm-none" style="font-weight: bold">USD</td>
                          <td class="d-sm-none" style="font-weight: bold">UYU</td>
                        </tr>
                        <tr>
                          <td id="tdBanescoUSD">-</td>
                          <td id="tdBanescoUYU">-</td>
                          <td id="tdOtroUSD">-</td>
                          <td id="tdOtroUYU">-</td>
                        </tr>
                      </table>
                    </div>
                  @else

                    <div class="row  text-center">

                      <div class="col-12 col-sm-6 col-md-4 m-auto">
                        <label for="">USD/COP</label>
                        <div class="input-group" style="justify-content: center;">
                        <input class="form-control text-center col-6 col-md-5" type="text" id="txtCopUSD" value="{{$tasa->USDCOP}}" onkeyup="ComaPorPunto('txtCopUSD');"/>
                          <div class="input-group-text" style="margin-left: -1px;">COP</div>
                        </div>
                        <p class="text-muted" style="font-size: 13px;">1 USD = X COP</p>
                      </div>

                      <div class="col-12 col-sm-6 col-md-4 m-auto">
                        <label for="">Tasa CambioPaya</label>
                        <div class="input-group" style="justify-content: center;">
                          <input class="form-control text-center col-5" type="text" id="txtVesCop" value="{{$tasa->VESCOP}}"  onkeyup="ComaPorPunto('txtVesCop');">
                          <div class="input-group-text" style="margin-left: -1px;">COP</div>
                        </div>
                        <p class="text-muted" style="font-size: 13px;">1 VES = X COP</p>
                      </div>

                      <div class="col-12 col-sm-6 col-md-4 m-auto">
                        <label for="">Tasa USD/UYU</label>
                        <div class="input-group" style="justify-content: center;">
                          <input class="form-control text-center col-5" type="text" id="txtUyuUSD" value="{{$tasa->USDUYU}}"   onkeyup="ComaPorPunto('txtUyuUSD');">
                          <div class="input-group-text" style="margin-left: -1px;">UYU</div>
                        </div>
                        <p class="text-muted" style="font-size: 13px;">1 USD = X UYU</p>
                      </div>
                    
                    </div>

                    <div class="row text-center mt-2">

                      <div class="col-12 col-sm-6 col-md-4 m-auto">
                        <label for="">UYU/COP</label>
                        <div class="input-group" style="justify-content: center;">
                          <input class="form-control text-center col-5" type="text" id="txtCopUyu" value="{{$tasa->UYUCOP}}" readonly/>
                          <div class="input-group-text" style="margin-left: -1px;">COP</div>
                        </div>
                        <p class="text-muted" style="font-size: 13px;">1 UYU = X COP</p>
                      </div>

                      <div class="col-12 col-sm-6 col-md-4 m-auto">
                        <label for="">UYU/VES</label>
                        <div class="input-group" style="justify-content: center;">
                          <input class="form-control text-center col-5" type="text" id="txtVesUyu" value="{{$tasa->UYUVES}}" readonly/>
                          <div class="input-group-text" style="margin-left: -1px;">VES</div>
                        </div>
                        <p class="text-muted" style="font-size: 13px;">1 UYU = X VES</p>
                      </div>

                      <div class="col-12 col-sm-6 col-md-4 m-auto">
                        <label for="">USD/VES</label>
                        <div class="input-group" style="justify-content: center;">
                          <input class="form-control text-center col-5" type="text" id="txtVesUsd" value="{{$tasa->USDVES}}" readonly/>
                          <div class="input-group-text" style="margin-left: -1px;">VES</div>
                        </div>
                        <p class="text-muted" style="font-size: 13px;">1 USD = X VES</p>
                      </div>
                    </div>

                    <div class="row text-center mt-3">
                      <button type="button" id="btnAgregarCliente" class="btn btn-success col-10 col-sm-8 col-md-5 m-auto" onclick="ActualizarTasa();">Actualizar</button>
                    </div>

                    <hr/>
                    <div class="row text-center mt-4 mb-3 ">
                      <table class="col-12 col-md-10 col-lg-8 table table-bordered m-auto">
                        <thead class="thead-light">
                          <tr>
                            <th class="d-none d-sm-table-cell" style="font-weight: bold; vertical-align:middle;" colspan="2">Tasa Banesco</th>
                            <th class="d-sm-none" style="font-weight: bold; vertical-align:middle;" colspan="2">Banesco</th>
                            <th class="d-none d-sm-table-cell" style="font-weight: bold" colspan="2">Tasa Otros Bancos</th>
                            <th class="d-sm-none"  style="font-weight: bold" colspan="2">Otros Bancos</th>
                          </tr>
                        </thead>
                        
                        <tr>
                          <td class="d-none d-sm-table-cell" style="font-weight: bold">Tasa USD</td>
                          <td class="d-none d-sm-table-cell" style="font-weight: bold">Tasa UYU</td>
                          <td class="d-none d-sm-table-cell" style="font-weight: bold">Tasa USD</td>
                          <td class="d-none d-sm-table-cell" style="font-weight: bold">Tasa UYU</td>
                          
                          <td class="d-sm-none" style="font-weight: bold">USD</td>
                          <td class="d-sm-none" style="font-weight: bold">UYU</td>
                          <td class="d-sm-none" style="font-weight: bold">USD</td>
                          <td class="d-sm-none" style="font-weight: bold">UYU</td>
                        </tr>
                        <tr>

                          <td id="tdBanescoUSD">{{$tasa->TasaBanescoUSD}} VES</td>
                          <td id="tdBanescoUYU">{{$tasa->TasaBanescoUYU}} VES</td>
                          <td id="tdOtroUSD">{{$tasa->TasaOtroUSD}} VES</td>
                          <td id="tdOtroUYU">{{$tasa->TasaOtroUYU}} VES</td>
                        </tr>
                      </table>                
                    </div>
                  @endif
                  <br/>
                  @foreach ($margenesGanancia as $porcentaje)
                    @if ($porcentaje->Actual)
                      <p class="text-muted text-center" style="margin-top: -30px;">Tasas ajustadas al margen actual de <span id="txtMargenTexto">{{$porcentaje->TextoGanancia}}</span> de ganancia</p>
                    @endif                
                @endforeach                     
                </div>
                <!-- /.card-body -->
               
              </form>
            </div>
            <!-- /.card -->
            </div>
            </div>

            <div class="row mt-3">
              <div class="col-md-12">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Margen de Ganancia</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" id="formularioNuevoCliente">
                    <div class="card-body">
    
                      <div class="row text-center">
                        <div class="col-12">
                          <label for="">Margen de Ganancia</label>
                          <select class="form-control col-12 col-sm-8 col-md-6 col-xl-4 m-auto text-center" id="cmbMargen">
                            @foreach ($margenesGanancia as $porcentaje)
                              @if ($porcentaje->Actual)
                                <option selected value="{{$porcentaje->IdMargen}}">{{$porcentaje->TextoGanancia}}</option>
                              @else
                                <option value="{{$porcentaje->IdMargen}}">{{$porcentaje->TextoGanancia}}</option>
                              @endif                
                            @endforeach  
                          </select>
                        </div>
                      </div>
    
                      <div class="row">
                      
                      </div>
    
                                   
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-center">
                      <button type="button" id="btnAgregarCliente" class="btn btn-success col-10 col-sm-8 col-md-5 m-auto" onclick="ActualizarMargen();">Actualizar</button>
                    </div>
                  </form>
                </div>
                <!-- /.card -->
                </div>
                </div>
    
  @endsection


  @section('scripts')
  <script type="text/javascript" src="{{asset("js/generalScripts/Ascripts/Dashboard/Tasas/actualizarTasas.js")}}"></script>
  <script type="text/javascript" src="{{asset("js/generalScripts/validacionesGenerales.js")}}"></script>
  @if (is_null($tasa))
      <script>
        CargarTasaDolar();
      </script>
  @endif
  @endsection