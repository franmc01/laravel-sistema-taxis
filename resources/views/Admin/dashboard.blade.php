@extends('Admin.Plantilla.layout')

@section('header')

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Panel de control</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Inicio</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->

@endsection





@section('content')
<div class="container-fluid">
    <div class="row">
        @role('Administrador')
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $u }}</h3>
                    <p>Socios registrados</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user"></i>
                </div>
                <a href="{{ route('usuarios.index') }}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $v }}</h3>
                    <p>Vehiculos asociados</p>
                </div>
                <div class="icon">
                    <i class="fa fa-car"></i>
                </div>
                <a href="{{ route('vehiculos.index') }}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $c }}</h3>
                    <p>Choferes Registrados</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user-friends"></i>
                </div>
                <a href="{{ route('choferes.index') }}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <img src="/img/lasin.png"alt="" width="100%" style="padding-left: 20%;padding-right: 20%;">
        @endrole
{{--         <div class="container">
        <h1 style="padding-top: 5%;padding-bottom: 5%;">Bienvenido {{ auth()->user()->nombres."".auth()->user()->apelllidos }} !!</h1>
        </div> --}}
        @role('Socio')
        <div class="container" style="text-align: center">
            <h1 style="padding-top: 5%;padding-bottom: 4%;">Bienvenido {{ auth()->user()->nombres."".auth()->user()->apelllidos }} !!</h1>
        </div>
        <img src="/img/lasin.png"alt="" width="100%" style="padding-left: 20%;padding-right: 20%;">
        @endrole
        {{-- 
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3>44</h3>
                    <p>Para el futuro</p>
                </div>
                <div class="icon">
                    <i class="fab fa-mailchimp"></i>
                </div>
                <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col --> --}}
    </div>
</div>

{{-- <div class="container-fluid">
    <p><strong>Usuario autenticado:</strong> {{ auth()->user()->nombres ." ".auth()->user()->apellidos  }}</p>
<p><strong>Cedula:</strong> {{ auth()->user()->cedula}}</p>
<p><strong>Correo:</strong> {{ auth()->user()->email}}</p>
</div> --}}

@endsection
