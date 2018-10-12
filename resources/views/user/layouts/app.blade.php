<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        '../../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-TFC5925');</script>
    <!-- End Google Tag Manager -->
    <title>Framgia Hotel - System Booking 5 Star</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/user/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/user/css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/user/css/bootstrap-submenu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/user/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/user/fonts/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/user/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/user/fonts/linearicons/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/user/css/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/user/css/bootstrap-datepicker.min.css')}}">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ mix('css/user/style.css') }}">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="{{ asset('bower_components/lib_booking/lib/user/css/blue-light-2.css') }}">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{ url('/img/icon.png') }}" type="image/x-icon" >

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPlayfair+Display:400,700%7CRoboto:100,300,400,400i,500,700">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/user/css/ie10-viewport-bug-workaround.css') }}">

    <script src="{{ asset('bower_components/lib_booking/lib/user/js/ie-emulation-modes-warning.js') }}"></script>

    @yield('style')

</head>
<body>

@yield('content')

<script src="{{ asset('bower_components/lib_booking/lib/user/js/jquery-2.2.0.min.js') }}"></script>
<script src="{{ asset('bower_components/lib_booking/lib/user/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('bower_components/lib_booking/lib/user/js/bootstrap-submenu.js') }}"></script>
<script src="{{ asset('bower_components/lib_booking/lib/user/js/jquery.mb.YTPlayer.js') }}"></script>
<script src="{{ asset('bower_components/lib_booking/lib/user/js/wow.min.js') }}"></script>
<script src="{{ asset('bower_components/lib_booking/lib/user/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('bower_components/lib_booking/lib/user/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('bower_components/lib_booking/lib/user/js/jquery.scrollUp.js') }}"></script>
<script src="{{ asset('bower_components/lib_booking/lib/user/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('bower_components/lib_booking/lib/user/js/jquery.filterizr.js') }}"></script>
<script src="{{ asset('bower_components/lib_booking/lib/user/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ mix('js/user/app.js') }}"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="{{ asset('bower_components/lib_booking/lib/user/js/ie10-viewport-bug-workaround.js') }}"></script>
<!-- Custom javascript -->
@yield('script')

</body>
</html>
