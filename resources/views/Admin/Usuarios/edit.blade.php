@extends('Admin.Plantilla.layout')

@section('header')
<h1>Usuarios<small>Formulario de edición</small></h1>
<ol class="breadcrumb">
    <li><a href="{{ route('administracion') }}"><i class="fa fa-dashboard"></i>Inicio</a></li>
    <li><a href="{{ route('usuarios.index') }}"><i class="fa fa-list"></i>Usuarios</a></li>
    <li class="active">Editar</li>
</ol>
@endsection


@section('content')
<div class="row">
    <br>
    <div class="col-md-12">
        <div class="box box-warning">
            <form  id="actualizar" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="box-body">
                    <br>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombres">Nombres completos: </label>
                            <input type="text" class="form-control"  name="nombres" placeholder="Ingrese los nombres " value="{{ old('nombres',$datos->nombres) }}">
                          </div>
                          <div class="form-group">
                            <label for="apellidos">Cedula: </label>
                            <input type="number" min="1" minlength="10" maxlength="10"  class="form-control"  name="cedula" placeholder="Ingrese el numero de cédula " value="{{ old('cedula',$datos->cedula) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="apellidos">Apellidos completos: </label>
                            <input type="text" class="form-control"  name="apellidos" placeholder="Ingrese los apellidos" value="{{ old('apellidos',$datos->apellidos) }}">
                          </div>
                        <div class="form-group">
                            <label for="email">Correo: </label>
                            <input type="email" class="form-control" name="email" placeholder="Ingrese el correo" value="{{ old('cedula',$datos->email) }}">
                          </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="input-group">
                                <label for="exampleInputFile">Foto de perfil actual</label>
                                <br>
                                <img src="/storage/{{ $datos->foto_perfil }}" height="120px" width="120px" >
                                <div class="input-group" style="margin-top:5%">
                                    <div class="custom-file">
                                      <input type="file" name="foto_perfil" class="custom-file-input" id="inputGroupFile01"
                                        aria-describedby="inputGroupFileAddon01" value="{{ old('foto_perfil',$datos->foto_perfil) }}">
                                      <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Rol de usuario actual:</label>
                                <div class="radio">
                                    @foreach ($roles as $item)
                                    <label style="text-transform:capitalize"><input type="radio" name="roles[]" id="datos" value="{{  $item->id }}" {{ $datos->roles->contains($item) ? 'checked':'' }} >{{ $item->name }}</label>
                                    <br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" name="password" class="form-control" placeholder="Contraseña">
                            <span class="help-block">Dejar en blanco si no desea cambiar la contraseña</span>

                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirmar contraseña</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Repite la contraseña">
                        </div>
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
$("#actualizar").on('submit', function (e) {
    var url = "{{ route('usuarios.update', $datos->id) }}";
    var formData = new FormData(this);
    e.preventDefault();
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
            Swal.fire('Genial', 'La información ha sido actualizada correctamente', 'success');
        }
    });
});
</script>



@endsection

