@extends('Admin.Plantilla.layout')

@section('header')

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Usuarios <small>Formulario de edición</small></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('administracion') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('usuarios.index') }}">Usuarios</a></li>
                <li class="breadcrumb-item active">Editar</li>
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
                    <form enctype="multipart/form-data" id="actualizar">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombres">Nombres completos: </label>
                                    <input type="text" class="form-control" value="{{ old('nombres',$datos->nombres) }}" name="nombres" placeholder="Ingrese los nombres">
                                </div>
                                <div class="form-group">
                                    <label for="apellidos">Cedula: </label>
                                    <input type="text" min="1" minlength="10" maxlength="10" class="form-control" value="{{ old('cedula',$datos->cedula) }}" id="cedula" name="cedula" placeholder="Ingrese el numero de cédula ">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="apellidos">Apellidos completos: </label>
                                    <input type="text" class="form-control" name="apellidos" value="{{ old('apellidos',$datos->apellidos) }}" placeholder="Ingrese los apellidos">
                                </div>
                                <div class="form-group">
                                    <label for="email">Correo: </label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email', $datos->email) }}" placeholder="Ingrese el correo">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputFile">Foto de perfil actual</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input style="padding:10px;" type="file" onchange="readURL(this);" name="foto_perfil" class="custom-file-input" id="exampleInputFile" value="{{ old('foto_perfil',$datos->foto_perfil) }}">
                                            <label class="custom-file-label" for="exampleInputFile"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <img id="blah" src="/{{ $datos->foto_perfil }}" alt="your image" width="100" height="100" />
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Rol de usuario actual:</label>
                                    @foreach ($roles as $item)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="roles[]" value="{{  $item->id }}" {{ $datos->roles->contains($item) ? 'checked':'' }} id="role">
                                        <label class="form-check-label" style="text-transform:capitalize">{{ $item->name }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Licencia</label>
                                    <input type="text" name="licencia" class="form-control" placeholder="Ingrese el numero de su licencia" value="{{ old('licencia',$datos->licencia) }}">
                                </div>
                            </div>


                            <div class="col-md-12">
                                @include('Snnipets.password_change')
                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('usuarios.index') }}" class="btn btn-danger btn-block">Regresar</a>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.col-->
</div>



<script>
    $("#actualizar").on('submit', function(e) {
        var url = "{{ route('usuarios.update', $datos->id) }}";
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

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>



@endsection
