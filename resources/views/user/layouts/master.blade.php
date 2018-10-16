<!DOCTYPE html>
<html lang="en">

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

    <style type="text/css">
        .sub-banner {
            background: rgba(0, 0, 0, 0.04) url({{ asset('/img/sub-banner.jpg') }}) top left repeat;
            background-size: cover;
            height: 270px;
            background-position: center center;
            background-repeat: no-repeat;
            position: relative;
        }
    </style>

    @yield('style')

</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TFC5925"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="page_loader"></div>

<!-- Top header start -->
<header class="top-header top-header-3 hidden-xs" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12">
                <div class="list-inline">
                    <a href="tel:0997654398"><i class="fa fa-phone"></i>Bạn cần hỗ trợ? 0997654398</a>
                    <a href="mailto:hacongthanh.it.hubt@gmail.com"><i class="fa fa-envelope"></i>hacongthanh.it.hubt@gmail.com</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-5 col-xs-12">
                <ul class="social-list clearfix pull-right">
                    <li>
                        <a href="#" class="facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="linkedin">
                            <i class="fa fa-linkedin"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="google">
                            <i class="fa fa-google-plus"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="rss">
                            <i class="fa fa-rss"></i>
                        </a>
                    </li>

                    @if (Auth::check())
                        <li>
                            <a class="sign-in" href="{{ route('user.logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();"><i class="fa fa-user"></i>
                                {{ __('Đăng xuất') }}
                            </a>

                            <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('user.login_form') }}" class="sign-in"><i class="fa fa-user"></i>
                                {{ __('Đăng nhập / Đăng ký') }}
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- Top header end -->

<!-- Main header start -->
<header class="main-header main-header-4">
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navigation" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{ route('user.home.index') }}" class="logo">
                    <img src="{{ url('/img/logo.png') }}" alt="logo">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="navbar-collapse collapse" role="navigation" aria-expanded="true" id="app-navigation">
                <ul class="nav navbar-nav">
                    <li class="dropdown active">
                        <a tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false">
                            Home<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="index.html">Home 1</a></li>
                            <li><a href="index-2.html">Home 2</a></li>
                            <li><a href="index-3.html">Home 3</a></li>
                            <li><a href="index-4.html">Home 4</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false">
                            Rooms<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="rooms-col-1.html">1 Column</a></li>
                            <li><a href="rooms-col-2.html">2 Column</a></li>
                            <li><a href="rooms-col-3.html">3 Column</a></li>
                            <li><a href="rooms-col-4.html">4 Column</a></li>
                            <li><a href="rooms-details.html">Rooms Details</a></li>
                            <li><a href="rooms-details-2.html">Rooms Details 2</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false">
                            Pages<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                                <a tabindex="0">Gallery</a>
                                <ul class="dropdown-menu">
                                    <li><a href="gallery-3column.html">Gallery 3 Column</a></li>
                                    <li><a href="gallery-4column.html">Gallery 4 Column</a></li>
                                    <li><a href="gallery-masonry.html">Gallery Masonry</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a tabindex="0">About Us</a>
                                <ul class="dropdown-menu">
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="about-2.html">About Us 2</a></li>
                                </ul>
                            </li>
                            <li><a href="booking-system.html">Booking System</a></li>
                            <li class="dropdown-submenu">
                                <a tabindex="0">Staff</a>
                                <ul class="dropdown-menu">
                                    <li><a href="staff.html">Staff</a></li>
                                    <li><a href="staff-2.html">Staff 2</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a tabindex="0">Events</a>
                                <ul class="dropdown-menu">
                                    <li><a href="events.html">Events</a></li>
                                    <li><a href="events-right-sidebar.html">Events Right Sidebar</a></li>
                                    <li><a href="events-details.html">Events Details</a></li>
                                </ul>
                            </li>
                            <li><a href="pricing-tables.html">Pricing Tables</a></li>
                            <li><a href="typography.html">Typography</a></li>
                            <li><a href="faq.html">Faq</a></li>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="signup.html">Signup</a></li>
                            <li><a href="forgot-password.html">Forgot Password</a></li>
                            <li><a href="404.html">404 Error</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false">
                            Contact<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="contact-2.html">Contact 2</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false">
                            Blog<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                            <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                            <li><a href="blog-full-width.html">Blog Fullwidth</a></li>
                            <li><a href="blog-creative.html">Blog Creative</a></li>
                            <li><a href="blog-details.html">Blog Detail</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right hidden-sm hidden-xs">
                    <li>
                        <a class="btn-navbar btn btn-sm btn-theme-sm-outline btn-round" href="#">Thông tin tài khoản</a>
                    </li>
                    <li>
                        <a id="header-search-btn" class="btn-navbar search-icon"><i class="fa fa-search"></i></a>
                    </li>
                </ul>
            </div>

            <!-- /.navbar-collapse -->
            <!-- /.container -->
        </nav>

        <div class="header-search animated fadeInDown">
            <form class="form-inline">
                <input type="text" class="form-control" id="searchKey" placeholder="Search...">
                <div class="search-btns">
                    <button type="submit" class="btn btn-default">Search</button>
                </div>
            </form>
        </div>
    </div>
