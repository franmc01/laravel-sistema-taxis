@extends('Admin.Plantilla.layout')
@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Cuotas <small> - Registros de cuotas </small></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('administracion') }}">Inicio</a></li>
                <li class="breadcrumb-item active">Cuotas</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection
@section('content')
<div class="row">
    <div class="col-md-6">
        <span id="form_result"></span>
        <form id="sample_form" method="POST" data-route="{{ route('cuotas.mostrar') }}"
            class="form-horizontal">
            @csrf
            <div class="form-group">
                <div class="datepicker" id="datepicker"></div>
            </div>
            <button type="submit" id="btn_form" class="btn btn-primary">Consulta</button>
        </form>
    </div>
</div>
<div class="col-md-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Listado de Cuotas</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="tablacuotas" class="table table-bordered table-striped table-hover" cellspacing="0"
                    width="100%">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Pago</th>
                            <th>Monto</th>
                            <th>Observacion</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <!-- /.box-body --> {{--         @extends('Snnipets.vehicle')
--}}
    </div>
    <!-- /.box -->
</div>
<script>
    $(document).ready(function() {
        $('#sample_form').submit(function(event) {
            var route = $('#sample_form').data('route');
            var formData = document.getElementById('datepicker');
            var fecha = formData.value;
            $.ajax({
                type: 'POST',
                url: route,
                data: {
                    fecha: fecha
                },
                success: function(Response) {
                    $('#tablacuotas').DataTable({
                        destroy: true,
                        paging: false,
                        searching: false,
                        language: {
                            "emptyTable": "No hay datos disponibles en la tabla.",
                            "info": "Del _START_ al _END_ de _TOTAL_ ",
                            "infoEmpty": "Mostrando 0 registros de un total de 0.",
                            "infoFiltered": "(filtrados de un total de _MAX_ registros)",
                            "infoPostFix": "(actualizados)",
                            "lengthMenu": "Ver _MENU_ registros",
                            "loadingRecords": "Cargando...",
                            "processing": "Procesando...",
                            "search": "Buscar:",
                            "searchPlaceholder": "",
                            "zeroRecords": "No se han encontrado coincidencias.",
                            "paginate": {
                                "first": "Primera",
                                "last": "Última",
                                "next": "Siguiente",
                                "previous": "Anterior"
                            },
                            "aria": {
                                "sortAscending": "Ordenación ascendente",
                                "sortDescending": "Ordenación descendente"
                            }
                        },
                        data: Response.data,
                        columns: [{
                            data: 'fecha',
                            name: 'fecha'
                        }, {
                            data: 'users.nombres',
                            name: 'nombres'
                        }, {
                            data: 'users.apellidos',
                            name: 'apellidos'
                        }, {
                            data: 'pago',
                            name: 'pago'
                        }, {
                            data: 'monto',
                            name: 'monto'
                        }, {
                            data: 'observacion',
                            name: 'observacion'
                        }, ],
                        "lengthMenu": [
                            [5, 10, 20, 25, 50, -1],
                            [5, 10, 20, 25, 50, "Todos"]
                        ],
                        "iDisplayLength": 10,
                    });
                }
            });
            event.preventDefault();
        });
    });

</script>
@endsection
