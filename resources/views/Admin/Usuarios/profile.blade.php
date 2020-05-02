@extends('Admin.Plantilla.layout') 

@section('header') 
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Mi cuenta</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('administracion') }}">Mi perfil</a></li>
                <li class="breadcrumb-item active">Información de mi cuenta</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid --> 
@endsection 


@section('content')
    <div class="row">
        <div class="col-md-12 text-center">
            No se poner &#x1F602;
            ando mal con la creatividad
        </div>
    </div>
@endsection