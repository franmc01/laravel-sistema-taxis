<!DOCTYPE html>
<html lang="en">
<head>
    <!--meta tags-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="keywords" content="iamfrancis98, onepage, developer, resume, cv, personal, portfolio, personal resume, clean, modern">
    <meta name="author" content="FranciscoMarin">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Template name-->
    <title>Compañia de Taxis TransLaSimpar</title>
    <!--Favicon-->
    <link rel="apple-touch-icon" sizes="57x57" href="/principal/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/principal/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/principal/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/principal/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/principal/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/principal/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/principal/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/principal/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/principal/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/principal/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/principal/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/principal/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/principal/favicon/favicon-16x16.png">
    <link rel="manifest" href="/principal/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/principal/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!--========== Theme Fonts ==========-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,600,700,800" rel="stylesheet">
    <!--Font Awesome css-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!--Bootstrap css-->
    <link rel="stylesheet" href="/principal/css/bootstrap.min.css">
    <!--Animated headline css-->
    <link rel="stylesheet" href="/principal/css/jquery.animatedheadline.css">
    <!--Owl carousel css-->
    <link rel="stylesheet" href="/principal/css/owl.carousel.css">
    <link rel="stylesheet" href="/principal/css/owl.theme.default.css">
    <!--Magnific popup css-->
    <link rel="stylesheet" href="/principal/css/magnific-popup.css">
    <!--line icon css-->
    <link rel="stylesheet" href="/principal/css/line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" />
    <!--Theme css-->
    <link rel="stylesheet" href="/principal/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.0/noty.min.css">
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css' rel='stylesheet' />
</head>
<body style="overflow-x:hidden;">

    <!--Start Loader-->
    <div class="loader_bg">
        <div class="loader"></div>
    </div>
    <!--Start Navbar-->
    @include('Paginaprincipal.partials.home')
    <!--Start About-->
    @include('Paginaprincipal.partials.nosotros')
    <!--Start Services-->
    @include('Paginaprincipal.partials.servicios')
    <!-- Our Video Company -->
    @include('Paginaprincipal.partials.video')
    <!--Start Personal-->
    @include('Paginaprincipal.partials.personal')
    <!--Start Testimonial-->
    @include('Paginaprincipal.partials.testimonios')
    <!--Start Map-->
    @include('Paginaprincipal.partials.mapa')
    <!--Start Contact-->
    @include('Paginaprincipal.partials.contacto')


    <!--Start Footer-->
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                    <p>&copy; Todos los derechos reservados a: <a href="#">Computación ESPAM MFL</a></p>
                </div>
            </div>
        </div>
    </div>

    <!--Start Scripts-->
    <!--Latest version JQuery-->
    <script src="/principal/js/jquery-3.4.1.min.js"></script>
    <!--Bootstrap js-->
    <script src="/principal/js/bootstrap.min.js"></script>
    <!--Animated headline js-->
    <script src="/principal/js/jquery.animatedheadline.js"></script>
    <!--Magnific popup js-->
    <script src="/principal/js/jquery.magnific-popup.js"></script>
    <!--Waypoint js-->
    <script src="/principal/js/jquery.waypoints.js"></script>
    <!--Validator js-->
    <script src="/principal/js/validator.js"></script>
    <!--Contact js-->
    <script src="/principal/js/contact.js"></script>
    <!--isotope js-->
    <script src="/principal/js/isotope.pkgd.min.js"></script>
    <!--Owl Carousel js-->
    <script src="/principal/js/owl.carousel.js"></script>
    <!--counter up js-->
    <script src="/principal/js/jquery.counterup.min.js"></script>
    <!--Wow js-->
    <script src="/principal/js/wow.min.js"></script>
    <!--Main js-->
    <script src="/principal/js/main.js"></script>
    <!--Notify js-->
    <script src="/principal/js/notify.min.js"></script>

    <script src='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js'></script>
    <script src="/js/mapa.js"></script>

</body>

</html>
