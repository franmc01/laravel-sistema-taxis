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
<div class="box-body">
  <div class="row">
    <div class="col-md-6">
      <div class="container-fluid h-100 text-dark">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col col-sm-6 col-md-6 col-lg-6 col-xl-10">
            <span id="form_result"></span>
            <form id="mostrar" method="POST" data-route="{{ route('cuotas.mostrar') }}" class="form-horizontal">
              @csrf
              <div class="form-group">
                <div class="datepicker" id="datepicker"></div>
              </div>
              <div class="form-group">
                <div style="width: 92%;">
                  <button type="submit" class="btn btn-primary btn-lg btn-block"> Consultar&nbsp; <i
                      class="fa fa-file"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="container-fluid h-100 text-dark">
        <div class="row justify-content-center align-items-center">
          <h2></h2>
        </div>
        <div class="justify-content-center align-items-center h-100">
          <div class="col col-sm-6 col-md-6 col-lg-6 col-xl-10">
            <form id="consultar" method="POST" data-route="{{ route('cuotas.consultar') }}" class="form-horizontal">
              @csrf
              <hr>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label" style="text-align: left;">Desde: </label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar"></i></span>
                  </div>
                  <input type="date" class="form-control" id="fecha1" name="fecha1">
                </div>
              </div>
              <hr>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label" style="text-align: left;">Desde: </label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar"></i></span>
                  </div>
                  <input type="date" class="form-control" id="fecha2" name="fecha2">
                </div>
              </div>
              <hr>
              <label for="inputEmail3" class="col-sm-4 control-label" style="text-align: left;">Socio: </label>
              <div class="form-group d-flex align-items-center">
                <span class="input-group-icon">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                </span>
                <div class="flex-fill">
                  <select class="form-control autocompleteNombre" name="user" id="user" style="width: 100%">
                    <option></option>
                  </select>
                </div>
              </div>
              <hr>
              <div class="form-group">
                <div>
                  <button type="submit" class="btn btn-primary btn-lg btn-block"> Consultar&nbsp; <i
                      class="fa fa-file"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Listado de Cuotas</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="">
          <form method="POST" name="formGuardar" id="formGuardar" data-route="{{ route('cuotas.guardar') }}">
            @csrf
            <table id="tablacuotas" class="table table-bordered table-striped table-hover" cellspacing="0" width="100%">
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
            <button type="submit" name="guardar" id="guardar" class="btn btn-primary">Guardar</button>
          </form>
        </div>
      </div>
    </div>
    <!-- /.box -->
  </div>
</div>
<script>
  $(document).ready(function() {
    var table = $('#tablacuotas').dataTable({
          destroy: true,
          paging: false,
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
                  name: 'pago'
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
      $('.autocompleteNombre').select2({
        placeholder: 'Nombre',
        minimumInputLength: 1,
        ajax: {
            url: "{{url('cuotas/socios/fetch')}}",
            dataType: 'json',
            method:'POST',
            delay: 250,
            processResults: function (data) {
            return {
                results:  $.map(data, function (item) {
                    return {
                        text: item.nombres + ' '+ item.apellidos,
                        id: item.id
                    }
                })
            };
            },
            cache: true
        }
        });
      
      $('#mostrar').submit(function(event){
            var route = $('#mostrar').data('route');
            var formData = document.getElementById('datepicker');
            var fecha = formData.value;
            $.ajax({
                type: 'POST',
                url: route,
                data: {fecha:fecha},
                success: function(Response)
                {
                  $('#tablacuotas').dataTable().fnClearTable();
                  $('#tablacuotas').dataTable().fnAddData(Response.data);
                  $('button[name=pago]').on('click', function () {
                      var id = $(this).attr('id');
                      botones(id);
                  });
                }
            });
            event.preventDefault();
        });

        $('#consultar').submit(function(event){
            var route = $('#consultar').data('route');
            var fecha1 = $('input[name=fecha1]').val();
            var fecha2 = $('input[name=fecha2]').val();
            var user = $('select[name=user]').val();
            $.ajax({
                type: 'POST',
                url: route,
                data: {
                  fecha1:fecha1,
                  fecha2:fecha2,
                  user:user,
                },
                success: function(Response)
                {
                  $('#tablacuotas').dataTable().fnClearTable();
                  $('#tablacuotas').dataTable().fnAddData(Response.data);
                  $('button[name=pago]').on('click', function () {
                      var id = $(this).attr('id');
                      botones(id);
                  });
                }
            });
            event.preventDefault();
        });

        var botones = function(id) {
          if ($('input[name=pago][id='+id+']').val() === "1") {
              $('input[name=monto][id='+id+']').val("0.00");
              $('input[name=pago][id='+id+']').val("0");
              $('button[name=pago][id='+id+']').text("No pagado");
          } else {
              $('input[name=monto][id='+id+']').val("2.00");                        
              $('input[name=pago][id='+id+']').val("1");
              $('button[name=pago][id='+id+']').text("Pagado");
          }
        };

        $('#formGuardar').on('submit', function(e){
          var myRows = { myRows: [] };
          var pagos = table.$('input[name=pago]').serializeArray();
          var monto = table.$('input[name=monto]').serializeArray();          
          var $th = $('#tablacuotas th');
          $('#tablacuotas tbody tr').each(function(i, tr){
            var obj = {}, $tds = $(tr).find('td');
            $th.each(function(index, th){
                obj[$(th).text()] = $tds.eq(index).text();
                if ($(th).text()=="Pago") {
                  obj[$(th).text()] = pagos[i].value;
                }
                if ($(th).text()=="Monto") {
                  obj[$(th).text()] = monto[i].value;
                }
            });
            myRows.myRows.push(obj);
          });
          var url = $('#formGuardar').data('route');
          $.ajax({
            type: 'POST',
            url: url,
            data: myRows,
            success: function(res) {
              console.log(res.data);
            }
          });
          event.preventDefault();  
        });
  });
</script>
@endsection