<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="pt-br">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="contexto" content="{{ url('/') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/favicon-16x16.png')}}">
    <title>Escala de Plantao</title>
    @include('layouts.adminlte.fragments.styles')
    @yield('css')
    @include('layouts.adminlte.fragments.scripts')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">
    {{-- Navbar --}}
    @include('layouts.adminlte.fragments.navbar')
    {{-- Main Sidebar Container --}}
    @include('layouts.adminlte.fragments.sidebar-main')
    {{-- Content Wrapper. Contains page content --}}
    <div class="content-wrapper">
        {{-- Content Header (Page header) --}}
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <h1 class="m-0 text-dark">@yield('title')</h1>
                    </div>{{-- /.col --}}
                </div>{{-- /.row --}}
            </div>{{-- /.container-fluid --}}
        </div>{{-- /.content-header --}}
        <br>
        {{-- Main content --}}
        <div class="content">
            <div class="container">
                @yield('conteudo')
            </div>{{-- /.container --}}
        </div>{{-- /.content --}}
    </div>
    {{-- /.content-wrapper --}}
    {{-- Control Sidebar --}}
    @include('layouts.adminlte.fragments.sidebar-control')
    {{-- /.control-sidebar --}}
    {{-- Main Footer --}}
    @include('layouts.adminlte.fragments.footer')
    {{--Modais--}}
    @include('layouts.adminlte.fragments.carregando')
</div>
{{-- ./wrapper --}}
@yield('js')
</body>
</html>

