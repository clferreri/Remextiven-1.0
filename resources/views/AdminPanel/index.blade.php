@extends('AdminPanel/layouts/layout')

@section('menu-dashboard')
    active
@endsection

@section('contenido')
    
<!-- Migas de pan -->
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Panel de Administración</a></li>
    <li class="breadcrumb-item active">Dashboard</li>
</ol>

<!-- /Migas de pan-->

<!-- Titulo Pagina -->
<h1 class="page-header">Dashboard</h1>
<!-- /Titulo Pagina -->


<div class="row">
    <!-- begin col-3 -->
    <div class="col-12 col-md-6 col-xl-3">
        <div class="widget widget-stats bg-blue">
            <div class="stats-icon"><i class="fas fa-paper-plane"></i></div>
            <div class="stats-info">
                <h4>ENVIOS REALIZADOS</h4>
                <p>300</p>	
            </div>
            <div class="stats-link">
                <a href="javascript:;">Mas Información <i class="fa fa-arrow-alt-circle-right"></i></a>
            </div>
        </div>
    </div>
    <!-- end col-3 -->
    <!-- begin col-3 -->
    <div class="col-xl-3 col-md-6">
        <div class="widget widget-stats bg-green">
            <div class="stats-icon"><i class="fas fa-chart-bar"></i></div>
            <div class="stats-info">
                <h4>ENVIOS COMPLETADOS</h4>
                <p>20.44%</p>	
            </div>
            <div class="stats-link">
                <a href="javascript:;">Mas Información <i class="fa fa-arrow-alt-circle-right"></i></a>
            </div>
        </div>
    </div>
    <!-- end col-3 -->
    <!-- begin col-3 -->
    <div class="col-xl-3 col-md-6">
        <div class="widget widget-stats bg-orange">
            <div class="stats-icon"><i class="fas fa-user-plus"></i></div>
            <div class="stats-info">
                <h4>USUARIOS REGISTRADOS</h4>
                <p>1,291,922</p>	
            </div>
            <div class="stats-link">
                <a href="javascript:;">Mas Información <i class="fa fa-arrow-alt-circle-right"></i></a>
            </div>
        </div>
    </div>
    <!-- end col-3 -->
    <!-- begin col-3 -->
    <div class="col-xl-3 col-md-6">
        <div class="widget widget-stats bg-red">
            <div class="stats-icon"><i class="fas fa-exclamation-triangle"></i></div>
            <div class="stats-info">
                <h4>RECLAMOS</h4>
                <p>00:12:23</p>	
            </div>
            <div class="stats-link">
                <a href="javascript:;">Mas Información <i class="fa fa-arrow-alt-circle-right"></i></a>
            </div>
        </div>
    </div>
    <!-- end col-3 -->
</div>

<div class="row">
    <!-- begin col-6 -->
    <div class="col-xl-6">
        <!-- begin card -->
        <div class="card border-0 mb-3 overflow-hidden bg-dark text-white">
            <!-- begin card-body -->
            <div class="card-body">
                <!-- begin row -->
                <div class="row">
                    <!-- begin col-7 -->
                    <div class="col-xl-7 col-lg-8">
                        <!-- begin title -->
                        <div class="mb-3 text-grey">
                            <b>TOTAL EN ENVIOS</b>
                            <span class="ml-2">
                                <i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Total de envio" data-placement="top" data-content="Hace referencia a el total de envio de este mes y lo compara con lo enviado el mes anterior"></i>
                            </span>
                        </div>
                        <!-- end title -->
                        <!-- begin total-sales -->
                        <div class="d-flex mb-1">
                            <h2 class="mb-0">$<span data-animation="number" data-value="64559.25">0.00</span></h2>
                            <div class="ml-auto mt-n1 mb-n1"><div id="total-sales-sparkline"></div></div>
                        </div>
                        <!-- end total-sales -->
                        <!-- begin percentage -->
                        <div class="mb-3 text-grey">
                            <i class="fa fa-caret-up"></i> <span data-animation="number" data-value="33.21">0.00</span>% Comparacion con el mes pasado
                        </div>
                        <!-- end percentage -->
                        <hr class="bg-white-transparent-2" />
                        <!-- begin row -->
                        <div class="row text-truncate">
                            <!-- begin col-6 -->
                            <div class="col-6">
                                <div class="f-s-12 text-grey">Total de envios</div>
                                <div class="f-s-18 m-b-5 f-w-600 p-b-1" data-animation="number" data-value="1568">0</div>
                                <div class="progress progress-xs rounded-lg bg-dark-darker m-b-5">
                                    <div class="progress-bar progress-bar-striped rounded-right bg-teal" data-animation="width" data-value="55%" style="width: 0%"></div>
                                </div>
                            </div>
                            <!-- end col-6 -->
                            <!-- begin col-6 -->
                            <div class="col-6">
                                <div class="f-s-12 text-grey">Avg. montos de envio</div>
                                <div class="f-s-18 m-b-5 f-w-600 p-b-1">$<span data-animation="number" data-value="41.20">0.00</span></div>
                                <div class="progress progress-xs rounded-lg bg-dark-darker m-b-5">
                                    <div class="progress-bar progress-bar-striped rounded-right" data-animation="width" data-value="55%" style="width: 0%"></div>
                                </div>
                            </div>
                            <!-- end col-6 -->
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end col-7 -->
                    <!-- begin col-5 -->
                    <div class="col-xl-5 col-lg-4 align-items-center d-flex justify-content-center">
                        <img src="{{ asset("assets/$temaDashboardRemextiven/img/svg/img-1.svg")}}" height="150px" class="d-none d-lg-block" />
                    </div>
                    <!-- end col-5 -->
                </div>
                <!-- end row -->
            </div>
            <!-- end card-body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col-6 -->
    <!-- begin col-6 -->
    <div class="col-xl-6">
        <!-- begin row -->
        <div class="row">
            <!-- begin col-6 -->
            <div class="col-xl-6 col-md-3">
                <div class="widget widget-stats bg-red">
                    <div class="stats-icon"><i class="fas fa-exclamation-triangle"></i></div>
                    <div class="stats-info">
                        <h4>RECLAMOS</h4>
                        <p>00:12:23</p>	
                    </div>
                    <div class="stats-link">
                        <a href="javascript:;">Mas Información <i class="fa fa-arrow-alt-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- end col-6 -->
            <!-- begin col-6 -->
            <div class="col-xl-6 col-md-3">
                <div class="widget widget-stats bg-red">
                    <div class="stats-icon"><i class="fas fa-exclamation-triangle"></i></div>
                    <div class="stats-info">
                        <h4>RECLAMOS</h4>
                        <p>00:12:23</p>	
                    </div>
                    <div class="stats-link">
                        <a href="javascript:;">Mas Información <i class="fa fa-arrow-alt-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end col-6 -->
</div>
@endsection