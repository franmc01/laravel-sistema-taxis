<!-- Modal de agregar-->
<div id="formModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Vehículo</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <span id="form_result"></span>
                <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-md-4">Marca : </label>
                        <div class="col-md-12">
                            <input type="text" name="marca" id="marca" class="form-control" />
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label col-md-4">Tipo de Vehículo : </label>
                        <div class="col-md-12">
                            <input type="text" name="tipoVehiculo" id="tipoVehiculo" class="form-control" />
                        </div>
                    </div>
                    <br />
                    <div class="form-group">
                        <label class="control-label col-md-4">Placa : </label>
                        <div class="col-md-12">
                            <input type="text" name="placa" id="placa" class="form-control" />
                        </div>
                    </div>
                    <br />
                    <div class="form-group">
                        <label class="control-label col-md-4">Año : </label>
                        <div class="col-md-12">
                            <input type="number" name="anio" id="anio" class="form-control" />
                        </div>
                    </div>
                    <br />
                    <div class="form-group">
                        <label class="control-label col-md-4">Socio : </label>
                        <div class="col-md-12">
                            <select name="user_id" id="user_id" class="form-control"
                            style="width:100%; height:100%">
                                <option>Seleccione a un socio</option>
                            </select>
                        </div>
                    </div>
                    <br />
                    <div class="form-group" align="right">
                        <input type="hidden" name="action" id="action" />
                        <input type="hidden" name="hidden_id" id="hidden_id" />
                        <input type="submit" name="action_button" id="action_button" class="btn btn-warning" style="width: 30%"
                            value="Add" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal de confirmacion de eliminar-->
<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Confirmation</h2>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
{{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="font-weight:bold">Datos del Vehículo</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div id="vstore_image" class="col-md-4">
                    </div>
                    <div class="col-md-8" style="border-left:3px solid #ded4da;">

                            <h4 style="font-weight:bold">Marca</h4>
                            <h5 name="vmarca" id="vmarca"></h5>
                            <h4 style="font-weight:bold">Tipo de Vehículo</h4>
                            <h5 name="vtipoVehiculo" id="vtipoVehiculo"></h5>
                            <h4 style="font-weight:bold">Placa</h4>
                            <h5 name="vplaca" id="vplaca"></h5>
                            <h4 style="font-weight:bold">Año de Fabricación</h4>
                            <h5 name="vanio" id="vanio"></h5>
                            <h4 style="font-weight:bold">User Id</h4>
                            <h5 name="vuser_id" id="vuser_id"></h5>
                            <h4 style="font-weight:bold">Nombre de Socio</h4>
                            <h5 name="vusernombres" id="vusernombres"></h5>
                            <h4 style="font-weight:bold">Apellidos de Socio</h4>
                            <h5 name="vuserapellidos" id="vuserapellidos"></h5>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div> --}}


<div class="modal fade" id="exampleModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Información del vehículo</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                    <div class="col-md-6">
                        <h6 style="font-size: 18px; text-transform:uppercase; font-weight:bold">Marca:</h6>
                        <h5 style="font-size: 17px; font-weight:normal;" name="vmarca" id="vmarca"></h5>
                        <h6 style="font-size: 18px; text-transform:uppercase; font-weight:bold">Tipo de Vehículo:</h6>
                        <h5 style="font-size: 17px; font-weight:normal;" name="vtipoVehiculo" id="vtipoVehiculo"></h5>
                        <h6 style="font-size: 18px; text-transform:uppercase; font-weight:bold">Placa:</h6>
                        <h5 style="font-size: 17px; font-weight:normal;" name="vplaca" id="vplaca"></h5>
                    </div>
                    <div class="col-md-6">
                        <h6 style="font-size: 18px; text-transform:uppercase; font-weight:bold">Año de Fabricación:</h6>
                        <h5 style="font-size: 17px; font-weight:normal;" name="vanio" id="vanio"></h5>
                        <h6 style="font-size: 18px; text-transform:uppercase; font-weight:bold">Nombre de Socio:</h6>
                        <h5 style="font-size: 17px; font-weight:normal;" name="vusernombres" id="vusernombres"></h5>
                        <h6 style="font-size: 18px; text-transform:uppercase; font-weight:bold">Apellidos de Socio:</h6>
                        <h5 style="font-size: 17px; font-weight:normal;" name="vuserapellidos" id="vuserapellidos"></h5>
                    </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  <script>
    //Initialize Select2 Elements

</script>
