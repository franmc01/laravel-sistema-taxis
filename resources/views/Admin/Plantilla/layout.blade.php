<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>TransLaSinPar | Inicio</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    {{-- <!-- DataTables --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/plugins/select2/css/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100italic,300,300italic,regular,italic,700,700italic,900,900italic" rel="stylesheet" />
    <!-- jQuery -->
    <script src="/plugins/jquery/jquery.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>

<body class="sidebar-mini layout-fixed control-sidebar-slide-open text-sm">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark navbar-gray-dark tex-sm">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ auth()->user()->foto_perfil ? '/storage/auth()->user()->foto_perfil' : '/img/user.jpg'}}" class="user-image img-circle elevation-2" alt="User Image">
                        <span class="d-none d-md-inline">{{ auth()->user()->nombres."".auth()->user()->apelllidos }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-dark">
                            <img src="{{ auth()->user()->foto_perfil ? '/storage/auth()->user()->foto_perfil' : '/img/user.jpg'}}" class="img-circle elevation-2" alt="User Image">
                            <p> {{ auth()->user()->nombres }} - {{ auth()->user()->getRoleNames()->implode(',') }} <small>Miembro desde {{ auth()->user()->created_at->isoFormat('YYYY')}}</small>
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="#" class="btn btn-default btn-flat">Perfil</a>
                            <a href="{{ route('logout') }}" class="btn btn-default btn-flat float-right" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                                <input type="submit" value="logout" style="display: none;">
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('principal') }}" class="brand-link">
                <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">TransLaSinpar S.A</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ auth()->user()->foto_perfil ? '/storage/auth()->user()->foto_perfil' : '/img/user.jpg'}}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ auth()->user()->nombres."".auth()->user()->apelllidos }}</a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    @include('Admin.Plantilla.sidebar')
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">

                @yield('header')

            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- Main Footer -->
        <footer class="main-footer text-sm">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline"> Version 1.2.1 </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2019-2020 <a href="">Computación Espam Mfl</a>.</strong>Todos los derechos reservados.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- ajax necesitado -->
    <script>
        $(document).ready(function() {
            $('#vehicle_table').DataTable({
                processing: true
                , serverSide: true
                , ajax: {
                    url: "{{ route('vehiculos.index') }}"
                }
                , columns: [{
                        data: 'marca'
                        , name: 'marca'
                    }
                    , {
                        data: 'tipoVehiculo'
                        , name: 'tipoVehiculo'
                    }
                    , {
                        data: 'placa'
                        , name: 'placa'
                    }
                    , {
                        data: 'anio'
                        , name: 'anio'
                    }
                    , {
                        data: 'users.nombres'
                        , name: 'users.nombres'
                    , }
                    , {
                        data: 'users.apellidos'
                        , name: 'users.apellidos'
                    , }
                    , {
                        data: 'action'
                        , name: 'action'
                        , orderable: false
                    }
                ]
            });


            $('#sample_form').on('submit', function(event) {
                event.preventDefault();
                if ($('#action').val() == "Edit") {
                    $.ajax({
                        url: "{{ route('vehiculos.update') }}"
                        , method: "POST"
                        , data: new FormData(this)
                        , contentType: false
                        , cache: false
                        , processData: false
                        , dataType: "json"
                        , success: function(data) {
                            var html = '';
                            if (data.errors) {
                                html = '<div class="alert alert-danger alert-dismissible">';
                                html += '<ul>';
                                for (var count = 0; count < 1; count++) {
                                    html += '<li>' + data.errors[count] + '</li>';
                                }
                                html += '</ul';
                                html += '</div>';
                            }
                            if (data.success) {
                                html = '<div class="alert alert-success">' + data.success + '</div>';
                                $('#sample_form')[0].reset();
                                $('#store_image').html('');
                                $('#vehicle_table').DataTable().ajax.reload();
                            }
                            $('#form_result').html(html);
                        }
                    });
                }

            });
            $(document).on('click', '.edit', function() {
                var id = $(this).attr('id');
                $('#form_result').html('');
                $.ajax({
                    url: "/vehiculos/" + id + "/edit"
                    , dataType: "json"
                    , success: function(html) {
                        $('#marca').val(html.data.marca);
                        $('#tipoVehiculo').val(html.data.tipoVehiculo);
                        $('#placa').val(html.data.placa);
                        $('#anio').val(html.data.anio);
                        $('#user_id').val(html.data.user_id);
                        //                  $('#store_image').html("<img src= {{ URL::to('/') }}/images/" + html.data.image + " width='70' class='img-thumbnail' />");
                        $('#hidden_id').val(html.data.id);
                        $('.modal-title').text("Edit New Record");
                        $('#action_button').val("Edit");
                        $('#action').val("Edit");
                        $('#formModal').modal('show');
                    }
                })
            });
            //inicia el desmadre
            $(document).on('click', '.view', function() {
                var id = $(this).attr('id');
                $('#form_result').html('');
                $.ajax({
                    url: "/vehiculos/" + id
                    , dataType: "json"
                    , success: function(html) {
                        $('#vmarca').text(html.data.marca);
                        $('#vtipoVehiculo').text(html.data.tipoVehiculo);
                        $('#vplaca').text(html.data.placa);
                        $('#vanio').text(html.data.anio);
                        $('#vuser_id').text(html.data.user_id);
                        $('#vusernombres').text(html.data.users.nombres);
                        $('#vuserapellidos').text(html.data.users.apellidos);
                        $('#vstore_image').html("<img src= {{ URL::to('storage') }}/" + html.data.users.foto_perfil + " style='padding:0px' class='img-fluid text-center' height='220' width='220'/>");
                        $('#exampleModal').modal('show');
                    }
                })
            });
            //termina el desmadre



            var user_id;
            $(document).on('click', '.delete', function() {
                user_id = $(this).attr('id');
                $('#confirmModal').modal('show');
            });

            $('#ok_button').click(function() {
                $.ajax({
                    url: "vehiculos/destroy/" + user_id
                    , beforeSend: function() {
                        $('#ok_button').text('Deleting...');
                    }
                    , success: function(data) {
                        setTimeout(function() {
                            $('#confirmModal').modal('hide');
                            $('#vehicle_table').DataTable().ajax.reload();
                        }, 2000);
                    }
                })
            });
        });
    </script>






    <!-- REQUIRED SCRIPTS -->
    {{-- Scripts nuestros --}}
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('js/user.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="/plugins/select2/js/select2.full.min.js"></script>
    <!-- ChartJS -->
    <script src="/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="/plugins/sparklines/sparkline.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="/plugins/moment/moment.min.js"></script>
    <script src="/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.js"></script>
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>




</body>

</html>