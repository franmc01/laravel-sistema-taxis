@extends('Admin.Plantilla.layout')
@section('header') 


<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Usuarios <small>Formulario de registro</small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('administracion') }}">Inicio</a></li>
          <li class="breadcrumb-item"><a href="{{ route('usuarios.index') }}">Usuarios</a></li>
          <li class="breadcrumb-item active">Crear</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->



@endsection

@section('content') <div class="row">
    <br>
    <div class="col-md-12">
        <div class="box box-warning">
            <form enctype="multipart/form-data" id="resetear">
                @csrf
                <div class="box-body">
                    <br>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombres">Nombres completos: </label>
                            <input type="text" class="form-control" id="nombres" name="nombres"
                                placeholder="Ingrese los nombres " required>
                        </div>
                        <div class="form-group">
                            <label for="apellidos">Cedula: </label>
                            <input type="text" min="1" minlength="10" maxlength="10" class="form-control" id="cedula"
                                name="cedula" placeholder="Ingrese el numero de cédula " required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="apellidos">Apellidos completos: </label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos"
                                placeholder="Ingrese los apellidos " required>
                        </div>
                        <div class="form-group">
                            <label for="email">Correo: </label>
                            <input type="email" class="form-control" id="correo" name="correo"
                                placeholder="Ingrese el correo" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group">
                            <label for="exampleInputFile">Foto de Perfil</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" id="imagen" name="imagen" class="custom-file-input"
                                        id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Roles de usuario:</label>
                            <div class="radio"> @foreach ($roles as $item) <label
                                    style="text-transform:capitalize"><input type="radio" name="roles[]" id="roles"
                                        value="{{ $item->id }}" unchecked>{{ $item->name }}</label>
                                <br> @endforeach </div>
                        </div>
                        <span class="help-block">La contraseña será generada y enviada via email al nuevo usuario
                            registrado en el sistema.</span>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $("#resetear").on('submit', function(e) {
    e.preventDefault();
    var url = "{{ route('usuarios.store') }}";
    var formData = new FormData(document.getElementById("resetear"));
    $.ajax({
        type: 'POST',
        url: url,
        cache: false,
        data: formData,
        dataType: "json",
        contentType: false,
        processData: false,
        enctype: 'multipart/form-data',
        success: function(response) {
            $('#resetear').trigger("reset");
            Swal.fire('Genial', 'La información ha sido guardada correctamente', 'success');
        }
    });
});
</script>
@endsection
