<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block"><a class="nav-link titulo" href="#">Escala de Plantão</a></li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        @if (Auth::user())
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i class="fas fa-user-alt"></i>&nbsp; {{ Auth::user()->name }} &nbsp;&nbsp;<i class="fas fa-ellipsis-v"></i></a>
        </li>
        @endif
    </ul>
</nav>
<!-- /.navbar -->
