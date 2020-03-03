@extends('Admin.Plantilla.layout')

@section('content')
<h1>Dashboard</h1>
<p><strong>Usuario autenticado:</strong> {{ auth()->user()->nombres ." ".auth()->user()->apellidos  }}</p>
<p><strong>Cedula:</strong> {{ auth()->user()->cedula}}</p>
<p><strong>Correo:</strong> {{ auth()->user()->email}}</p>
@endsection
