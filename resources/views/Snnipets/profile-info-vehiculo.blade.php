<form class="form" method="POST" id="actualizar">
    @csrf
    @method('PATCH')
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Marca del vehiculo:</label>
                        <input class="form-control" type="text" name="name" value="{{ $vehiculo[0]->marca }}" disabled>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Tipo de vehiculo:</label>
                        <input class="form-control" type="text" name="username" value="{{ $vehiculo[0]->tipoVehiculo}}" disabled>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Placa:</label>
                        <input class="form-control" type="text" value="{{ $vehiculo[0]->placa }}" disabled>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Año:</label>
                        <input class="form-control" type="text" value="{{ $vehiculo[0]->anio }}" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
