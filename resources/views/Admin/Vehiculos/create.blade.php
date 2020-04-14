@extends('Admin.Plantilla.layout')

@section('header')
<h1>
    Vehículos
    <small>Formulario de registro</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('administracion') }}"><i class="fa fa-dashboard"></i>Inicio</a></li>
    <li><a href="{{ route('usuarios.index') }}"><i class="fa fa-list"></i>Usuarios</a></li>
    <li class="active">Crear</li>
</ol>
@endsection


@section('content')
@if($errors->any())
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4> Atención:</h4>
    <ul>
        @foreach( $errors->all() as $error)
        <li>{{ $error}}</li>
        @endforeach
    </ul>
</div>
@endif
@if(Session::has('creado'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4> Atención:</h4>
    El Vehículo se ha registrado con exito
</div>
@endif

<div class="row">
    <br>
    <div class="col-md-12">
        <div class="box box-warning">
            <form method="POST" action="{{ route('vehiculos.store') }}" accept-charset="UTF-8"
                enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    <br>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="marca">Marca de Vehículo: </label>
                            <input type="text" class="form-control" name="marca"
                            value="{{ old('marca') }}" placeholder="Ingrese la marca del vehículo " required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="tipoVehiculo">Tipo de Vehículo: </label>
                            <input type="text" class="form-control" name="tipoVehiculo"
                            value="{{ old('tipoVehiculo') }}" placeholder="Ingrese el tipo de vehículo " required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="id_user">Socio : </label>
                            <div>
                                <select name="user_id" id="user_id" class="form-control">
                                    <option value="{{ old('user_id') }}">Seleccione a un socio</option>
                                    @foreach ($users as $item)
                                    <option value="{{ $item->id }}">{{ $item->nombres }} {{ $item->apellidos }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="placa">Placa: </label>
                            <input type="text" class="form-control" name="placa"
                            value="{{ old('placa') }}" placeholder="Ingrese la placa del vehículo " required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="anio">Año de Fabricación: </label>
                            <input type="text" class="form-control" name="anio"
                            value="{{ old('anio') }}" placeholder="Ingrese el año de fabricación" required>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection