@extends('Admin.Plantilla.layout')
@section('header')

<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Cuotas <small> - Registros de cuotas </small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('administracion') }}">Inicio</a></li>
          <li class="breadcrumb-item active">Cuotas</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->

@endsection
@section('content')

<body>
    <div class="datepicker" id="datepicker"></div>
    <p>Date: <input type="text" id="datepicker2" disabled></p>
</body>
@endsection
