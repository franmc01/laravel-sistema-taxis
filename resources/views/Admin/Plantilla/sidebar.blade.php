  <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-legacy text-sm nav-compact" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
            <a href="{{ route('administracion') }}" class="nav-link {{ request()->is('home') ? 'class=active' : ''}}">
            <i class="nav-icon fa fa-home"></i>
            <p>Inicio</p>
            </a>
        </li>

    @role('administrador')

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-users"></i>
                <p> Usuarios <i class="right fas fa-angle-left"></i> </p>
            </a>

            <ul class="nav nav-treeview">

                <li class="nav-item">
                    <a href="{{ route('usuarios.create') }}" class="nav-link">
                    <i class="fa fa-user nav-icon"></i>
                    <p>Registrar usuario</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('usuarios.index') }}" class="nav-link">
                    <i class="fa fa-address-book nav-icon" style="regular"></i>
                    <p>Usuarios activos</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('usuarios.eliminados') }}" class="nav-link">
                    <i class="fa fa-book-dead nav-icon"></i>
                    <p>Usuarios inactivos</p>
                    </a>
                </li>

            </ul>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-car"></i>
                <p> Vehiculos <i class="right fas fa-angle-left"></i> </p>
            </a>

            <ul class="nav nav-treeview">

                <li class="nav-item">
                    <a href="{{ route('vehiculos.create') }}" class="nav-link">
                    <i class="fa fa-taxi nav-icon"></i>
                    <p>Registrar vehiculo</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('vehiculos.index') }}" class="nav-link">
                    <i class="fa fa-list-alt nav-icon"></i>
                    <p>Vehiculos activos</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="fa fa-book-dead nav-icon"></i>
                    <p>Vehiculos inactivos</p>
                    </a>
                </li>

            </ul>
        </li>

        <li class="nav-item has-treeview">


            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-money-bill-alt"></i>
                <p> Cuotas de socios <i class="right fas fa-angle-left"></i> </p>
            </a>

            <ul class="nav nav-treeview">

                <li class="nav-item">
                    <a href="{{ route('cuotas.index') }}" class="nav-link">
                    <i class="fas fa-dollar-sign nav-icon"></i>
                    <p>Control de cuotas</p>
                    </a>
                </li>

            </ul>
        </li>

    @endrole
</ul>
