@extends('Admin.Plantilla.layout')

@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Mi cuenta</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('administracion') }}">Mi perfil</a></li>
                <li class="breadcrumb-item active">Información de mi cuenta</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-gray">
            <div class="card-header">
                <h4 class="card-title">
                    Perfil
                </h4>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="mb-0">
                    <div class="container">
                        <div class="row flex-lg-nowrap">
                            <div class="col">
                                <div class="row">
                                    <div class="col mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="e-profile">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-auto mb-3">
                                                            <div class="mx-auto" style="width: 140px;">
                                                                <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                                                                    <span><img src="{{ auth()->user()->foto_perfil ? '/storage/auth()->user()->foto_perfil' : '/img/user.jpg'}}" alt="" height="140px" width="140px"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                                            <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                                <h5 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{ $logeado->nombres }} {{ $logeado->apellidos }}</h5>
                                                                <p class="mb-0"><span class="badge badge-success">Activo</span></p>
                                                                <div class="text-muted"><small>{{ $logeado->last_login }}</small></div>
                                                                <div class="mt-2">
                                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                                                        <i class="fa fa-fw fa-camera"></i>
                                                                        <span>Cambiar foto</span>
                                                                    </button>
                                                                    @include('Snnipets\profile-change-photo')
                                                                </div>
                                                            </div>
                                                            <div class="text-center text-sm-right">
                                                                <span class="badge badge-secondary">{{ $logeado->getRoleNames()->implode(',') }}</span>
                                                                <div class="text-muted"><small>Se unió el {{ $logeado->created_at->isoFormat('d MMMM') }} de {{ $logeado->created_at->isoFormat('YYYY') }}</small></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <ul class="nav nav-tabs">
                                                        <li class="nav-item">
                                                            <a href="" data-target="#personal" data-toggle="tab" class="active nav-link">Información personal</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="" data-target="#vehiculo" data-toggle="tab" class="nav-link">Información del vehiculo</a>
                                                        </li>

                                                        <li class="nav-item">
                                                            <a href="" data-target="#chofer" data-toggle="tab" class="nav-link">Información del chofer</a>
                                                        </li>

                                                    </ul>
                                                    <div class="tab-content py-4">
                                                        <div class="tab-pane active" id="personal">
                                                            @include('Snnipets.profile-info-socio')
                                                        </div>
                                                        <div class="tab-pane" id="vehiculo">
                                                            @include('Snnipets.profile-info-vehiculo')
                                                        </div>
                                                        <div class="tab-pane" id="chofer">
                                                            @include('Snnipets.profile-info-chofer')
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
