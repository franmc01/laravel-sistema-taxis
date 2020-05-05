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
        <form id="mostrar" method="POST" data-route="{{ route('cuotas.mostrar') }}"
            class="form-horizontal">
            @csrf
            <div class="form-group">
                <div class="datepicker" id="datepicker"></div>
            </div>
            <button type="submit" id="btn_form" class="btn btn-primary">Consulta</button>
        </form>
    </div>
    <div class="col-md-4">
        <form id="consultar" method="POST" data-route="{{ route('cuotas.consultar') }}"
            class="form-horizontal">
            @csrf
            <div class="form-group">
                <input type="date" name="fecha1" id="">
            </div>
            <div class="form-group">
                <input type="date" name="fecha2" id="">
            </div>
            <select name="user">
              <option value="" disabled selected hidden>Seleccciona un Socio</option>
              @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->nombres }} {{ $user->apellidos }}</option>                   
              @endforeach
            </select>
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
    <!-- /.box-body -->
    {{--         @extends('Snnipets.vehicle')
--}}
    </div>
    <!-- /.box -->
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
                  //EN ESTAS LINEAS ASIGNO LOS DATOS DE LA DATATABLE 
                  //PERO PREVIAMENTE LOS LIMPIO
                  $('#tablacuotas').dataTable().fnClearTable();
                  $('#tablacuotas').dataTable().fnAddData(Response.data);
                //NO SÉ POR QUÉ ESTO FUNCIONA AQUÍ PERO NO EN OTRA PARTE DEL CODIGO
                //OSEA SI TENGO LA IDEA BÁSICA DEL POR QUE 
                //PERO ME ESTRESÉ UNA HORA TRATANDO DE DARLE SENTIDO
                //PORQUE SI LO COLOCABA EN OTRO LADO NO CORRIA
                //Y SI LO COLOCABA EN EL BOTON DE LA COLUMNA SE REPETÍA
                //EN FIN..
                //TODO BIEN 
                //TODO CORRECTO
                //Y YO QUE ME ALEGRO
                //SI LEES ESTO Y NO TE LO HE DICHO PONLE ESTILOS BONITOS A ESTOS BOTONES
                //SALUDOS
                //XD
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
            console.log(fecha1);
            console.log(fecha2);
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
          console.log(pagos);
          console.log(monto);
          
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
          //console.log(JSON.stringify(myRows));
          //alert(JSON.stringify(myRows));
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
