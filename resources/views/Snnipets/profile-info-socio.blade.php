<form class="form" method="POST" id="actualizar">
    @csrf
    @method('PATCH')
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Nombres:</label>
                        <input class="form-control" type="text" name="name" value="{{ $logeado->nombres }}" disabled>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Apellidos:</label>
                        <input class="form-control" type="text" name="username" value="{{ $logeado->apellidos }}" disabled>
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
                        <input class="form-control" type="text" value="{{ $logeado->email }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-end">
            @can('usuarios.update')
            <button class="btn btn-primary" type="submit">Guardar cambios</button>
            @endcan
        </div>
    </div>
</form>

<script>
    $("#actualizar").on('submit', function(e) {
        var url = "{{ route('usuarios.update', $logeado->id) }}";
        var formData = new FormData(this);
        e.preventDefault();
        $.ajax({
            type: 'POST'
            , url: url
            , cache: false
            , data: formData
            , dataType: "json"
            , contentType: false
            , processData: false
            , enctype: 'multipart/form-data'
            , success: function(response) {
                Swal.fire('Genial', 'La información ha sido actualizada correctamente', 'success');
            }
        });
    });
</script>
