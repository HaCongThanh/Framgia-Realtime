@extends('user.layouts.master')

@section('style')
    <style type="text/css">
        #mbYTP_bgndVideo {
            width: 100% !important;
        }

        .search-area-box-6 {
            padding: 53px 0 53px !important;
        }
    </style>
@endsection

@section('content')

    <!-- Banner start -->
    <section class="banner banner_video_bg">
        <div class="pattern-overlay">
            {{-- <a id="bgndVideo" class="player" data-property="{videoURL:'https://www.youtube.com/watch?v=5e0LxrLSzok',containment:'.banner_video_bg', quality:'large', autoPlay:true, mute:true, opacity:1}">bg</a> --}}
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <div class="carousel-caption banner-slider-inner banner-top-align">
                            <div class="banner-content text-center">
                                <h1 data-animation="animated fadeInDown delay-05s"><span>Welcome to</span> Hotel Alpha</h1>
                                <p data-animation="animated fadeInUp delay-1s">Lorem ipsum dolor sit amet, conconsectetuer adipiscing elit Lorem ipsum dolor sit amet, conconsectetuer</p>
                                <a href="#" class="btn btn-md btn-theme" data-animation="animated fadeInUp delay-15s">Get Started Now</a>
                                <a href="#" class="btn btn-md border-btn-theme" data-animation="animated fadeInUp delay-15s">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="carousel-caption banner-slider-inner banner-top-align">
                            <div class="banner-content text-center">
                                <h1 data-animation="animated fadeInLeft delay-05s"><span>Best Place To</span> Find Room</h1>
                                <p data-animation="animated fadeInUp delay-05s">Lorem ipsum dolor sit amet, conconsectetuer adipiscing elit Lorem ipsum dolor sit amet, conconsectetuer</p>
                                <a href="#" class="btn btn-md btn-theme" data-animation="animated fadeInUp delay-15s">Get Started Now</a>
                                <a href="#" class="btn btn-md border-btn-theme" data-animation="animated fadeInUp delay-15s">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="carousel-caption banner-slider-inner banner-top-align">
                            <div class="banner-content text-center">
                                <h1 data-animation="animated fadeInLeft delay-05s"><span>Best Place</span> for relux</h1>
                                <p data-animation="animated fadeInLeft delay-1s">Lorem ipsum dolor sit amet, conconsectetuer adipiscing elit Lorem ipsum dolor sit amet, conconsectetuer</p>
                                <a href="#" class="btn btn-md btn-theme" data-animation="animated fadeInLeft delay-15s">Get Started Now</a>
                                <a href="#" class="btn btn-md border-btn-theme" data-animation="animated fadeInLeft delay-20s">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="slider-mover-left" aria-hidden="true">
                    <i class="fa fa-angle-left"></i>
                </span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="slider-mover-right" aria-hidden="true">
                    <i class="fa fa-angle-right"></i>
                </span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>
    <!-- Banner end -->

    <!-- Search area box 2 start -->
    <div class="search-area-box-2 search-area-box-6">
        <div class="container">
            <div class="search-contents">
                <form method="GET" action="{{ route('user.home.find_rooms') }}">
                    <div class="row search-your-details">
                        <div class="col-lg-3 col-md-3">
                            <div class="search-your-rooms mt-20">
                                <h2 class="hidden-xs hidden-sm">Tìm <span>Phòng </span></h2>
                                <h2 class="hidden-xs hidden-sm">Của Bạn</h2>
                                <h2 class="hidden-lg hidden-md">Tìm <span>Phòng </span>Của Bạn</h2>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9" style="margin-top: 3%;">
                            <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group">
                                        <input type="text" name="start_date" class="btn-default datepicker" placeholder="Ngày nhận phòng">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group">
                                        <input type="text" name="end_date" class="btn-default datepicker" placeholder="Ngày trả phòng">
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields form-control-2" name="adults">
                                            <option>Người lớn</option>
                                            @php
                                                for ($i=0; $i <= 10 ; $i++) {
                                            @endphp
                                                <option>@php
                                                    echo $i;
                                                @endphp</option>
                                            @php
                                                }
                                            @endphp
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields form-control-2" name="children">
                                            <option>Trẻ em</option>
                                            <option>0</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-6">
                                    <div class="form-group">
                                        <button type="submit" name="submit" class="search-button btn-theme">Tìm</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Search area box 2 end -->

    <!-- Hotel section section start -->
    <div class="content-area hotel-section">
        <div class="container">
            <!-- Main title -->
            <div class="main-title">
                <h1>Our Best Rooms</h1>
                <p>These best rooms chosen by our customers</p>
            </div>
            <ul class="list-inline-listing filters filters-listing-navigation">
                <li class="active btn filtr-button filtr" data-filter="all">All</li>
                <li data-filter="1" class="btn btn-inline filtr-button filtr">Classic</li>
                <li data-filter="2" class="btn btn-inline filtr-button filtr">Deluxe</li>
                <li data-filter="3" class="btn btn-inline filtr-button filtr">Royal</li>
                <li data-filter="4" class="btn btn-inline filtr-button filtr">Luxury</li>
            </ul>
            <div class="row">
                <div class="filtr-container">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12  filtr-item" data-category="3, 2, 4">
                        <div class="hotel-box">
                            <!--header -->
                            <div class="header clearfix">
                                <img src="img/room/img-1.jpg" alt="img-1" class="img-responsive">
                            </div>
                            <!-- Detail -->
                            <div class="detail clearfix">
                                <div class="pr">
                                    $567<sub>.99/Night</sub>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-full"></i>
                                    </div>
                                </div>
                                <h3>
                                    <a href="rooms-details.html">Luxury Room</a>
                                </h3>
                                <h5 class="location">
                                    <a href="rooms-details.html">
                                        <i class="fa fa-map-marker"></i>123 Kathal St. Tampa City,
                                    </a>
                                </h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipi elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12  filtr-item" data-category="3, 4, 1">
                        <div class="hotel-box">
                            <!--header -->
                            <div class="header clearfix">
                                <img src="img/room/img-2.jpg" alt="img-2" class="img-responsive">
                            </div>
                            <!-- Detail -->
                            <div class="detail clearfix">
                                <div class="pr">
                                    $567<sub>.99/Night</sub>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-full"></i>
                                    </div>
                                </div>
                                <h3>
                                    <a href="rooms-details.html">Double Room</a>
                                </h3>
                                <h5 class="location">
                                    <a href="rooms-details.html">
                                        <i class="fa fa-map-marker"></i>123 Kathal St. Tampa City,
                                    </a>
                                </h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipi elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12  filtr-item" data-category="1, 4, 2">
                        <div class="hotel-box">
                            <!--header -->
                            <div class="header clearfix">
                                <img src="img/room/img-4.jpg" alt="img-4" class="img-responsive">
                            </div>
                            <!-- Detail -->
                            <div class="detail clearfix">
                                <div class="pr">
                                    $567<sub>.99/Night</sub>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-full"></i>
                                    </div>
                                </div>
                                <h3>
                                    <a href="rooms-details.html">Single Room</a>
                                </h3>
                                <h5 class="location">
                                    <a href="rooms-details.html">
                                        <i class="fa fa-map-marker"></i>123 Kathal St. Tampa City,
                                    </a>
                                </h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipi elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12  filtr-item" data-category="2, 3, 1">
                        <div class="hotel-box">
                            <!--header -->
                            <div class="header clearfix">
                                <img src="img/room/img-3.jpg" alt="img-3" class="img-responsive">
                            </div>
                            <!-- Detail -->
                            <div class="detail clearfix">
                                <div class="pr">
                                    $567<sub>.99/Night</sub>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-full"></i>
                                    </div>
                                </div>
                                <h3>
                                    <a href="rooms-details.html">Single Room</a>
                                </h3>
                                <h5 class="location">
                                    <a href="rooms-details.html">
                                        <i class="fa fa-map-marker"></i>123 Kathal St. Tampa City,
                                    </a>
                                </h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipi elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12  filtr-item" data-category="1, 2, 3">
                        <div class="hotel-box">
                            <!--header -->
                            <div class="header clearfix">
                                <img src="img/room/img-5.jpg" alt="img-5" class="img-responsive">
                            </div>
                            <!-- Detail -->
                            <div class="detail clearfix">
                                <div class="pr">
                                    $567<sub>.99/Night</sub>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-full"></i>
                                    </div>
                                </div>
                                <h3>
                                    <a href="rooms-details.html">Luxury Room</a>
                                </h3>
                                <h5 class="location">
                                    <a href="rooms-details.html">
                                        <i class="fa fa-map-marker"></i>123 Kathal St. Tampa City,
                                    </a>
                                </h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipi elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12  filtr-item" data-category="4, 2, 1">
                        <div class="hotel-box">
                            <!--header -->
                            <div class="header clearfix">
                                <img src="img/room/img-8.jpg" alt="img-8" class="img-responsive">
                            </div>
                            <!-- Detail -->
                            <div class="detail clearfix">
                                <div class="pr">
                                    $567<sub>.99/Night</sub>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-full"></i>
                                    </div>
                                </div>
                                <h3>
                                    <a href="rooms-details.html">Double Room</a>
                                </h3>
                                <h5 class="location">
                                    <a href="rooms-details.html">
                                        <i class="fa fa-map-marker"></i>123 Kathal St. Tampa City,
                                    </a>
                                </h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipi elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hotel section end -->
    <div class="clearfix"></div>

    <!-- Services 2 start -->
    <div class="services-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="service-text">
                        <h1>Property Services</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text everLorem</p>
                        <p>industry's standard dummy text everLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</p>
                        <br>
                        <a href="blog-details.html" class="btn btn-outline2 btn-md">View Details</a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="services-box">
                                <i class="flaticon-school-call-phone-reception"></i>
                                <h3>24-hour Reception</h3>
                                <p>Lorem ipsum dolor sit amet, conser adipisicing elit. Numquam</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="services-box">
                                <i class="flaticon-room-service"></i>
                                <h3>Room Service</h3>
                                <p>Lorem ipsum dolor sit amet, conser adipisicing elit. Numquam</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="services-box">
                                <i class="flaticon-graph-line-screen"></i>
                                <h3>Flat Screen TV</h3>
                                <p>Lorem ipsum dolor sit amet, conser adipisicing elit. Numquam</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="services-box">
                                <i class="flaticon-weightlifting"></i>
                                <h3>Gym</h3>
                                <p>Lorem ipsum dolor sit amet, conser adipisicing elit. Numquam</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="services-box">
                                <i class="flaticon-parking"></i>
                                <h3>Free Parking</h3>
                                <p>Lorem ipsum dolor sit amet, conser adipisicing elit. Numquam</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="services-box">
                                <i class="flaticon-wifi-connection-signal-symbol"></i>
                                <h3>Free Wi-Fi</h3>
                                <p>Lorem ipsum dolor sit amet, conser adipisicing elit. Numquam</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services 2 end -->

    <!-- Hotel section start -->
    <div class="content-area hotel-section chevron-icon">
        <div class="overlay">
            <div class="container">
                <!-- Main title -->
                <div class="main-title">
                    <h1>Our Staff</h1>
                    <p>Meet out small team that make those great products.</p>
                </div>
                <div class="row">
                    <div class="carousel our-partners slide" id="ourPartners3">
                        <div class="col-lg-12 mb-30">
                            <a class="right carousel-control" href="#ourPartners3" data-slide="prev"><i class="fa fa-chevron-left icon-prev"></i></a>
                            <a class="right carousel-control" href="#ourPartners3" data-slide="next"><i class="fa fa-chevron-right icon-next"></i></a>
                        </div>
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="staff-box-1">
                                        <!-- Staff img -->
                                        <a href="staff.html" class="teachers-img">
                                            <img src="img/staff/staff-1.jpg" alt="staff-1" class="img-responsive">
                                        </a>
                                        <!-- Staff content -->
                                        <div class="content">
                                            <!-- title -->
                                            <h1 class="title">
                                                <a href="staff.html">John Doe</a>
                                            </h1>
                                            <!-- Subject -->
                                            <h3 class="subject">Hotel Developer</h3>
                                            <!-- Social list -->
                                            <ul class="social-list clearfix">
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
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="staff-box-1">
                                        <!-- Staff img -->
                                        <a href="staff.html" class="teachers-img">
                                            <img src="img/staff/staff-2.jpg" alt="staff-2" class="img-responsive">
                                        </a>
                                        <!-- Staff content -->
                                        <div class="content">
                                            <!-- title -->
                                            <h1 class="title">
                                                <a href="staff.html">Karen Paran</a>
                                            </h1>
                                            <!-- Subject -->
                                            <h3 class="subject">Hotel Director</h3>
                                            <!-- Social list -->
                                            <ul class="social-list clearfix">
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
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="staff-box-1">
                                        <!-- Staff img -->
                                        <a href="staff.html" class="teachers-img">
                                            <img src="img/staff/staff-3.jpg" alt="staff-3" class="img-responsive">
                                        </a>
                                        <!-- Staff content -->
                                        <div class="content">
                                            <!-- title -->
                                            <h1 class="title">
                                                <a href="staff.html">John maikel</a>
                                            </h1>
                                            <!-- Subject -->
                                            <h3 class="subject">Hotel Manager</h3>
                                            <!-- Social list -->
                                            <ul class="social-list clearfix">
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
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="staff-box-1">
                                        <!-- Staff img -->
                                        <a href="staff.html" class="teachers-img">
                                            <img src="img/staff/staff-4.jpg" alt="staff-4" class="img-responsive">
                                        </a>
                                        <!-- Staff content -->
                                        <div class="content">
                                            <!-- title -->
                                            <h1 class="title">
                                                <a href="staff.html">John Doe</a>
                                            </h1>
                                            <!-- Subject -->
                                            <h3 class="subject">Support Manager</h3>
                                            <!-- Social list -->
                                            <ul class="social-list clearfix">
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
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hotel section end -->

    <!-- Testimonial-2 start-->
    <div class="testimonials-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div id="carouse3-example-generic" class="carousel slide" data-ride="carousel">
                        <h1>Our Testimonial</h1>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item content clearfix active">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <div class="avatar">
                                            <img src="img/avatar/avatar-2.jpg" alt="avatar-2" class="img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                        <div class="testimonials-info">
                                            <div class="text">
                                                <sup>
                                                    <i class="fa fa-quote-left"></i>
                                                </sup>
                                                Aliquam dictum elit vitae mauris facilisis, at dictum urna dignissim. Donec vel lectus vel felis lacinia luctus vitae iaculis arcu. Mauris mattis, massa eu porta ultricies.
                                                <sub>
                                                    <i class="fa fa-quote-right"></i>
                                                </sub>
                                            </div>
                                            <div class="author-name">
                                                Emma Connor
                                            </div>
                                            <ul class="rating">
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star-half-full"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item content clearfix">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <div class="avatar">
                                            <img src="img/avatar/avatar-1.jpg" alt="avatar-1" class="img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                        <div class="testimonials-info">
                                            <div class="text">
                                                <sup>
                                                    <i class="fa fa-quote-left"></i>
                                                </sup>
                                                Aliquam dictum elit vitae mauris facilisis, at dictum urna dignissim. Donec vel lectus vel felis lacinia luctus vitae iaculis arcu. Mauris mattis, massa eu porta ultricies.
                                                <sub>
                                                    <i class="fa fa-quote-right"></i>
                                                </sub>
                                            </div>
                                            <div class="author-name">
                                                John Antony
                                            </div>
                                            <ul class="rating">
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star-half-full"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item content clearfix">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <div class="avatar">
                                            <img src="img/avatar/avatar-3.jpg" alt="avatar-3" class="img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                        <div class="testimonials-info">
                                            <div class="text">
                                                <sup>
                                                    <i class="fa fa-quote-left"></i>
                                                </sup>
                                                Aliquam dictum elit vitae mauris facilisis, at dictum urna dignissim. Donec vel lectus vel felis lacinia luctus vitae iaculis arcu. Mauris mattis, massa eu porta ultricies.
                                                <sub>
                                                    <i class="fa fa-quote-right"></i>
                                                </sub>
                                            </div>
                                            <div class="author-name">
                                                John Top
                                            </div>
                                            <ul class="rating">
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star-half-full"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Controls -->
                        <a class="left carousel-control" href="#carouse3-example-generic" role="button" data-slide="prev">
                            <span class="slider-mover-left t-slider-l" aria-hidden="true">
                                <i class="fa fa-angle-left"></i>
                            </span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carouse3-example-generic" role="button" data-slide="next">
                            <span class="slider-mover-right t-slider-r" aria-hidden="true">
                                <i class="fa fa-angle-right"></i>
                            </span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial-2 end -->

    <!-- Blog section start -->
    <div class="blog-section content-area">
        <div class="container">
            <!-- Main title -->
            <div class="main-title">
                <h1>Our Blog</h1>
                <p>Check out some recent news posts.</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog-1">
                        <div class="blog-photo">
                            <img src="img/room/img-2.jpg" alt="img-2" class="img-responsive">
                            <div class="profile-user">
                                <img src="img/avatar/avatar-1.jpg" alt="user">
                            </div>
                        </div>
                        <div class="detail">
                            <div class="post-meta clearfix">
                                <ul>
                                    <li>
                                        <strong><a href="#">Antony</a></strong>
                                    </li>
                                    <li class="mr-0"><span>Feb 31, 2018</span></li>
                                    <li class="fr mr-0"><a href="#"><i class="fa fa-commenting-o"></i></a>15</li>
                                    <li class="fr"><a href="#"><i class="fa fa-calendar"></i></a>5k</li>
                                </ul>
                            </div>
                            <h3>
                                <a href="blog-details.html">Standard Post Format Title</a>
                            </h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                            <a href="blog-details.html" class="read-more-btn">Read more...</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 hidden-sm">
                    <div class="blog-1">
                        <div class="blog-photo">
                            <img src="img/room/img-6.jpg" alt="img-6" class="img-responsive">
                            <div class="profile-user">
                                <img src="img/avatar/avatar-2.jpg" alt="user">
                            </div>
                        </div>
                        <div class="detail">
                            <div class="post-meta clearfix">
                                <ul>
                                    <li>
                                        <strong><a href="#">Teseira</a></strong>
                                    </li>
                                    <li class="mr-0"><span>Feb 31, 2018</span></li>
                                    <li class="fr mr-0"><a href="#"><i class="fa fa-commenting-o"></i></a>15</li>
                                    <li class="fr"><a href="#"><i class="fa fa-calendar"></i></a>5k</li>
                                </ul>
                            </div>
                            <h3>
                                <a href="blog-details.html">Alpha Hotel pars studiorum</a>
                            </h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                            <a href="blog-details.html" class="read-more-btn">Read more...</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog-1">
                        <div class="blog-photo">
                            <img src="img/room/img-3.jpg" alt="img-3" class="img-responsive">
                            <div class="profile-user">
                                <img src="img/avatar/avatar-3.jpg" alt="user">
                            </div>
                        </div>
                        <div class="detail">
                            <div class="post-meta clearfix">
                                <ul>
                                    <li>
                                        <strong><a href="#">John Doe</a></strong>
                                    </li>
                                    <li class="mr-0"><span>Feb 31, 2018</span></li>
                                    <li class="fr mr-0"><a href="#"><i class="fa fa-commenting-o"></i></a>15</li>
                                    <li class="fr"><a href="#"><i class="fa fa-calendar"></i></a>5k</li>
                                </ul>
                            </div>
                            <h3>
                                <a href="blog-details.html">Best night photo at Alpha hotel in</a>
                            </h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                            <a href="blog-details.html" class="read-more-btn">Read more...</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog section end -->

    <!-- Intro section start -->
    <div class="intro-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <img src="img/logos/white-logo.png" alt="white-logo">
                </div>
                <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                    <div class="intro-text">
                        <h3>Become An Instructor</h3>
                        <p>Join thousand of instructors and earn money hassle free</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                    <a href="contact.html" class="btn btn-md btn-theme hidden-xs hidden-sm">Contact now</a>
                    <a href="contact.html" class="btn btn-sm btn-theme hidden-md hidden-lg">Contact now</a>
                </div>
            </div>
        </div>
    </div>
    <!-- intro section end -->

@endsection

@section('script')

@endsection
