<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>TRANSLASINPAR | LOGIN</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="../assets/css/material-kit.css?v=2.0.6" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>

<body class="login-page">
    <div class="page-header header-filter"
        style="background-image: url('/img/login.jpg'); background-size: cover; background-position: bottom center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                    <div class="card card-login">
                        <form method="POST" action="{{ route('login') }}"> @csrf <div
                                class="card-header card-header-warning text-center">
                                <img src="/img/taxi.png" height="50px" width="50px">
                                <h4 class="card-title">SISTEMA</h4>
                            </div>
                            <p class="description text-center">Bienvenido</p>
                            <div class="card-body">
                                <div class="input-group label-floating {{ $errors->has('cedula') ? ' has-error' : '' }}">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-id-card" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <input id="cedula" type="text" minlength="1" class="form-control" name="cedula" placeholder="Cédula de identidad" required autofocus>
                                    @if($errors->has('cedula'))
                                    <script>
                                        Swal.fire('Oops...', '{{ $errors->first('cedula') }}', 'error');
                                    </script>
                                    @endif
                                </div>
                                <div class="input-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">lock_outline</i>
                                        </span>
                                    </div>
                                    <input type="password" class="form-control" placeholder="Contraseña" name="password"
                                        required autocomplete="current-password">

                                        @if ($errors->has('password'))
                                        <script>
                                            Swal.fire('Oops...', '{{ $errors->first('password') }}', 'error');
                                        </script>
                                        @endif
                                </div>
                                <div class="text-center">
                                    <button type="submit" class=" mt-5 mb-5 btn btn-warning btn-regular">Iniciar
                                        sesión</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <div class="copyright float-center"> &copy;<script>
                        document.write(new Date().getFullYear())
                    </script>
                    <a href="https://www.computacion.espam.edu.ec" target="_blank" class="animated fadeInUp">Computacion
                    </a>- Espam MFL </div>
            </div>
        </footer>
    </div>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="../assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
    <script src="../assets/js/plugins/moment.min.js"></script>
    <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
    <script src="../assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
    <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/material-kit.js?v=2.0.6" type="text/javascript"></script>
</body>

</html>
