@extends('Admin.Plantilla.layout')
@section('header')

<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Usuarios <small> - Registros inactivos</small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('administracion') }}">Inicio</a></li>
          <li class="breadcrumb-item active">Usuarios inactivos</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->

@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        {{-- <div class="card-header text-center">
            <a class="btn btn-primary pull-right" href="{{ route('usuarios.create') }}">
                <span style="padding-right:5px"><i class="fa fa-user-plus" aria-hidden="true"></i></span>
                Crear usuario
            </a>
        </div> --}}
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <table id="eliminados" class="table table-bordered table-striped table-hover" cellspacing="0"
                    width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Cedula</th>
                            <th>Roles</th>
                            <th>Correo personal</th>
                            <th>Reactivar</th>
                            <th>Eliminar</th>
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
                                    <button type="submit" class="btn btn-info btn-xs"><i class="fa fa-user-check" aria-hidden="true"></i> Activar</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('usuarios.forceDelete', $item) }}" method='POST'>
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn btn-danger btn-xs"> <i class="fa fa-user-alt-slash" aria-hidden="true"></i> Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>



        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<script>
        $(document).ready(function() {
        $('#eliminados').DataTable();
    } );
</script>


@endsection
