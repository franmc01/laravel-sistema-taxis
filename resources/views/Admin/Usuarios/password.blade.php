@extends('Admin.Plantilla.layout')
@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Contraseña</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('administracion') }}">Mi perfil</a></li>
                <li class="breadcrumb-item active">Cambiar contraseña</li>
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
                <h4 class="card-title"> Formulario </h4>
            </div>
            <div class="card-body">
                <form id="actualiza2">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-md-12">
                            @include('Snnipets.password_change')
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <button type="submit" class="btn btn-primary btn-block cambio">Guardar</button>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
<script>
    $(document).on('click', '.cambio', function(e) {
        e.preventDefault();
        var url = "{{ route('perfil.nueva', $info->id) }}";
        var formData = new FormData(document.getElementById("actualiza2"));
        $.ajax({
            method: 'POST',
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
