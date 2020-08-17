@extends('Admin.Plantilla.layout')

@section('header')

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Choferes <small>Formulario de edición</small></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('administracion') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('choferes.index') }}">Choferes</a></li>
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
                                    <label for="inputEmail3" class="col-sm-4 control-label"
                                        style="text-align: left;">Desde: </label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fas fa-calendar"></i></span>
                                        </div>
                                        <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio"  value="{{ old('fecha_inicio',$chofer->fecha_inicio) }}">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="apellidos">Cedula: </label>
                                    <input type="hidden" name="chofer_id" value="{{ $chofer->id }}">
                                    <input type="text" min="1" minlength="10" maxlength="10" class="form-control"
                                        value="{{ old('cedula',$chofer->cedula) }}" id="cedula" name="cedula"
                                        placeholder="Ingrese el numero de cédula " required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="nombres">Nombres completos: </label>
                                    <input type="text" class="form-control" id="nombres" name="nombres"
                                    value="{{ old('nombres',$chofer->nombres) }}" placeholder="Ingrese los nombres " required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="apellidos">Apellidos completos: </label>
                                    <input type="text" class="form-control" id="apellidos" name="apellidos"
                                    value="{{ old('apellidos',$chofer->apellidos) }}"  placeholder="Ingrese los apellidos " required>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Foto de perfil</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input style="padding:10px;" type="file" name="imagen"
                                                        class="custom-file-input" id="exampleInputFile"
                                                        onchange="readURL(this);">
                                                    <label class="custom-file-label" for="exampleInputFile"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <img id="blah" src="http://placehold.it/100" alt="your image" width="100"
                                            height="100" />
                                    </div>
                                </div>
                                <br>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-4 control-label"
                                        style="text-align: left;">Hasta: </label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="fas fa-calendar"></i></span>
                                        </div>
                                        <input type="date" class="form-control" id="fecha_fin" name="fecha_fin"   value="{{ old('fecha_fin',$chofer->fecha_fin) }}">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="email">Correo electrónico: </label>
                                    <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email',$chofer->email) }}"  placeholder="Ingrese el correo" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="email">Número telefónico: </label>
                                    <input type="text" class="form-control" id="telefono" name="telefono"
                                    value="{{ old('telefono',$chofer->telefono) }}"  placeholder="Ingrese el número telefónico"
                                        required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="anio">Tipo de licencia: </label>
                                    <input type="text" min="0" class="form-control" name="licencia" autocomplete="off"
                                    value="{{ old('licencia',$chofer->licencia) }}"  placeholder="Ingrese el año de fabricación"
                                        required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="id_user">Seleccione un socio: </label>
                                    <select class="form-control autocompleteNombre" name="user_id" id="user_id"
                                        style="width:100%; height:100%" required> 
                                        <option style="color:gray;" value="{{ old('user_id',$chofer->user_id) }}">
                                            {{ $chofer->users->nombres }}</option>
                                    </select>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('choferes.index') }}"
                                        class="btn btn-danger btn-block">Regresar</a>
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
        var url = "{{ route('choferes.update', $chofer->id) }}";
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