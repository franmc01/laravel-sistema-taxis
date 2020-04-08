@extends('Admin.Plantilla.layout') @section('header') <h1> Registros activos <small>Lista de registros</small>
</h1>
<ol class="breadcrumb">
    <li><a href="{{ route('administracion') }}"><i class="fa fa-dashboard"></i>Inicio</a></li>
    <li class="active">Usuarios</li>
</ol> @endsection @section('content') <div class="col-md-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Listado de usuarios</h3>
            <a class="btn btn-primary pull-right" href="{{ route('usuarios.create') }}">Crear usuario</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="tablausuarios" class="table table-bordered table-striped table-hover" cellspacing="0"
                    width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Cedula</th>
                            <th>Roles</th>
                            <th>Correo personal</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody> @foreach ($usuarios as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nombres }}</td>
                            <td>{{ $item->apellidos }}</td>
                            <td>{{ $item->cedula }}</td>
                            <td>{{ $item->getRoleNames()->implode(',') }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <form action="{{ route('usuarios.restore', $item) }}" method='POST'>
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn btn-info btn-sm">Activar</button>
                                </form>
                                <form action="{{ route('usuarios.forceDelete', $item) }}" method='POST'>
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Cedula</th>
                            <th>Roles</th>
                            <th>Correo personal</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>



        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div> @endsection
