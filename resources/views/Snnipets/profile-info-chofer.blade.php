


@foreach ($chofer as $item)
<form class="form" method="POST" id="socio">
    <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Nombre del chofer actual:</label>
                    <input class="form-control" type="text" name="name" value="{{ $item->nombres }}" disabled>
                </div>
                <div class="form-group">
                    <label>Apellidos del chofer actual:</label>
                    <input class="form-control" type="text" name="username" value="{{ $item->apellidos}}" disabled>
                </div>
                <div class="form-group">
                    <label>Cédula del chofer actual:</label>
                    <input class="form-control" type="text" name="username" value="{{ $item->cedula}}" disabled>
                </div>
            </div>

            <div class="col-md-4 text-center">
                <img src="/storage/{{ $item->foto_perfil }}" alt="" height="250px" style="border-radius:150px;">
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>Email del chofer actual:</label>
                    <input class="form-control" type="text" name="username" value="{{ $item->email}}" disabled>
                </div>
                <div class="form-group">
                    <label>Teléfono del chofer actual:</label>
                    <input class="form-control" type="text" name="username" value="{{ $item->telefono}}" disabled>
                </div>
                <div class="form-group">
                    <label>Licencia del chofer actual:</label>
                    <input class="form-control" type="text" name="username" value="{{ $item->licencia}}" disabled>
                </div>
            </div>


        </div>

</form>
@endforeach

