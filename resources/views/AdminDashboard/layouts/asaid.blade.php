<!-- BARRA LATERAL IZQUIERDA -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!--Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('img/LogoFondoTransparente.png') }}"
            alt="Remextiven"
            class="brand-image"
        >
        <br/>
    </a>


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- barra de usuario -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset("img/images/avatar/av-clferreri941P.jpg")}}" style="width:56px;" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Cristian Ferreri @yield('prueba')</a>
                <a href="#" class="d-block"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('inicioAdminPanel')}}" class="nav-link @yield('menu-dashboard')">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview @yield('menu-transferencias')">
                    <a href="#" class="nav-link @yield('link-transferencias')">
                        <i class="nav-icon fas fa-hand-holding-usd"></i>
                        <p>
                            Transferencias
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('nuevaTransferencia')}}" class="nav-link @yield('link-transferencias-generar')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Generar Transferencia</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../index.html" class="nav-link @yield('link-transferencias-proceso')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>En Proceso</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../index.html" class="nav-link @yield('link-transferencias-listar')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lista de Transferencias</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../index2.html" class="nav-link @yield('link-transferencias-problematicas')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Problematicas</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview @yield('menu-clientes')">
                    <a href="#" class="nav-link @yield('link-clientes')">
                        <i class="nav-icon fa fa-user"></i>
                        <p>
                            Clientes
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('nuevoCliente')}}" class="nav-link @yield('link-clientes-generar')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Generar</p>
                            </a>
                        </li>  
                        <li class="nav-item">
                            <a href="{{route('verificarCliente')}}" class="nav-link @yield('link-clientes-verificar')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Verificar</p>
                            </a>
                        </li>   
                        <li class="nav-item">
                            <a href="../layout/top-nav.html" class="nav-link @yield('link-clientes-listar')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listado de usuarios</p>
                            </a>
                        </li>                      
                    </ul>                     
                </li> 
                <li class="nav-item has-treeview @yield('menu-usuarios')">
                    <a href="#" class="nav-link @yield('link-usuarios')">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Equipo
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../layout/top-nav.html" class="nav-link @yield('link-usuarios-listar')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Equipo Remextiven</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../layout/top-nav.html" class="nav-link @yield('link-usuarios-listar')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Calendario</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../layout/top-nav.html" class="nav-link @yield('link-usuarios-listar')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pendientes</p>
                            </a>
                        </li>                             
                    </ul>                     
                </li> 
                <li class="nav-item has-treeview @yield('menu-usuarios')">
                    <a href="#" class="nav-link @yield('link-usuarios')">
                        <i class="nav-icon fas fa-headset"></i>
                        <p>
                            Soporte
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../layout/top-nav.html" class="nav-link @yield('link-usuarios-listar')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Reclamos</p>
                            </a>
                        </li>                       
                    </ul>                     
                </li>
                <li class="nav-item has-treeview @yield('menu-usuarios')">
                    <a href="#" class="nav-link @yield('link-usuarios')">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>
                            Informes
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../layout/top-nav.html" class="nav-link @yield('link-usuarios-listar')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Transferencias</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../layout/top-nav.html" class="nav-link @yield('link-usuarios-listar')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Usuarios</p>
                            </a>
                        </li>  
                        <li class="nav-item">
                            <a href="../layout/top-nav.html" class="nav-link @yield('link-usuarios-listar')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Reclamos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../layout/top-nav.html" class="nav-link @yield('link-usuarios-listar')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Situación economica</p>
                            </a>
                        </li>                                                
                    </ul>                     
                </li>
                <li class="nav-item">
                    <a href="{{route('configTasas')}}" class="nav-link @yield('menu-config')">
                        <i class="nav-icon fas fa-file-invoice-dollar"></i>
                        <p>
                            Configuración
                        </p>
                    </a>
                </li>
                <li class="nav-header">PERSONAL</li>
                <li class="nav-item">
                    <a href="https://adminlte.io/docs/3.0" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>Calendario</p>
                    </a>
                </li>    
                <li class="nav-item">
                    <a href="https://adminlte.io/docs/3.0" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Lista de pendientes</p>
                    </a>
                </li>                               
            </ul>
        </nav>
        <!-- / slidebar menu-->
    </div>
    <!-- / slidebar -->
</aside>