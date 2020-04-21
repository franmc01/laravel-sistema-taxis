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

@section('content') <div class="col-md-12">
    <div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="eliminados" class="table table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Cedula</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Accion 1</th>
                        <th>Accion 2</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
</div>

<script>

    $(document).ready(function() {
        $('#eliminados').DataTable({
			language: {
				"emptyTable":			"No hay datos disponibles en la tabla.",
				"info":		   			"Del _START_ al _END_ de _TOTAL_ ",
				"infoEmpty":			"Mostrando 0 registros de un total de 0.",
				"infoFiltered":			"(filtrados de un total de _MAX_ registros)",
				"infoPostFix":			"(actualizados)",
				"lengthMenu":			"Ver _MENU_ registros",
				"loadingRecords":		"Cargando...",
				"processing":			"Procesando...",
				"search":				"Buscar:",
				"searchPlaceholder":	"",
				"zeroRecords":			"No se han encontrado coincidencias.",
				"paginate": {
					"first":			"Primera",
					"last":				"Última",
					"next":				"Siguiente",
					"previous":			"Anterior"
				},
				"aria": {
					"sortAscending":	"Ordenación ascendente",
					"sortDescending":	"Ordenación descendente"
				}
			},
            processing:true,
            serverSide:true,
            ajax:"{{ route('usuarios.eliminados') }}",
            columns:[
                {data: 'nombres'},
                {data: 'apellidos'},
                {data: 'cedula'},
                {data: 'email'},
                {data: 'role'},
                {data: 'btnrestore'},
                {data: 'btndestroy'}
            ],
            "lengthMenu":				[[5, 10, 20, 25, 50, -1], [5, 10, 20, 25, 50, "Todos"]],
            "iDisplayLength":			10,

        });
    });

</script>

@endsection
