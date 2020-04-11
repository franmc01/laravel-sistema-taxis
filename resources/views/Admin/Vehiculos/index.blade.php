@extends('Admin.Plantilla.layout') @section('header') <h1> Registros activos <small>Lista de registros</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('administracion') }}"><i class="fa fa-dashboard"></i>Inicio</a></li>
    <li class="active">Vehiculos</li>
</ol> @endsection @section('content') <div class="col-md-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Listado de vehiculos</h3>
            <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm"><span
                    style="padding-right:5px"><i class="fa fa-plus" aria-hidden="true"></i></span> Create
                Record</button>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="vehicle_table" class="table table-bordered table-striped table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Marca</th>
                            <th>Tipo de Vehículo</th>
                            <th>Placa</th>
                            <th>Año</th>
                            <th>ID Dueño</th>
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