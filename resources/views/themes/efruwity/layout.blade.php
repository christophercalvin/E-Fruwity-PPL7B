<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Freshshop - Ecommerce Bootstrap 4 HTML Template</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ asset('themes/efruwity/assets/images/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('themes/efruwity/assets/images/apple-touch-icon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('themes/efruwity/assets/css/bootstrap.min.css') }}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('themes/efruwity/assets/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('themes/efruwity/assets/css/responsive.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('themes/efruwity/assets/css/custom.css') }}">

    <meta name="csrf-token" content="{{ csrf_token()}}">
    

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    @include('themes.efruwity.partials.header')

    @yield('content')

    @include('themes.efruwity.partials.footer')

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="{{ asset('themes/efruwity/assets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('themes/efruwity/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('themes/efruwity/assets/js/bootstrap.min.js') }}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{ asset('themes/efruwity/assets/js/jquery.superslides.min.js') }}"></script>
    <script src="{{ asset('themes/efruwity/assets/js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('themes/efruwity/assets/js/inewsticker.js') }}"></script>
    <script src="{{ asset('themes/efruwity/assets/js/bootsnav.js') }}"></script>
    <script src="{{ asset('themes/efruwity/assets/js/images-loded.min.js') }}"></script>
    <script src="{{ asset('themes/efruwity/assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('themes/efruwity/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('themes/efruwity/assets/js/baguetteBox.min.js') }}"></script>
    <script src="{{ asset('themes/efruwity/assets/js/form-validator.min.js') }}"></script>
    <script src="{{ asset('themes/efruwity/assets/js/contact-form-script.js') }}"></script>
    <script src="{{ asset('themes/efruwity/assets/js/custom.js') }}"></script>
    <script src="{{ asset('themes/efruwity/assets/js/app.js') }}"></script> <!--Seeting ongkir -->
</body>

</html>