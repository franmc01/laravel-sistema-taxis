@extends('Admin.Plantilla.layout')

@section('header')

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Vehiculos <small> - Formulario registro</small></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('administracion') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('usuarios.index') }}">Vehiculos</a></li>
                <li class="breadcrumb-item active">Crear</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->

@endsection

@section('content')

@if($errors->any())
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4> Atención:</h4>
    <ul>
        @foreach( $errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(Session::has('creado'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4> Atención:</h4> El Vehículo se ha registrado con exito
</div>
@endif

<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-gray">
            <div class="card-header">
                <h4 class="card-title"> Información del vehiculo </h4>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="mb-0">
                    <form method="POST" action="{{ route('vehiculos.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="marca">Marca de Vehículo: </label>
                                    <input type="text" class="form-control" name="marca" value="{{ old('marca') }}" placeholder="Ingrese la marca del vehículo " required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="tipoVehiculo">Tipo de Vehículo: </label>
                                    <input type="text" class="form-control" name="tipoVehiculo" value="{{ old('tipoVehiculo') }}" placeholder="Ingrese el tipo de vehículo " required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="id_user">Listado de socios: </label>
                                    <select class="form-control select2" name="user_id" id="user_id" style="width:100%; height:100%">
                                        <option style="color:gray;" value="{{ old('user_id') }}">
                                            Seleccione a un socio</option>
                                        @foreach($users as $item)
                                        <option value="{{ $item->id }}">{{ $item->nombres }}
                                            {{ $item->apellidos }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="placa">Placa: </label>
                                    <input type="text" class="form-control" name="placa" value="{{ old('placa') }}" placeholder="Ingrese la placa del vehículo " required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="anio">Año de Fabricación: </label>
                                    <input type="text" class="form-control" name="anio" value="{{ old('anio') }}" placeholder="Ingrese el año de fabricación" required>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    //Initialize Select2 Elements
    $(function() {
        $('.select2').select2();
    });
</script>
@endsection
