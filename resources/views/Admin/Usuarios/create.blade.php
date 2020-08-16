@extends('Admin.Plantilla.layout')
@section('header')

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Usuarios <small> - Formulario de registro</small></h1>
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

@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-gray">
            <div class="card-header">
                <h4 class="card-title">
                    Información personal
                </h4>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="mb-0">
                    <form enctype="multipart/form-data" id="resetear">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombres">Nombres completos: </label>
                                    <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingrese los nombres " required>
                                </div>
                                <div class="form-group">
                                    <label for="apellidos">Cedula: </label>
                                    <input type="text" min="1" minlength="10" maxlength="10" class="form-control" id="cedula" name="cedula" placeholder="Ingrese el numero de cédula " required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="apellidos">Apellidos completos: </label>
                                    <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ingrese los apellidos " required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Correo: </label>
                                    <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingrese el correo" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputFile">Foto de perfil</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input style="padding:10px;" type="file" name="imagen" class="custom-file-input" id="exampleInputFile" onchange="readURL(this);">
                                            <label class="custom-file-label" for="exampleInputFile"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <img id="blah" src="http://placehold.it/100" alt="your image" width="100" height="100" />
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Rol de usuario:</label>
                                    @foreach ($roles as $item)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="roles[]" value="{{ $item->id }}" unchecked>
                                        <label class="form-check-label" style="text-transform:capitalize">{{ $item->name }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <span class="text-muted">
                                La contraseña será generada y enviada via email al nuevo usuario registrado en el sistema.
                            </span>

                        </div>
                        {{-- <div class="card-footer"> --}}
                        <div class="row mt-3">
                            {{-- <div class="col-md-6 mb-2">
                                <a href="{{ route('usuarios.index') }}" class="btn btn-danger btn-block">Regresar</a>
                        </div> --}}
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                        </div>
                </div>
                {{-- </div> --}}
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.col-->
</div>

<style>
    .custom-file-input~.custom-file-label::after {
        content: "Subir foto";
    }
</style>

<script>
    var fileName;

    $('.custom-file-input').on('change', function() {
        fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    $("#resetear").on('submit', function(e) {
        e.preventDefault();
        var url = "{{ route('usuarios.store') }}";
        var formData = new FormData(document.getElementById("resetear"));
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
                $('#resetear').trigger("reset");
                Swal.fire('Genial', 'La información ha sido guardada correctamente', 'success');
            }
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $('.custom-file-input').on('change', function() {
        var fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>


@endsection
