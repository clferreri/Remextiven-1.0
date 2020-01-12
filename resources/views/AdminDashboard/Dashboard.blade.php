@extends('AdminDashboard/layouts/layout')

@section('contenidoHeader')
    
@endsection

@section('contenido')
<div class="container-fluid">
    <!-- ROW -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- Caja indicador -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>150</h3>
                    <p>Envios realizados</p>
                </div>
                <div class="icon">
                    <i class="fas fa-paper-plane"></i>
                </div>
                <a href="#" class="small-box-footer">Mas información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            <!-- ./Caja indicador -->
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-6">
            <!-- Caja indicador -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>
                    <p>Envios completados</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">Mas información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            <!-- ./Caja indicador -->
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-6">
            <!-- Caja indicador -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>44</h3>
                    <p>Usuarios registrados</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">Mas información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            <!-- ./Caja indicador -->
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>65</h3>
                    <p>Reclamos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <a href="#" class="small-box-footer">Mas información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->

    <!--row-->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>65</h3>
                <p>Reclamos</p>
            </div>
            <div class="icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <a href="#" class="small-box-footer">Mas información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->


  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
        <div class="inner">
            <h3>24%</h3>
            <p>Crecimeinto</p>
        </div>
        <div class="icon">
            <i class="fas fa-chart-line"></i>
        </div>
        <a href="#" class="small-box-footer">Mas información <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->

<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-success">
      <div class="inner">
          <h3>560 VES</h3>
          <p>Cotizacion por $</p>
      </div>
      <div class="icon">
          <i class="fas fa-money-bill-alt"></i>
      </div>
      <a href="#" class="small-box-footer">Mas información <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>

<div class="col-lg-3 col-6">
  <!-- small box -->
  <div class="small-box bg-success">
      <div class="inner">
          <h3>560434 VES</h3>
          <p>Cotizacion por $</p>
      </div>
      <div class="icon">
          <i class="fas fa-money-bill-alt"></i>
      </div>
      <a href="#" class="small-box-footer">Mas información <i class="fas fa-arrow-circle-right"></i></a>
  </div>
</div>
<!-- ./col -->
  <!-- ./col -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-9">
                <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Envios problematicos</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                          <table class="table table-condensed">
                            <thead>
                              <tr>
                                <th style="width: 10px">#</th>
                                <th>Usuario</th>
                                <th style="width: 60px">Estado</th>
                                <th style="width: 45px">Acción</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1.</td>
                                <td>
                                    <img src="{{asset("assets/$temaDashboard/dist/img/user2-160x160.jpg")}}"
                                    alt="Remextiven"
                                    class="brand-image img-circle elevation-2 mr-2" style="width:45px;">
                                    Cristian Ferreri
                                </td>
                                <td><span class="badge bg-danger">Anulada</span></td>
                                <td>BORRA</td>
                              </tr>
                              <tr>
                                <td>2.</td>
                                <td>
                                    <img src="{{asset("assets/$temaDashboard/dist/img/user2-160x160.jpg")}}"
                                    alt="Remextiven"
                                    class="brand-image img-circle elevation-2 mr-2" style="width:45px;">
                                    Cristian Ferreri
                                </td>
                                <td><span class="badge bg-warning">Pausada</span></td>
                                <td>BORRA</td>
                              </tr>
                              <tr>
                                <td>3.</td>
                                <td>
                                    <img src="{{asset("assets/$temaDashboard/dist/img/user2-160x160.jpg")}}"
                                    alt="Remextiven"
                                    class="brand-image img-circle elevation-2 mr-2" style="width:45px;">
                                    Cron job running
                                </td>
                                <td><span class="badge bg-primary">Pendiente</span></td>
                                <td>BORRA</td>
                              </tr>
                              <tr>
                                <td>4.</td>
                                <td>
                                    <img src="{{asset("assets/$temaDashboard/dist/img/user2-160x160.jpg")}}"
                                    alt="Remextiven"
                                    class="brand-image img-circle elevation-2 mr-2" style="width:45px;">
                                    Cron job running
                                </td>
                                <td><span class="badge bg-success">Enviada</span></td>
                                <td>BORRA</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
        </div>
        
        <div class="col-md-3 col-sm-6 col-12">
          <!-- Info Boxes Style 2 -->
          <div class="info-box mb-3 bg-warning">
            <span class="info-box-icon"><i class="fas fa-dollar-sign"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Promedio de envio</span>
              <span class="info-box-number">US$ 57</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->

            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fas fa-dollar-sign"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Perdida en anulaciones</span>
                <span class="info-box-number">$650</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->

            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fas fa-tachometer-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Porcentaje anulaciones</span>
                <span class="info-box-number">34%</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->

              <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Inventory</span>
                <span class="info-box-number">5,200</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
</div>
@endsection