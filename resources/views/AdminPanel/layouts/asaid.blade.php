<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <a href="javascript:;" data-toggle="nav-profile">
                    <div class="cover with-shadow"></div>
                    <div class="image">
                        <img src="{{asset('img/images/avatar/av-clferreri941P.jpg')}}" alt="" />
                    </div>
                    <div class="info">
                        <b class="caret pull-right"></b>Cristian Ferreri
                        <small>Director de Tecnologia</small>
                    </div>
                </a>
            </li>
            <li>
                <ul class="nav nav-profile">
                    <li><a href="javascript:;"><i class="fa fa-cog"></i> Configuración</a></li>
                    <li><a href="javascript:;"><i class="fa fa-pencil-alt"></i> Editar Perfil</a></li>
                    <li><a href="javascript:;"><i class="fa fa-question-circle"></i> Ayuda</a></li>
                </ul>
            </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav"><li class="nav-header">Panel de Administración</li>
            <li class="@yield('menu-dashboard')">
                <a href="javascript:;">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="has-sub @yield('menu-transferencias')">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fas fa-hand-holding-usd"></i>
                    <span>Transferencia</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="ui_general.html">Generar Transferencia</a></li>
                    <li><a href="ui_typography.html">En proceso</a></li>
                </ul>
            </li>

            <li class="has-sub @yield('menu-clientes')">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fas fa-users"></i>
                    <span>Clientes</span>
                </a>
                <ul class="sub-menu">
                    <li class="@yield('link-clientes-generar')"><a href="{{route('nuevoCliente')}}">Nuevo Cliente</a></li>
                    <li class="@yield('link-verificarCliente')"><a href="ui_typography.html">Verificar Cliente</a></li>
                </ul>
            </li>

            <li class="has-sub @yield('menu-equipo')">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fas fa-street-view"></i>
                    <span>Equipo</span>
                </a>
                <ul class="sub-menu">
                    <li class="@yield('link-equipo-generar')"><a href="{{route('nuevoUsuarioR')}}">Generar Usuario</a></li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fas fa-headset"></i>
                    <span>Soporte</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="ui_general.html">Generar Transferencia</a></li>
                    <li><a href="ui_typography.html">En proceso</a></li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fas fa-chart-line"></i>
                    <span>Informes</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="ui_general.html">Generar Transferencia</a></li>
                    <li><a href="ui_typography.html">En proceso</a></li>
                </ul>
            </li>

            <li class="nav-header">Sistema</li>

            <li class="has-sub @yield('menu-tasaYmargen')">
                <a href="{{route('configTasas')}}">
                    <i class="fas fa-file-invoice-dollar"></i>
                    <span>Tasa y Margen</span>
                </a>
            </li>


            <li class="nav-header">Personal</li>

            <li class="has-sub">
                <a href="javascript:;">
                    <i class="fas fa-file-invoice-dollar"></i>
                    <span>Calendario</span>
                </a>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <i class="fas fa-file-invoice-dollar"></i>
                    <span>Pendientes</span>
                </a>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <i class="fas fa-file-invoice-dollar"></i>
                    <span>Pendientes</span>
                </a>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <i class="fas fa-file-invoice-dollar"></i>
                    <span>Pendientes</span>
                </a>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <i class="fas fa-file-invoice-dollar"></i>
                    <span>Pendientes</span>
                </a>
            </li>
            
            <!-- begin sidebar minify button -->
            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
            <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->