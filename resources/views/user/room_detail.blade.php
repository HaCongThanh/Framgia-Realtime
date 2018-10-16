@extends('user.layouts.master')

@section('style')

@endsection

@section('content')

    <!-- Sub banner start -->
    <div class="sub-banner overview-bgi">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Chi tiết loại phòng</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ route('user.home.index') }}">Trang chủ</a></li>
                    <li class="active">Chi tiết</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <div class="content-area rooms-detail-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-xs-12">
                    <!-- Heading courses start -->
                    <div class="heading-rooms  clearfix sidebar-widget">
                        <div class="pull-left">
                            <h3>{{ $room_type->name }}</h3>
                            <p>
                                <i class="fa fa-map-marker"></i>Framgia Hotel,
                            </p>
                        </div>
                        <div class="pull-right">
                            <h3><span>{{ number_format($room_type->price) }} VNĐ</span></h3>
                            <h5>Một đêm</h5>
                        </div>
                    </div>
                    <!-- Heading courses end -->

                    <!-- sidebar start -->
                    <div class="rooms-detail-slider sidebar-widget">
                        <!--  Rooms detail slider start -->
                        <div class="rooms-detail-slider simple-slider mb-40 ">
                            <div id="carousel-custom" class="carousel slide" data-ride="carousel">
                                <div class="carousel-outer">
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">

                                        @if (!empty($room_type->images))
                                            @foreach ($room_type->images as $image)

                                                <div class="item">
                                                    <img src="{{ url('/images/rooms/' . $image->filename) }}" class="thumb-preview" alt="Chevrolet Impala">
                                                </div>

                                            @endforeach
                                        @endif

                                    </div>
                                    <!-- Controls -->
                                    <a class="left carousel-control" href="#carousel-custom" role="button" data-slide="prev">
                                        <span class="slider-mover-left t-slider-l" aria-hidden="true">
                                            <i class="fa fa-angle-left"></i>
                                        </span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#carousel-custom" role="button" data-slide="next">
                                        <span class="slider-mover-right t-slider-r" aria-hidden="true">
                                            <i class="fa fa-angle-right"></i>
                                        </span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                                <!-- Indicators -->
                                <ol class="carousel-indicators thumbs visible-lg visible-md">

                                    @if (!empty($room_type->images))
                                        @foreach ($room_type->images as $image)
                                            
                                            <li data-target="#carousel-custom" data-slide-to="0" class=""><img src="{{ url('/images/rooms/' . $image->filename) }}" alt="Chevrolet Impala"></li>

                                        @endforeach
                                    @endif

                                </ol>
                            </div>
                        </div>
                        <!-- Rooms detail slider end -->

                        <!-- Search area box 2 start -->
                        <div class="sidebar-widget search-area-box-2 hidden-lg hidden-md clearfix">
                            <div class="text-center">
                                <h3>Tìm phòng của bạn</h3>
                                <h1> </h1>
                            </div>
                            <div class="search-contents">
                                <form method="GET" action="{{ route('user.home.find_rooms') }}">
                                    <div class="row">
                                        <div class="search-your-details">
                                            <div class="col-md-12 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <input type="text" name="start_date" class="btn-default datepicker" placeholder="Ngày nhận phòng">
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <input type="text" name="end_date" class="btn-default datepicker" placeholder="Ngày trả phòng">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <select class="selectpicker search-fields form-control-2" name="adults">
                                                        <option>Người lớn</option>
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
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <select class="selectpicker search-fields form-control-2" name="children">
                                                        <option>Trẻ em</option>
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
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <button type="submit" name="submit" class="search-button btn-theme">Tìm</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Search area box 2 end -->

                        <!-- Rooms description start -->
                        <div class="panel-box course-panel-box course-description">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab1default" data-toggle="tab" aria-expanded="true">Miêu tả</a></li>
                                <li class=""><a href="#tab2default" data-toggle="tab" aria-expanded="false">Tiện nghi</a></li>
                                <li class=""><a href="#tab3default" data-toggle="tab" aria-expanded="false">Đặc điểm</a></li>
                                <li class=""><a href="#tab5default" data-toggle="tab" aria-expanded="false">Video</a></li>
                            </ul>
                            <div class="panel with-nav-tabs panel-default">
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade active in" id="tab1default">
                                            <div class="divv">
                                                <!-- Title -->
                                                <h3>Mô tả về phòng</h3>
                                                <!-- paragraph -->
                                                {!! $room_type->description !!}
                                            </div>
                                        </div>
                                        <div class="tab-pane fade features" id="tab2default">
                                            <!-- Rooms features start -->
                                            <div class="rooms-features">
                                                <h3>Tiện nghi của phòng</h3>
                                                <div class="row">
                                                    <div class="condition">

                                                        @if (!empty($room_type->facilities))
                                                            @foreach ($room_type->facilities as $facility)
                                                                
                                                                <div class="col-xs-6 col-sm-6 col-md-3" style="padding-top: 10px; padding-bottom: 10px;">
                                                                    <span><i class="flaticon-bed" style="color: #3ac4fa;"></i> {{ $facility->name }}</span>
                                                                </div>

                                                            @endforeach
                                                        @endif
                                                        
                                                    </div>

                                                    {{-- <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <ul class="condition">
                                                            <li>
                                                                <i class="flaticon-air-conditioning"></i>Air conditioning
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-balcony-and-door"></i>Balcony
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-weightlifting"></i>Gym
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-parking"></i>Parking
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-sunbed"></i>Beach View
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <ul class="condition">
                                                            <li>
                                                                <i class="flaticon-bed"></i>2 Bedroom
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-person-learning-by-reading"></i>Free Newspaper
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-swimming-silhouette"></i>Use of pool
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-graph-line-screen"></i>TV
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-no-smoking-sign"></i>No Smoking
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <ul class="condition">
                                                            <li>
                                                                <i class="flaticon-room-service"></i>Room Service
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-breakfast"></i>Breakfast
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-phone-receiver"></i>Telephone
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-bed"></i>2 Bedroom
                                                            </li>
                                                            <li>
                                                                <i class="flaticon-wifi-connection-signal-symbol"></i>Free Wi-Fi
                                                            </li>
                                                        </ul>
                                                    </div> --}}
                                                </div>
                                            </div>
                                            <!-- Rooms features end -->
                                        </div>
                                        <div class="tab-pane fade technical" id="tab3default">
                                            <!-- Advantages start -->
                                            <div class="advantages">
                                                <h3>Đặc điểm phòng</h3>
                                                <ul>
                                                    <li><span>1</span>Diện tích: {{ $room_type->room_size }} m²</li>
                                                    <li><span>2</span>Số giường: {{ $room_type->bed }} giường ngủ</li>
                                                    <li><span>3</span>Số người tối đa: {{ $room_type->max_people }} người</li>
                                                </ul>
                                            </div>
                                            <!-- Advantages end -->
                                        </div>
                                    
                                        <div class="tab-pane fade" id="tab5default">
                                            <div class="inside-video-2">
                                                <h3>Video</h3>
                                                <iframe src="https://www.youtube.com/embed/5e0LxrLSzok" allowfullscreen=""></iframe>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- sidebar end -->

                    <!-- Comments section start -->
                    {{-- <div class="comments-section sidebar-widget">
                        <div class="main-title-2">
                            <h1><span>Rooms </span> Reviews</h1>
                        </div>

                        <ul class="comments">
                            <li>
                                <div class="comment">
                                    <div class="comment-author">
                                        <a href="#">
                                            <img src="img/avatar/avatar-5.png" alt="avatar-5">
                                        </a>
                                    </div>
                                    <div class="comment-content">
                                        <div class="comment-meta">
                                            <div class="comment-meta-author">
                                                Jane Doe
                                            </div>
                                            <div class="comment-meta-reply">
                                                <a href="#">Reply</a>
                                            </div>
                                            <div class="comment-meta-date">
                                                <span class="hidden-xs">8:42 PM 3/3/2017</span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="comment-body">
                                            <div class="comment-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, conser adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem vulputate interdum et vel eros. Maecenas eros enim, tincidunt vel turpis vel, dapibus tempus nulla. Donec vel nulla dui. Pellentesque sed ante sed ligula hendrerit condimentum. Suspendisse rhoncus fringilla ipsum quis porta.</p>
                                        </div>
                                    </div>
                                </div>
                                <ul>
                                    <li>
                                        <div class="comment">
                                            <div class="comment-author">
                                                <a href="#">
                                                    <img src="img/avatar/avatar-5.png" alt="avatar-5">
                                                </a>
                                            </div>

                                            <div class="comment-content">
                                                <div class="comment-meta">
                                                    <div class="comment-meta-author">
                                                        Jane Doe
                                                    </div>

                                                    <div class="comment-meta-reply">
                                                        <a href="#">Reply</a>
                                                    </div>

                                                    <div class="comment-meta-date">
                                                        <span class="hidden-xs">8:42 PM 3/3/2017</span>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="comment-body">
                                                    <div class="comment-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, conser adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem vulputate interdum et vel eros. Maecenas eros enim, tincidunt vel turpis vel, dapibus tempus nulla. Donec vel nulla dui.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <div class="comment">
                                    <div class="comment-author">
                                        <a href="#">
                                            <img src="img/avatar/avatar-5.png" alt="avatar-5">
                                        </a>
                                    </div>
                                    <div class="comment-content mb-0">
                                        <div class="comment-meta">
                                            <div class="comment-meta-author">
                                                Jane Doe
                                            </div>
                                            <div class="comment-meta-reply">
                                                <a href="#">Reply</a>
                                            </div>
                                            <div class="comment-meta-date">
                                                <span class="hidden-xs">8:42 PM 3/3/2017</span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="comment-body">
                                            <div class="comment-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div> --}}
                    <!-- Comments section end -->

                    <!-- Contact 1 start -->
                    {{-- <div class="contact-1 sidebar-widget">
                        <div class="main-title-2">
                            <h1> <span>Leave</span> a Comment</h1>
                        </div>
                        <div class="contact-form">
                            <form id="contact_form" action="https://storage.googleapis.com/themevessel-items/hotel-alpha/index.html" method="GET" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group fullname">
                                                        <input type="text" name="full-name" class="input-text" placeholder="Full Name">
                                                    </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group enter-email">
                                                        <input type="email" name="email" class="input-text" placeholder="Enter email">
                                                    </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group subject">
                                                        <input type="text" name="subject" class="input-text" placeholder="Subject">
                                                    </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group number">
                                                        <input type="text" name="phone" class="input-text" placeholder="Phone Number">
                                                    </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
                                        <div class="form-group message">
                                                        <textarea class="input-text" name="message" placeholder="Write message"></textarea>
                                                    </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                                        <div class="send-btn mb-0">
                                                        <button type="submit" class="btn-md btn-theme">Send Message</button>
                                                    </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> --}}
                    <!-- Contact-1 end -->
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="sidebar">
                        <!-- Search area box 2 start -->
                        <div class="sidebar-widget search-area-box-2 hidden-sm hidden-xs clearfix bg-grey">
                            <h3>Tìm phòng của bạn</h3>
                            <h1> </h1>
                            <div class="search-contents">
                                <form method="GET" action="{{ route('user.home.find_rooms') }}">
                                    <div class="row">
                                        <div class="search-your-details">
                                            <div class="col-md-12 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <input type="text" name="start_date" class="btn-default datepicker" placeholder="Ngày nhận phòng">
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <input type="text" name="end_date" class="btn-default datepicker" placeholder="Ngày trả phòng">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <select class="selectpicker search-fields form-control-2" name="adults">
                                                        <option>Người lớn</option>
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
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <select class="selectpicker search-fields form-control-2" name="children">
                                                        <option>Trẻ em</option>
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
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group mrg-btm-10">
                                                    <button type="submit" name="submit" class="search-button btn-theme">Tìm</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Search area box 2 end -->

                        <!-- Recent News start -->
                        <div class="sidebar-widget recent-news">
                            <div class="main-title-2">
                                <h1>Recent Posts</h1>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="img/room/small-img.jpg" alt="small-img">
                                </div>
                                <div class="media-body">
                                    <h3 class="media-heading">
                                        <a href="rooms-details.html">Host a Family Party</a>
                                    </h3>
                                    <p>From 80 $ per night</p>
                                    <h5><i class="fa fa-calendar"></i>18/10/2017</h5>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="img/room/small-img-2.jpg" alt="small-img-2">
                                </div>
                                <div class="media-body">
                                    <h3 class="media-heading">
                                        <a href="rooms-details.html">Room with View</a>
                                    </h3>
                                    <p>From 80 $ per night</p>
                                    <h5><i class="fa fa-calendar"></i>18/10/2017</h5>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="img/room/small-img-3.jpg" alt="small-img-3">
                                </div>
                                <div class="media-body">
                                    <h3 class="media-heading">
                                        <a href="rooms-details.html">Double Room</a>
                                    </h3>
                                    <p>From 80 $ per night</p>
                                    <h5><i class="fa fa-calendar"></i>18/10/2017</h5>
                                </div>
                            </div>
                        </div>
                        <!-- Recent News end -->

                        <!-- Category posts start -->
                        {{-- <div class="sidebar-widget category-posts">
                            <div class="main-title-2">
                                <h1>Category</h1>
                            </div>
                            <ul class="list-unstyled list-cat">
                                <li><a href="#">Rooms <span>(45)</span></a></li>
                                <li><a href="#">Promotion <span>(21)</span></a></li>
                                <li><a href="#">Events <span>(23)</span></a></li>
                                <li><a href="#">Creative <span>(19)</span></a></li>
                                <li><a href="#">Design <span>(19)</span></a></li>
                                <li><a href="#">Other <span>(22)</span></a></li>
                            </ul>
                        </div> --}}
                        <!-- Category posts end -->

                        <!-- Social media start -->
                        <div class="social-media sidebar-widget clearfix">
                            <div class="main-title-2">
                                <h1>Social Media</h1>
                            </div>

                            <ul class="social-list">
                                <li><a href="https://www.facebook.com/hacongthanh.t" target="blank" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                                <li><a class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                                <li><a class="rss-bg"><i class="fa fa-rss"></i></a></li>
                            </ul>
                        </div>
                        <!-- Social media end -->

                        <!-- tags box start -->
                        {{-- <div class="sidebar-widget tags-box">
                            <div class="main-title-2">
                                <h1>Tags</h1>
                            </div>
                            <ul class="tags">
                                <li><a href="#">Rooms</a></li>
                                <li><a href="#">Promotion</a></li>
                                <li><a href="#">Creative</a></li>
                                <li><a href="#">Events</a></li>
                                <li><a href="#">Design</a></li>
                                <li><a href="#">Gallery</a></li>
                                <li><a href="#">Travel</a></li>
                                <li><a href="#">Video</a></li>
                                <li><a href="#">Audio</a></li>
                            </ul>
                        </div> --}}
                        <!-- tags box end -->

                        <!-- Location start  -->
                        <div class="location sidebar-widget">
                            <div class="map">
                                <!-- Main Title 2 -->
                                <div class="main-title-2">
                                    <h1>Location</h1>
                                </div>
                                <div id="map" class="contact-map" style="height: 662px;"></div>
                            </div>
                        </div>
                        <!-- Location end -->

                        <!-- Recent comments start -->
                        {{-- <div class="sidebar-widget recent-comments">
                            <div class="main-title-2">
                                <h1>Recent comments</h1>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" src="img/avatar/avatar-1.jpg" alt="avatar-1">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <p>Lorem ipsum dolor sit amet,
                                        conser adipiscing elit.
                                        Etiamrisus tortor, accumsan,
                                    </p>
                                    <span>By <b> John Doe</b></span>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" src="img/avatar/avatar-2.jpg" alt="avatar-1">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <p>Lorem ipsum dolor sit amet,
                                        conser adipiscing elit.
                                        Etiamrisus tortor,
                                    </p>
                                    <span>By <b>Karen Paran</b></span>
                                </div>
                            </div>
                        </div> --}}
                        <!-- Recent comments end-->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

@endsection
