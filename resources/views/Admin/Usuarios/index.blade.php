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
                    <tbody> @foreach ($usuarios as $item) <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nombres }}</td>
                            <td>{{ $item->apellidos }}</td>
                            <td>{{ $item->cedula }}</td>
                            <td>{{ $item->getRoleNames()->implode(',') }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <a type="button" data-toggle="modal" data-target="#exampleModal"
                                    class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>

                                    <a href="{{ route('usuarios.edit', $item->id) }}"> Edi</a>
                                <a class="btn btn-xs btn-warning" href="{{route('usuarios.edit',$item)}}"><i class="fa fa-pencil"></i></a>

                                <form action="{{route("usuarios.destroy", $item)}}" method='POST'>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"> Inactivar</button>
                                </form>
                            </td>
                        </tr>
                        @extends('Snnipets.profile')
                        @section('profile_body')
                        <div class="row">
                            <div class="col-md-6">
                                <img style="text-align:center"
                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRvzOpl3-kqfNbPcA_u_qEZcSuvu5Je4Ce_FkTMMjxhB-J1wWin-Q"
                                    alt="" class="img-rounded img-fill">
                            </div>
                            <div class="col-md-6" style="border-left:3px solid #ded4da;">
                                <blockquote>
                                    <h4 style="font-weight:bold">Nombres y apellidos</h4>
                                    <h5>{{ $item->nombres }} {{ $item->apellidos }}</h5>
                                    <h4 style="font-weight:bold">Cedula</h4>
                                    <h5>{{ $item->cedula }}</h5>
                                    <h4 style="font-weight:bold">Correo personal</h4>
                                    <h5>{{ $item->email }}</h5>
                                    <h4 style="font-weight:bold">Rol de usuario</h4>
                                    <h5 style="text-transform:capitalize"> {{ $item->getRoleNames()->implode(',') }}
                                    </h5>
                                </blockquote>
                            </div>
                        </div>
            </div>
            @endsection
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
