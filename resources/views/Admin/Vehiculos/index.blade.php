@extends('Admin.Plantilla.layout')
@section('header')

<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Vehiculos <small> - Lista de vehiculos asociados</small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('administracion') }}">Inicio</a></li>
          <li class="breadcrumb-item active">Vehiculos</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->

@endsection
@section('content')
<div class="col-md-12">
    <div class="card card-outline card-gray">
        <div class="card-header text-center">
            <a class="btn btn-primary pull-left" href="{{ route('vehiculos.create') }}"><span style="padding-right:5px">              <i class="fa fa-plus" aria-hidden="true"></i></span> Registrar vehiculo</a>
        </div>
        <!-- /.box-header -->
        <div class="card-body">
            <div class="table-responsive">
                <table id="vehicle_table" class="table table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Marca</th>
                            <th>Tipo de Vehículo</th>
                            <th>Placa</th>
                            <th>Año</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
        @extends('Snnipets.vehicle')
    </div>
    <!-- /.box -->
</div> @endsection
