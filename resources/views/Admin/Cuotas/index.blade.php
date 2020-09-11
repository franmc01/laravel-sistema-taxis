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


<div class="modal modal-success fade" id="exito">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Datos Guardados!</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <p>Los datos han sido actualizados con éxito!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card card-outline card-gray">
      <div class="card-header">
        <h4 class="card-title">
          <b>Consulta de cuotas</b>
        </h4>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="mb-0">
          <div class="row">
            <div class="col-md-6">
              {{--               <h1>Cunsulta por día</h1> --}}
              <form id="mostrar" method="POST" data-route="{{ route('cuotas.mostrar') }}" class="form-horizontal">
                @csrf
                <div class="form-group">
                  <div class="row">
                    <div class="table-responsive">
                      <div class="datepicker" id="datepicker"></div>
                      <input type="hidden" name="fecha" id="fecha">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                </div>
              </form>
            </div>
            <div class="col-md-6">
              {{--               <h1>Consulta socios por fecha</h1> --}}
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
                  <label for="inputEmail3" class="col-sm-4 control-label" style="text-align: left;">Hasta: </label>
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
                        class="fa fa-search"></i></button>
                        <button  id="pdf" type="button" class="btn btn-info btn-lg btn-block"> Generar reporte de cuotas&nbsp; <i
                            class="fa fa-file"></i></button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h3 class="box-title" style="text-align: center; padding-top: 30px;">Listado de Cuotas</h3>
        </div>
        <!-- /.box-header -->
        <div class="card-body">
          <div class="table-responsive">
            <form method="POST" name="formGuardar" id="formGuardar" data-route="{{ route('cuotas.guardar') }}">
              @csrf
              <table id="tablacuotas" class="table table-bordered table-hover" cellspacing="0"
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
              <button type="submit" name="guardar" id="guardar" class="btn btn-primary" style="float: right; width: 15%;">Guardar</button>
            </form>
          </div>
        </div>
      </div>
      <!-- /.box -->
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
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

  const boton = document.querySelector("#pdf");
  boton.addEventListener("click", function(e){
        window.location= "{{ route('generar.reporte.socio') }}";
    });

  });
</script>
@endsection
