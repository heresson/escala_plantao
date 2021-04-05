<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link logo-switch">
        <img src="{{asset('/img/logo-mppa-mini-branca.png')}}" alt="GePs" class="brand-image-xl logo-xs">
        <img src="{{asset('/img/logo-mppa-horizontal-branca.png')}}" alt="GePs" class="brand-image-xs logo-xl">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('/escala') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Escalas Cadastradas</p>
                    </a>
                </li>

                @if( Auth::user() )
                <li class="nav-item">
                    <a href="{{ url('/escala/create') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Criar Escala</p>
                    </a>
                </li>
                @endif

                @if( Auth::check() )
                    <li class="nav-item">
                        <a href="{{ url('/logout') }}" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Sair</p>
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ url('/login') }}" class="nav-link">
                            <i class="nav-icon fas fa-sign-in-alt"></i>
                            <p>Entrar</p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
