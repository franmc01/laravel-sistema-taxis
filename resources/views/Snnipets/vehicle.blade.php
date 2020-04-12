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
                        <label class="control-label col-md-4">Socio : </label>
                        <div class="col-md-8">
                            <select name="user_id" id="user_id" class="form-control">
                                <option>Seleccione a un socio</option>
                                @foreach ($users as $item)
                                <option value="{{ $item->id }}">{{ $item->nombres }} {{ $item->apellidos }}</option>
                                @endforeach
                            </select>

                            <span id="store_image"></span>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-weight:bold">Datos del Vehículo</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div id="vstore_image" class="col-md-6">
                    </div>
                    <div class="col-md-6" style="border-left:3px solid #ded4da;">
                        <blockquote>
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
                        </blockquote>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>