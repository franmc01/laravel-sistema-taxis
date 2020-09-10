@extends('Admin.Plantilla.layout')
@section('header') <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Choferes <small> - Registros activos</small></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('administracion') }}">Inicio</a></li>
                <li class="breadcrumb-item active">Choferes activos</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection

@section('content')
<div class="col-md-12">
    <div class="card card-outline card-gray">
        <div class="card-header text-center">
            <a class="btn btn-primary pull-right" href="{{ route('choferes.create') }}">
                <span style="padding-right:5px"><i class="fa fa-user-plus" aria-hidden="true"></i></span> Registrar chofer
            </a>
            <a class="btn btn-info pull-right" href="{{ route('choferes.excel') }}">
                <span style="padding-right:5px"><i class="fa fa-file-alt" aria-hidden="true"></i></span>Descargar excel
            </a>
        </div>
        <!-- /.box-header -->
        <div class="card-body">
            <div class="table-responsive">
                <table id="tablachoferes" class="table table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Cedula Chofer</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Fin</th>
                            <th>Cédula Socio</th>
                            <th>Editar</th>
                            <th>Ver</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<div class="modal fade" id="ChoferModal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Datos personales</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <center>
                    <div id="imageChofer"></div>
                    <h4 class="media-heading" id="nombreChofer"></h4>
                    <h4 id="apellidoChofer"></h4>
{{--                     <span><strong>Status: </strong></span>
                    <span class="badge bg-success">Activo</span> --}}
                </center>
            </div>
            <div class="modal-footer justify-content-left">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    <!-- /.modal-dialog -->
</div>
<div id="confirmModalChofer" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Confirmation</h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" name="ok_buttonChofer" id="ok_buttonChofer" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#tablachoferes').DataTable({
            language: {
                "emptyTable": "No hay datos disponibles en la tabla."
                , "info": "Del _START_ al _END_ de _TOTAL_ "
                , "infoEmpty": "Mostrando 0 registros de un total de 0."
                , "infoFiltered": "(filtrados de un total de _MAX_ registros)"
                , "infoPostFix": "(actualizados)"
                , "lengthMenu": "Ver _MENU_ registros"
                , "loadingRecords": "Cargando..."
                , "processing": "Procesando..."
                , "search": "Buscar:"
                , "searchPlaceholder": ""
                , "zeroRecords": "No se han encontrado coincidencias."
                , "paginate": {
                    "first": "Primera"
                    , "last": "Última"
                    , "next": "Siguiente"
                    , "previous": "Anterior"
                }
                , "aria": {
                    "sortAscending": "Ordenación ascendente"
                    , "sortDescending": "Ordenación descendente"
                }
            }
            , processing: true
            , serverSide: true
            , ajax: "{{ route('choferes.index') }}"
            , columns: [{
                    data: 'nombres'
                }
                , {
                    data: 'apellidos'
                }
                , {
                    data: 'cedula'
                }
                , {
                    data: 'fecha_inicio'
                }
                , {
                    data: 'fecha_fin'
                }
                , {
                    data: 'users.cedula'
                    , name: 'users.cedula'
                }
                ,  {
                    data: 'editar'
                }
                ,  {
                    data: 'ver'
                }
                ,  {
                    data: 'delete'
                }
            ]
            , "lengthMenu": [
                [5, 10, 20, 25, 50, -1]
                , [5, 10, 20, 25, 50, "Todos"]
            ]
            , "iDisplayLength": 10,

        });

        $(document).on('click', '.viewChofer', function() {
            var id = $(this).attr('id');
            $('#form_result').html('');
            $.ajax({
                url: "/choferes/" + id
                , dataType: "json"
                , success: function(html) {
                    if (html.data.foto_perfil != null) {
                        $('#imageChofer').html("<img src= {{ URL::to('/storage') }}/" + html.data.foto_perfil + " style='text-align:center' class='img-rounded' height='220' width='220'/>");
                    }else{
                        $('#imageChofer').html("<img src='img/user.jpg' style='text-align:center' class='img-rounded' height='220' width='220'/>");
                    }
                    $('#nombreChofer').text(html.data.nombres);
                    $('#apellidoChofer').text(html.data.apellidos);
                    $('#ChoferModal').modal('show');
                }
            })
        });

        $(document).on('click', '.deleteChofer' ,function () {
        var id = $(this).attr('id');
        var token = $("meta[name='csrf-token']").attr("content");
        Swal.fire({
        title: 'Está seguro que desea eliminar este chofer?',
        text: "Ya no se podrá acceder a la información del chofer que va a eliminar",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar cuenta!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url:"choferes/"+id,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success:function(response)
                    {
                        Swal.fire( 'Genial!', 'La información ha sido eliminada correctamente', 'success' )
                        $('#tablachoferes').DataTable().ajax.reload();
                    }
                });
            }
        })

     });


    });
</script>


@endsection
