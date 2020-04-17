<ul class="sidebar-menu" data-widget="tree">
   <br>
    <!-- Optionally, you can add icons to the links -->
    <li {{ request()->is('home') ? 'class=active' : ''}}><a href="{{ route('administracion') }}"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
    {{-- <li><a href="#"><i class="fa fa-users"></i> <span>Usuarios</span></a></li> --}}



    @role('administrador')
    <li class="treeview {{ request()->is('home/usuarios') ? 'active' : ''}}"><a href="#"><i class="fa fa-users"></i> <span>Usuarios</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
        <ul class="treeview-menu">
            <li><a href="{{ route('usuarios.create') }}"><i class="fa fa-user-plus"></i><span>Registrar usuario</span></a></li>
            <li {{ request()->is('home/usuarios/activos') ? 'class=active' : ''}}><a href="{{ route('usuarios.index') }}"><i class="fa fa-address-book"></i><span>Listar registros activos</span></a></li>
            <li><a href="{{ route('usuarios.eliminados') }}"><i class="fa fa-address-book"></i><span>Listar registros inactivos</span></a></li>
        </ul>
    </li>
    <li class="treeview {{ request()->is('home/vehiculos') ? 'active' : ''}}"><a href="#"><i class="fa fa-car"></i> <span>Vehiculos</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
        <ul class="treeview-menu">
            <li><a href="{{ route('vehiculos.create') }}"><i class="fa fa-taxi"></i><span>Registrar Vehículo</span></a></li>
            <li {{ request()->is('home/vehiculos/activos') ? 'class=active' : ''}}><a href="{{ route('vehiculos.index') }}"><i class="fa fa-address-book"></i><span>Listar registros activos</span></a></li>
        </ul>
    </li>
    <li class="treeview {{ request()->is('home/cuotas') ? 'active' : ''}}"><a href="#"><i class="fas fa-wallet"></i> <span>Money</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
        <ul class="treeview-menu">
            <li><a href="{{ route('cuotas.index') }}"><i class="fas fa-file-invoice-dollar"></i><span>Control de Cuotas</span></a></li>
        </ul>
    </li>
    @endrole
  </ul>
