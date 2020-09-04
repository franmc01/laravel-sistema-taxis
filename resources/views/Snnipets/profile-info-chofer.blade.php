



<form class="form" method="POST" id="socio">
    <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Nombre del chofer actual:</label>
                    <input class="form-control" type="text" name="name" value="{{ $chofer[0]->nombres }}" disabled>
                </div>
                <div class="form-group">
                    <label>Apellidos del chofer actual:</label>
                    <input class="form-control" type="text" name="username" value="{{ $chofer[0]->apellidos}}" disabled>
                </div>
                <div class="form-group">
                    <label>Cédula del chofer actual:</label>
                    <input class="form-control" type="text" name="username" value="{{ $chofer[0]->cedula}}" disabled>
                </div>
            </div>

            <div class="col-md-4 text-center">
                <img src="/storage/{{ $chofer[0]->foto_perfil }}" alt="" height="250px" style="border-radius:150px;">
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>Email del chofer actual:</label>
                    <input class="form-control" type="text" name="username" value="{{ $chofer[0]->email}}" disabled>
                </div>
                <div class="form-group">
                    <label>Teléfono del chofer actual:</label>
                    <input class="form-control" type="text" name="username" value="{{ $chofer[0]->telefono}}" disabled>
                </div>
                <div class="form-group">
                    <label>Licencia del chofer actual:</label>
                    <input class="form-control" type="text" name="username" value="{{ $chofer[0]->licencia}}" disabled>
                </div>
            </div>


        </div>

</form>

