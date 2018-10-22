@extends('user.layouts.master')

@section('style')
    <style type="text/css">
        #mbYTP_bgndVideo {
            width: 100% !important;
        }

        .search-area-box-6 {
            padding: 53px 0 53px !important;
        }

        .testimonials-2 {
            padding: 100px 0 130px;
            background: url({{ asset('/img/big-img-7.jpg') }});
            z-index: 0;
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
@endsection

@section('content')

    <!-- Banner start -->
    <section class="banner banner_video_bg">
        <div class="pattern-overlay">
            <a id="bgndVideo" class="player" data-property="{videoURL:'https://www.youtube.com/watch?v=5e0LxrLSzok',containment:'.banner_video_bg', quality:'large', autoPlay:true, mute:true, opacity:1}">bg</a>
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
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
    <div class="search-area-box-2 search-area-box-6" id="jump_booking">
        <div class="container">
            <div class="search-contents">
                <form method="GET" action="{{ route('user.home.find_rooms') }}">
                    <div class="row search-your-details">
                        <div class="col-lg-3 col-md-3">
                            <div class="search-your-rooms mt-20">
                                <h2 class="hidden-xs hidden-sm">{{ __('messages.search') }} <span>{{ __('messages.class') }} </span></h2>
                                <h2 class="hidden-xs hidden-sm">{{ __('messages.you') }}</h2>
                                <h2 class="hidden-lg hidden-md">{{ __('messages.search') }} <span>{{ __('messages.class') }} </span>{{ __('messages.you') }}</h2>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9" style="margin-top: 3%;">
                            <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group">
                                        <input type="text" name="start_date" class="btn-default datepicker" placeholder="{{ __('messages.date_start') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group">
                                        <input type="text" name="end_date" class="btn-default datepicker" placeholder="{{ __('messages.date_finish') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields form-control-2" name="adults">
                                            <option>{{ __('messages.old') }}</option>
                                            @php
                                                for ($i=1; $i <= 5 ; $i++) {
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
                                            <option>{{ __('messages.young') }}</option>
                                            @php
                                                for ($i=0; $i <= 5 ; $i++) {
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
                                        <button type="submit" name="submit" class="search-button btn-theme">{{ __('messages.search') }}</button>
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
                <h1>Những phòng tốt nhất</h1>
                <p> </p>
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

                    @if (!empty($room_types))
                        @foreach ($room_types as $room_type)
                            
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 filtr-item" data-category="{{ $room_type->id }}">
                                <div class="hotel-box">
                                    <div class="header clearfix">
                                        <img src="{{ url('/images/rooms/' . $room_type->images->first->filename['filename']) }}" alt="img-1" class="img-responsive" style="width: 360px; height: 240px;">
                                    </div>

                                    <div class="detail clearfix">
                                        <div class="pr">
                                            VNĐ {{ number_format($room_type->price) }}<sub>/Đêm</sub>
                                            {{-- <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-full"></i>
                                            </div> --}}
                                        </div>
                                        <h3>
                                            <a href="{{ route('user.rooms.show', $room_type->id) }}">{{ $room_type->name }}</a>
                                        </h3>
                                        <h5 class="location">
                                            <a href="{{ route('user.rooms.show', $room_type->id) }}">
                                                <i class="fa fa-map-marker"></i>Framgia Hotel,
                                            </a>
                                        </h5>

                                        @php
                                            if (strlen($room_type->description) > 436) {
                                                echo trim(substr($room_type->description, 0, 430)) . ' . . .';
                                            } else {
                                                echo $room_type->description;
                                            }
                                        @endphp
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    @endif

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
                        <h1>{{ __('messages.service') }}</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text everLorem</p>
                        <p>industry's standard dummy text everLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</p>
                        <br>
                        <a href="#jump_booking" class="btn btn-outline2 btn-md">{{ __('messages.booking') }}</a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="services-box">
                                <i class="flaticon-school-call-phone-reception"></i>
                                <h3>{{ __('messages.receptionist') }}</h3>
                                <p>Lorem ipsum dolor sit amet, conser adipisicing elit. Numquam</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="services-box">
                                <i class="flaticon-room-service"></i>
                                <h3>{{ __('messages.room_service') }}</h3>
                                <p>Lorem ipsum dolor sit amet, conser adipisicing elit. Numquam</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="services-box">
                                <i class="flaticon-graph-line-screen"></i>
                                <h3>{{ __('messages.international') }}</h3>
                                <p>Lorem ipsum dolor sit amet, conser adipisicing elit. Numquam</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="services-box">
                                <i class="flaticon-weightlifting"></i>
                                <h3>{{ __('messages.gym') }}</h3>
                                <p>Lorem ipsum dolor sit amet, conser adipisicing elit. Numquam</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="services-box">
                                <i class="flaticon-parking"></i>
                                <h3>{{ __('messages.free') }}</h3>
                                <p>Lorem ipsum dolor sit amet, conser adipisicing elit. Numquam</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="services-box">
                                <i class="flaticon-wifi-connection-signal-symbol"></i>
                                <h3>{{ __('messages.wifi') }}</h3>
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
                    <h1>{{ __('messages.customers') }}</h1>
                    <p>{{ __('messages.author') }}</p>
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
                                        <a class="teachers-img">
                                            <img src="{{ url('/img/hct.png') }}" alt="staff-1" class="img-responsive">
                                        </a>

                                        <div class="content">
                                            <h1 class="title">
                                                <a>Hà Công Thành</a>
                                            </h1>

                                            <h3 class="subject">PHP - Leader mini team</h3>

                                            <ul class="social-list clearfix">
                                                <li>
                                                    <a href="https://www.facebook.com/hacongthanh.t" target="blank" class="facebook" style="color: #3b589e !important;">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="twitter">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="linkedin">
                                                        <i class="fa fa-linkedin"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="google">
                                                        <i class="fa fa-google-plus"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="rss">
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
                                        <a class="teachers-img">
                                            <img src="{{ url('/img/viet.png') }}" alt="staff-2" class="img-responsive">
                                        </a>

                                        <div class="content">
                                            <h1 class="title">
                                                <a>Nguyễn Công Việt</a>
                                            </h1>

                                            <h3 class="subject">PHP Developer</h3>

                                            <ul class="social-list clearfix">
                                                <li>
                                                    <a href="https://www.facebook.com/congviet.ruby" target="blank" class="facebook" style="color: #3b589e !important;">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="twitter">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="linkedin">
                                                        <i class="fa fa-linkedin"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="google">
                                                        <i class="fa fa-google-plus"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="rss">
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
                                        <a class="teachers-img">
                                            <img src="{{ url('/img/hct.png') }}" alt="staff-3" class="img-responsive">
                                        </a>

                                        <div class="content">
                                            <h1 class="title">
                                                <a>Hà Công Thành</a>
                                            </h1>

                                            <h3 class="subject">PHP - Leader mini team</h3>

                                            <ul class="social-list clearfix">
                                                <li>
                                                    <a href="https://www.facebook.com/hacongthanh.t" target="blank" class="facebook" style="color: #3b589e !important;">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="twitter">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="linkedin">
                                                        <i class="fa fa-linkedin"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="google">
                                                        <i class="fa fa-google-plus"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="rss">
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
                                        <a class="teachers-img">
                                            <img src="{{ url('/img/viet.png') }}" alt="staff-4" class="img-responsive">
                                        </a>

                                        <div class="content">
                                            <h1 class="title">
                                                <a>Nguyễn Công Việt</a>
                                            </h1>

                                            <h3 class="subject">PHP - Developer</h3>

                                            <ul class="social-list clearfix">
                                                <li>
                                                    <a href="https://www.facebook.com/congviet.ruby" target="blank" class="facebook" style="color: #3b589e !important;">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="twitter">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="linkedin">
                                                        <i class="fa fa-linkedin"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="google">
                                                        <i class="fa fa-google-plus"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="rss">
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
                                            <img src="{{ url('/img/avatar-2.jpg') }}" alt="avatar-2" class="img-responsive">
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
                                            <img src="{{ url('/img/avatar-1.jpg') }}" alt="avatar-1" class="img-responsive">
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
                                            <img src="{{ url('/img/avatar-3.jpg') }}" alt="avatar-3" class="img-responsive">
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
            <div class="main-title">
                <h1>Blog của chúng tôi</h1>
                <p>Một số bài đăng gần đây nhất.</p>
            </div>

            <div class="row">

                @if (!empty($posts))
                    @foreach ($posts as $post)
                        
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="blog-1">
                                <div class="blog-photo">
                                    <img src="{{ url('/images/posts/' . $post->image) }}" style="width: 360px; height: 240px;" alt="img-2" class="img-responsive">
                                    <div class="profile-user">
                                        <img src="{{ url('/img/avatar-5.png/') }}" alt="user">
                                    </div>
                                </div>
                                <div class="detail">
                                    <div class="post-meta clearfix">
                                        <ul>
                                            <li>
                                                <strong><a>{{ $post->users->name }}</a></strong>
                                            </li>
                                            <li class="mr-0"><span>{{ date(' d/m/Y', strtotime($post->created_at)) }}</span></li>
                                            {{-- <li class="fr mr-0"><a href="#"><i class="fa fa-commenting-o"></i></a>15</li>
                                            <li class="fr"><a href="#"><i class="fa fa-calendar"></i></a>5k</li> --}}
                                        </ul>
                                    </div>
                                    <h3>
                                        <a href="{{ route('user.posts.show', $post->id) }}">
                                            @php
                                                if (strlen($post->title) > 70) {
                                                    echo trim(substr($post->title, 0, 64)) . ' . . .';
                                                } else {
                                                    echo $post->title;
                                                }
                                            @endphp
                                        </a>
                                    </h3>

                                    @php
                                        if (strlen($post->description) > 210) {
                                            echo trim(substr($post->description, 0, 204)) . ' . . .';
                                        } else {
                                            echo $post->description;
                                        }
                                    @endphp
                                    <a href="{{ route('user.posts.show', $post->id) }}" class="read-more-btn">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>

                    @endforeach
                @endif

            </div>
        </div>
    </div>
    <!-- Blog section end -->

    <!-- Intro section start -->
    <div class="intro-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <img src="{{ url('/img/framgia3.png') }}" alt="white-logo">
                </div>
                <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                    <div class="intro-text">
                        <h3>Become An Instructor</h3>
                        <p>Join thousand of instructors and earn money hassle free</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                    <a href="#jump_booking" class="btn btn-md btn-theme hidden-xs hidden-sm">Đặt phòng ngay</a>
                    <a href="#jump_booking" class="btn btn-sm btn-theme hidden-md hidden-lg">Đặt phòng ngay</a>
                </div>
            </div>
        </div>
    </div>
    <!-- intro section end -->

@endsection

@section('script')

@endsection
