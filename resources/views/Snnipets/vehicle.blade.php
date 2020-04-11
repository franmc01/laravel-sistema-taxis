  <!-- Modal de agregar-->
  <div id="formModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Record</h4>
            </div>
            <div class="modal-body">
                <span id="form_result"></span>
                <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-md-4">Marca : </label>
                        <div class="col-md-8">
                            <input type="text" name="marca" id="marca" class="form-control" />
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label col-md-4">Tipo de Vehículo : </label>
                        <div class="col-md-8">
                            <input type="text" name="tipoVehiculo" id="tipoVehiculo" class="form-control" />
                        </div>
                    </div>
                    <br />
                    <div class="form-group">
                        <label class="control-label col-md-4">Placa : </label>
                        <div class="col-md-8">
                            <input type="text" name="placa" id="placa" class="form-control" />
                        </div>
                    </div>
                    <br />
                    <div class="form-group">
                        <label class="control-label col-md-4">Año : </label>
                        <div class="col-md-8">
                            <input type="text" name="anio" id="anio" class="form-control" />
                        </div>
                    </div>
                    <br />
                    <div class="form-group">
                        <label class="control-label col-md-4">Id Usuario : </label>
                        <div class="col-md-8">
                            <input type="text" name="idUser" id="idUser" class="form-control" />
                        </div>
                    </div>
                    <br />
                    <div class="form-group" align="center">
                        <input type="hidden" name="action" id="action" />
                        <input type="hidden" name="hidden_id" id="hidden_id" />
                        <input type="submit" name="action_button" id="action_button" class="btn btn-warning"
                            value="Add" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


