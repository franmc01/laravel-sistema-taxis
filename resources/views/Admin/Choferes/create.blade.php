@extends('Admin.Plantilla.layout')

@section('header')

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Choferes <small> - Formulario registro</small></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('administracion') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('usuarios.index') }}">Choferes</a></li>
                <li class="breadcrumb-item active">Crear</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->

@endsection

@section('content')

@if($errors->any())
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4> Atención:</h4>
    <ul>
        @foreach( $errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(Session::has('creado'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4> Atención:</h4> El chofer se ha registrado con exito
</div>
@endif

<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-gray">
            <div class="card-header">
                <h4 class="card-title"> Información del chofer </h4>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="mb-0">
                    <form enctype="multipart/form-data" id="chofer">
                        @csrf
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
                                        <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="apellidos">Cedula: </label>
                                    <input type="text" min="1" minlength="10" maxlength="10" class="form-control"
                                        value="{{ old('cedula') }}" id="cedula" name="cedula"
                                        placeholder="Ingrese el numero de cédula " required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="nombres">Nombres completos: </label>
                                    <input type="text" class="form-control" id="nombres" name="nombres"
                                        value="{{ old('nombres') }}" placeholder="Ingrese los nombres " required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="apellidos">Apellidos completos: </label>
                                    <input type="text" class="form-control" id="apellidos" name="apellidos"
                                        value="{{ old('apellidos') }}" placeholder="Ingrese los apellidos " required>
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
                                        <img id="blah" src="http://placehold.it/100" alt="your image" width="100%"
                                             />
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
                                        <input type="date" class="form-control" id="fecha_fin" name="fecha_fin">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="email">Correo electrónico: </label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ old('email') }}" placeholder="Ingrese el correo" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="email">Número telefónico: </label>
                                    <input type="text" class="form-control" id="telefono" name="telefono"
                                        value="{{ old('telefono') }}" placeholder="Ingrese el número telefónico"
                                        required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="anio">Tipo de licencia: </label>
                                    <input type="text" min="0" class="form-control" name="licencia" autocomplete="off"
                                        value="{{ old('licencia') }}" placeholder="Ingrese el año de fabricación"
                                        required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="id_user">Seleccione un socio: </label>
                                    <select class="form-control autocompleteNombre" name="user_id" id="user_id"
                                        style="width:100%; height:100%">
                                        <option style="color:gray;" value="{{ old('user_id') }}">
                                            Seleccione a un socio</option>
                                    </select>
                                </div>
                                <br>
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
</div>
<script>
    //Initialize Select2 Elements
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

    $(function() {
        var fileName;

        $('.custom-file-input').on('change', function() {
            fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });

        $('.autocompleteNombre').select2({
        placeholder: 'Nombre',
        minimumInputLength: 1,
        ajax: {
            url: "{{url('cuotas/socios/fetch')}}",
            dataType: 'json',
            method:'POST',
            delay: 250,
            processResults: function (data) {
            return {
                results:  $.map(data, function (item) {
                    return {
                        text: item.nombres + ' '+ item.apellidos,
                        id: item.id
                    }
                })
            };
            },
            cache: true
        }
        });
        

        $('.custom-file-input').on('change', function() {
            var fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });

        $("#chofer").on('submit', function(e) {
            e.preventDefault();
            var url = "{{ route('choferes.store') }}";
            var formData = new FormData(document.getElementById("chofer"));
            console.log(formData);
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
                    $('#chofer').trigger("reset");
                    Swal.fire('Genial', 'La información ha sido guardada correctamente', 'success');
                }
            });
        });
    });
</script>
@endsection