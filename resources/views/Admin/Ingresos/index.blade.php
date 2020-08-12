@extends('Admin.Plantilla.layout')
@section('header') <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ingresos <small></small></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('administracion') }}">Inicio</a></li>
                <li class="breadcrumb-item active">Ingresos</li>
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
                    Ingresos
                </h4>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="mb-0">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
