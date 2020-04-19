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
                                <input type="text" min="1" minlength="10" maxlength="10" class="form-control"  value="{{ old('cedula',$datos->cedula) }}" id="cedula"
                                    name="cedula" placeholder="Ingrese el numero de cédula ">
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
                                    <input style="padding:10px;" type="file" name="foto_perfil" class="custom-file-input" id="exampleInputFile" value="{{ old('foto_perfil',$datos->foto_perfil) }}">
                                    <label class="custom-file-label" for="exampleInputFile"></label>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <img id="blah" src="/storage/{{ $datos->foto_perfil }}" alt="your image" width="100" height="100" />
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Rol de usuario actual:</label>
                                    @foreach ($roles as $item)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="roles[]" value="{{  $item->id }}" {{ $datos->roles->contains($item) ? 'checked':'' }}>
                                        <label class="form-check-label" style="text-transform:capitalize">{{ $item->name }}</label>
                                    </div>
                                    @endforeach
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" name="password" class="form-control" placeholder="Contraseña">
                                <span class="text-muted">Dejar en blanco si no desea cambiar la contraseña</span>

                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirmar contraseña</label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Repite la contraseña">
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                    </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /.col-->
  </div>
