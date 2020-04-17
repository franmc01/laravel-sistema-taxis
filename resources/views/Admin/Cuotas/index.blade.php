@extends('Admin.Plantilla.layout') @section('header')
<h1> Registros activos <small>Lista de registros</small></h1>
<ol class="breadcrumb">
    <li><a href="{{ route('administracion') }}"><i class="fa fa-dashboard"></i>Inicio</a></li>
    <li class="active">Usuarios</li>
</ol>
@endsection
@section('content')

<body>
    <div class="datepicker" id="datepicker"></div>
    <p>Date: <input type="text" id="datepicker2" disabled></p>
</body>
@endsection