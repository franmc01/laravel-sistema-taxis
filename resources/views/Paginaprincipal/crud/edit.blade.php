@extends('Admin.Plantilla.layout')

@section('header')

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Página principal <small> - Formulario de edición</small></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('administracion') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('usuarios.index') }}">Pagina principal</a></li>
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
                    Información de la página principal
                </h4>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="mb-0">
                    <form id="update">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="historia">Historia</label>
                                    <textarea type="text" class="form-control" name="historia" cols="30" rows="5">
                                        {{ old('historia', $info_pagina[0]->historia) }}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="mision">Misión</label>
                                    <textarea type="text" class="form-control"  name="mision" cols="30" rows="5">
                                        {{ old('mision', $info_pagina[0]->mision) }}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="historia">Visión</label>
                                    <textarea type="text" class="form-control"  name="vision" cols="30" rows="5">
                                        {{ old('vision', $info_pagina[0]->vision) }}
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-md-6" style="margin-top:100px;">
                                <div class="form-group">
                                    <label for="">Dirección</label>
                                    <input type="text"  class="form-control" value="{{ old('direccion',$info_pagina[0]->direccion) }}" name="direccion"  placeholder="" aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                    <label for="">Teléfono 1:</label>
                                    <input type="text"  class="form-control" value="{{ old('telefono1',$info_pagina[0]->telefono1) }}" name="telefono1"  placeholder="" aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                    <label for="">Teléfono 2:</label>
                                    <input type="text"  class="form-control" value="{{ old('telefono2',$info_pagina[0]->telefono2) }}" name="telefono2"  placeholder="" aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                    <label for="">Correo de contacto</label>
                                    <input type="text"  class="form-control" value="{{ old('correo_contacto',$info_pagina[0]->correo_contacto) }}" name="correo_contacto"  placeholder="" aria-describedby="helpId">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-12">
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
    $("#update").on('submit', function (e) {
        console.log('Llegamos');
        var url = "{{ route('pagina_principal.info.update', $info_pagina[0]->id) }}";
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
            success: function(response) {
                Swal.fire('Genial', 'La información ha sido actualizada correctamente', 'success');
            }
        });
    });
    </script>


@endsection
