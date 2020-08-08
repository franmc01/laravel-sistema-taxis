@extends('Admin.Plantilla.layout')

@section('header')

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Página principal <small> - Formulario de edición</small></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('administracion') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('usuarios.index') }}">Pagina principal</a></li>
                <li class="breadcrumb-item active">Editar</li>
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
                    Información de la página principal
                </h4>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="mb-0">
                    <form id="update">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="historia">Historia</label>
                                    <textarea type="text" class="form-control" value="#" name="historia" id="" cols="30" rows="5"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="mision">Misión</label>
                                    <textarea type="text" class="form-control" value="#" name="mision" id="" cols="30" rows="5"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="historia">Visión</label>
                                    <textarea type="text" class="form-control" value="#" name="historia" id="" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6" style="margin-top:100px;">
                                <div class="form-group">
                                    <label for="">Dirección</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                    <label for="">Teléfono 1:</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                    <label for="">Teléfono 2:</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                    <label for="">Correo de contacto</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.col-->
</div>
@endsection
