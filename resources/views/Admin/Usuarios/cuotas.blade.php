@extends('Admin.Plantilla.layout')

@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Mis cuotas</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('administracion') }}">Mi perfil</a></li>
                <li class="breadcrumb-item active">Información de mi cuenta</li>
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
                    Mis cuotas
                </h4>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form id="consultar" method="POST" data-route="{{ route('perfil.consultar.cuota') }}" class="form-horizontal">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label" style="text-align: left;">
                                    Indique la fecha desde:
                                </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fas fa-calendar"></i></span>
                                    </div>
                                    <input type="date" class="form-control" id="fecha1" name="fecha1">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-4 control-label" style="text-align: left;">
                                    Indique la fecha hasta:
                                </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fas fa-calendar"></i></span>
                                    </div>
                                    <input type="date" class="form-control" id="fecha2" name="fecha2">
                                </div>
                            </div>

                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <button type="submit" class="btn btn-block btn-primary btn-lg">Consultar</button>
                    </div>
                </form>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="tablacuotas2" class="table table-bordered table-striped table-hover" cellspacing="0"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th class="hidden-xs">ID</th>
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
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var table = $('#tablacuotas2').dataTable({
            destroy: true,
            paging: true,
            searching: false,
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
        //                      data: Response.data,
            columns:[
                {
                    data: 'id',
                    name: 'id',
                },
                {
                    data: 'fecha',
                    name: 'fecha'
                },
                {
                    data: 'users.nombres',
                    name: 'nombres'
                },
                {
                    data: 'users.apellidos',
                    name: 'apellidos'
                },
                {
                    data: 'pago',
                    name: 'pago',
                    createdCell: function(td, cellData, rowData, row, col){
                        var color = (cellData == '1') ? '#95ff82' : '#ff866e';
                        var texto = (cellData == '1') ? 'PAGADO' : 'NO PAGADO';
                        $(td).css('background-color', color);
                        $(td).html(texto);
                    }
                },
                {
                    data: 'monto',
                    name: 'monto'
                },
                {
                    data: 'observacion',
                    name: 'observacion'
                },
            ],
            "lengthMenu":				[[5, 10, 20, 25, 50, -1], [5, 10, 20, 25, 50, "Todos"]],
            "iDisplayLength":			10,

        });
        $('#consultar').submit(function(event){
            var route = $('#consultar').data('route');
            var fecha1 = $('input[name=fecha1]').val();
            var fecha2 = $('input[name=fecha2]').val();
            $.ajax({
                type: 'POST',
                url: route,
                data: {
                    fecha1:fecha1,
                    fecha2:fecha2,
                },
                success: function(Response)
                {
                    $('#tablacuotas2').dataTable().fnClearTable();
                    $('#tablacuotas2').dataTable().fnAddData(Response.data);
                }
            });
            event.preventDefault();
        });

    });
</script>

@endsection
