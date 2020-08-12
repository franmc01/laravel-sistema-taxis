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
                                                                <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{ $logeado->nombres }} {{ $logeado->apellidos }}</h4>
                                                                <p class="mb-0"><span class="badge badge-success">Activo</span></p>
                                                                <div class="text-muted"><small>{{ $logeado->last_login }}</small></div>
                                                                <div class="mt-2">
                                                                    <button class="btn btn-primary" type="button">
                                                                        <i class="fa fa-fw fa-camera"></i>
                                                                        <span>Cambiar foto</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="text-center text-sm-right">
                                                                <span class="badge badge-secondary">{{ $logeado->getRoleNames()->implode(',') }}</span>
                                                                <div class="text-muted"><small>Se unió el {{ $logeado->created_at->isoFormat('d MMMM') }} de {{ $logeado->created_at->isoFormat('YYYY') }}</small></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <ul class="nav nav-tabs">
                                                        <li class="nav-item"><a href="" class="active nav-link">Mi información</a></li>
                                                    </ul>
                                                    <div class="tab-content pt-3">
                                                        <div class="tab-pane active">
                                                            <form class="form">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <div class="form-group">
                                                                                    <label>Nombres:</label>
                                                                                    <input class="form-control" type="text" name="name" value="{{ $logeado->nombres }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col">
                                                                                <div class="form-group">
                                                                                    <label>Apellidos:</label>
                                                                                    <input class="form-control" type="text" name="username" value="{{ $logeado->apellidos }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <div class="form-group">
                                                                                    <label>Cédula:</label>
                                                                                    <input class="form-control" type="text" value="{{ $logeado->cedula }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col">
                                                                                <div class="form-group">
                                                                                    <label>Correo personal:</label>
                                                                                    <input class="form-control" type="text" value="{{ $logeado->email }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col d-flex justify-content-end">
                                                                        <button class="btn btn-primary" type="submit">Guardar cambios</button>
                                                                    </div>
                                                                </div>
                                                            </form>
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
