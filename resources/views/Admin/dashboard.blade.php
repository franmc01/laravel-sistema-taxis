@extends('Admin.Plantilla.layout')

@section('header')

<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Home</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->

@endsection





@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $u }}</h3>
                    <p>Usuarios registrados</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user-friends"></i>
                </div>
                <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $v }}</h3>
                    <p>Vehiculos asociados</p>
                </div>
                <div class="icon">
                    <i class="fa fa-car"></i>
                </div>
                <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>0<sup style="font-size: 20px">%</sup></h3>
                    <p>Cuotas de usuarios</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <h3>44</h3>
                            <p>Para el futuro</p>
                        </div>
                        <div class="icon">
                            <i class="fab fa-mailchimp"></i>
                        </div>
                        <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
    </div>
</div>

<div class="container-fluid">
    <p><strong>Usuario autenticado:</strong> {{ auth()->user()->nombres ." ".auth()->user()->apellidos  }}</p>
    <p><strong>Cedula:</strong> {{ auth()->user()->cedula}}</p>
    <p><strong>Correo:</strong> {{ auth()->user()->email}}</p>
</div>

@endsection
