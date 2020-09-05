@foreach ($vehiculo as $item)
<form class="form" method="POST" id="actualizar">
    @csrf
    @method('PATCH')
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Marca del vehiculo:</label>
                        <input class="form-control" type="text" name="name" value="{{ $item->marca }}" disabled>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Tipo de vehiculo:</label>
                        <input class="form-control" type="text" name="username" value="{{ $item->tipoVehiculo}}" disabled>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Placa:</label>
                        <input class="form-control" type="text" value="{{ $item->placa }}" disabled>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Año:</label>
                        <input class="form-control" type="text" value="{{ $item->anio }}" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endforeach
