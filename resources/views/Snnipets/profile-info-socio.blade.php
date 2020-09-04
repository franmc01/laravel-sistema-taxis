<form class="form">
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Nombres:</label>
                        <input class="form-control" type="text" value="{{ $logeado->nombres }}" disabled>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Apellidos:</label>
                        <input class="form-control" type="text" value="{{ $logeado->apellidos }}" disabled>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Cédula:</label>
                        <input class="form-control" type="text" value="{{ $logeado->cedula }}" disabled>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Correo personal:</label>
                        <input class="form-control" type="text"  value="{{ $logeado->email }}" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