</header>
<!-- Main header end -->

@yield('content')

<!-- Footer start -->
<footer class="main-footer clearfix">
    <div class="container">
        <!-- Footer info-->
        <div class="footer-info">
            <div class="row">
                <!-- About us -->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-item">
                        <div class="footer-logo">
                            <a href="index.html">
                                <img src="{{ url('/img/framgia3.png') }}" alt="white-logo">
                            </a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, conser adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a conser nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam.</p>
                    </div>
                </div>
                <!-- Contact Us -->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-item">
                        <div class="main-title-2">
                            <h1>Liên hệ</h1>
                        </div>
                        <ul class="personal-info">
                            <li>
                                <i class="fa fa-map-marker"></i>
                                44 New Design Street,
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i>
                                <a href="mailto:hacongthanh.it.hubt@gmail.com">hacongthanh.it.hubt@gmail.com</a>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i>
                                <a href="tel:+55-417-634-7071">0997654398</a>
                            </li>
                            <li>
                                <i class="fa fa-fax"></i>
                                Fax: +0477 85X6 552
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                        <ul class="social-list">
                            <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="rss-bg"><i class="fa fa-rss"></i></a></li>
                            <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- Gallery -->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-item gallery">
                        <div class="main-title-2">
                            <h1>Gallery</h1>
                        </div>
                        <ul>
                            <li>
                                <a href="#">
                                    <img src="{{ url('/img/small-img-2.jpg') }}" alt="small-img-2">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ url('/img/small-img-4.jpg') }}" alt="small-img-4">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ url('/img/small-img-5.jpg') }}" alt="small-img-5">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ url('/img/small-img-3.jpg') }}" alt="small-img-3">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ url('/img/small-img-6.jpg') }}" alt="small-img-6">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ url('/img/small-img.jpg') }}" alt="small-img">
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <!-- Newsletter -->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-item newsletter">
                        <div class="main-title-2">
                            <h1>Ưu đãi mới</h1>
                        </div>
                        <div class="newsletter-inner">
                            <p>Đăng ký để nhận những ưu đãi mới của khách sạn chúng tôi.</p>
                            <form action="#" method="GET">
                                <p><input type="text" class="form-contact" name="email" placeholder="Nhập Email của bạn"></p>
                                <p><button type="submit" name="submitNewsletter" class="btn btn-small">
                                    Đăng ký
                                </button></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer end -->

<!-- Copy right start -->
<div class="copy-right">
    <div class="container">
        &copy;  2018 <a href="http://themevessel.com/" target="_blank">Framgia</a>. Nhãn hiệu và thương hiệu là tài sản của chủ sở hữu tương ứng.
    </div>
</div>
<!-- Copy end right-->

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
