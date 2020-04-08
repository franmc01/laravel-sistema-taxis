@extends('Admin.Plantilla.layout')

@section('header')
<h1>
    Usuarios
    <small>Formulario de edición</small>
</h1>
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
            <form  method="POST" action="{{route('usuarios.update',$usuarios->id)}}" accept-charset="UTF-8" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="box-body">
                    <br>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombres">Nombres completos: </label>
                            <input type="text" class="form-control"  name="nombres" placeholder="Ingrese los nombres " value="{{ old('nombres',$usuarios->nombres) }}">
                          </div>
                          <div class="form-group">
                            <label for="apellidos">Cedula: </label>
                            <input type="text" min="1" minlength="10" maxlength="10" pattern="^[0-9]$+" class="form-control"  name="cedula" placeholder="Ingrese el numero de cédula " value="{{ old('cedula',$usuarios->cedula) }}">>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="apellidos">Apellidos completos: </label>
                            <input type="text" class="form-control"  name="apellidos" placeholder="Ingrese los apellidos" value="{{ old('apellidos',$usuarios->apellidos) }}">>
                          </div>
                        <div class="form-group">
                            <label for="email">Correo: </label>
                            <input type="email" class="form-control" name="correo" placeholder="Ingrese el correo" required>
                          </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group">
                            <label for="exampleInputFile">Foto de Perfil</label>
                            <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" name="imagen" class="custom-file-input" id="inputGroupFile01"
                                    aria-describedby="inputGroupFileAddon01">
                                  <br>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label>Roles de usuario:</label>
                            <div class="radio">
                                @foreach ($roles as $item)
                                <label style="text-transform:capitalize"><input type="radio" name="roles[]" id="datos" value="{{ $item->id }}" unchecked>{{ $item->name }}</label>
                                <br>
                                @endforeach
                            </div>
                        </div> --}}
                        <span class="help-block">La contraseña será generada y enviada via email al nuevo usuario registrado en el sistema.</span>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                      </div>
                  </div>
            </form>
        </div>
    </div>
</div>
@endsection
