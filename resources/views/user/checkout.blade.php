@extends('user.layouts.master')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/user/css/toastr.min.css') }}">
@endsection

@section('content')

    <!-- Sub banner start -->
    <div class="sub-banner overview-bgi">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Hệ thống đặt phòng</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ route('user.home.index') }}">Trang chủ</a></li>
                    <li class="active">Checkout</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->
    
    <!-- Booking flow start -->
    <div class="booking-flow content-area-10">
        <div class="container">
            <section>
                <div class="wizard">
                    <div class="wizard-inner">
                        <div class="connecting-line"></div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active" id="menu_step1">
                                <a href="#step1" data-toggle="" aria-controls="step1" role="tab" title="" data-original-title="Step 1" aria-expanded="true">
                                    <span class="round-tab">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </a>
                                <h3 class="booking-heading">Thông tin cá nhân</h3>
                            </li>
                            <li role="presentation" id="menu_step2">
                                <a href="#step2" data-toggle="" aria-controls="step2" role="tab" title="" data-original-title="Step 2">
                                    <span class="round-tab">
                                        <i class="fa fa-cc"></i>
                                    </span>
                                </a>
                                <h3 class="booking-heading">Thông tin thanh toán</h3>
                            </li>
                            <li role="presentation" id="menu_complete">
                                <a href="#complete" data-toggle="" aria-controls="complete" role="tab" title="" data-original-title="Complete">
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-ok"></i>
                                    </span>
                                </a>
                                <h3 class="booking-heading">Xác nhận</h3>
                            </li>
                        </ul>
                    </div>

                    <form id="contact_form" action="#" enctype="multipart/form-data" method="GET">
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="step1">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-xs-12 col-md-push-4">
                                        <div class="contact-form sidebar-widget">
                                            <h3 class="booking-heading-2 black-color">Thông tin cá nhân</h3>
                                            <div class="row mb-30">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group firstname">
                                                        <label>Họ và tên</label>
                                                        <input type="text" name="name" id="name" class="input-text" value="{{ $name }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group email">
                                                        <label>Địa chỉ Email</label>
                                                        <input type="email" name="email" id="email" class="input-text" value="{{ $email }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group Country">
                                                        <label>Danh xưng</label>
                                                        <select class="selectpicker country search-fields" name="gender" id="gender">
                                                            <option @if ($gender == 1) selected @endif>Anh</option>
                                                            <option @if ($gender == 0) selected @endif>Chị</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group phone">
                                                        <label>Số điện thoại</label>
                                                        <input type="text" name="mobile" id="mobile" class="input-text" value="{{ $mobile }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group address-line-2">
                                                        <label>Địa chỉ</label>
                                                        <input type="text" name="address" id="address" class="input-text" value="{{ $address }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group zip">
                                                        <label>Zip/Post Code</label>
                                                        <input type="text" name="Zip" class="input-text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group state">
                                                        <label>State/Region</label>
                                                        <input type="text" name="state" class="input-text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group Country">
                                                        <label>Country</label>
                                                        <select class="selectpicker country search-fields" name="Country">
                                                            <option>Select your county</option>
                                                            <option>United Kingdom</option>
                                                            <option>Canada</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="checkbox">
                                                <div class="ez-checkbox pull-left">
                                                    <label>
                                                        <input type="checkbox" class="ez-hide">
                                                        Bằng cách đăng ký, bạn đồng ý với các <a href="#" style="color: #3ac4fa;">điều khoản và điều kiện</a> của chúng tôi
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-xs-12 col-md-pull-8">
                                        <div class="booling-details-box">
                                            <h3 class="booking-heading-2">Thông tin đặt phòng</h3>

                                            <div class="rooms-detail-slider simple-slider ">
                                                <div id="carousel-custom" class="carousel slide" data-ride="carousel">
                                                    <div class="carousel-outer">
                                                        <div class="carousel-inner">
                                                            <div class="item">
                                                                <img src="{{ url('/img/img-2.jpg') }}" class="thumb-preview" alt="Chevrolet Impala">
                                                            </div>
                                                            <div class="item">
                                                                <img src="{{ url('/img/img-1.jpg') }}" class="thumb-preview" alt="Chevrolet Impala">
                                                            </div>
                                                            <div class="item">
                                                                <img src="{{ url('/img/img-5.jpg') }}" class="thumb-preview" alt="Chevrolet Impala">
                                                            </div>
                                                            <div class="item">
                                                                <img src="{{ url('/img/img-6.jpg') }}" class="thumb-preview" alt="Chevrolet Impala">
                                                            </div>
                                                            <div class="item">
                                                                <img src="{{ url('/img/img-3.jpg') }}" class="thumb-preview" alt="Chevrolet Impala">
                                                            </div>
                                                            <div class="item">
                                                                <img src="{{ url('/img/img-7.jpg') }}" class="thumb-preview" alt="Chevrolet Impala">
                                                            </div>
                                                            <div class="item active">
                                                                <img src="{{ url('/img/img-4.jpg') }}" class="thumb-preview" alt="Chevrolet Impala">
                                                            </div>
                                                        </div>

                                                        <a class="left carousel-control" href="#carousel-custom" role="button" data-slide="prev">
                                                             <span class="slider-mover-left no-bg" aria-hidden="true">
                                                                  <i class="fa fa-angle-left"></i>
                                                             </span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                        <a class="right carousel-control" href="#carousel-custom" role="button" data-slide="next">
                                                             <span class="slider-mover-right no-bg" aria-hidden="true">
                                                                  <i class="fa fa-angle-right"></i>
                                                             </span>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <ul>
                                                <li>
                                                    <span>Nhận phòng:</span> {{ date('d/m/Y', strtotime($start_date)) }} từ 15:00
                                                </li>
                                                <li>
                                                    <span>Trả phòng:</span> {{ date('d/m/Y', strtotime($end_date)) }} đến 12:00
                                                </li>
                                                <li>
                                                    <span>Số lượng phòng:</span> {{ $total_number_room }}
                                                </li>
                                                <li>
                                                    <span>Người lớn:</span> {{ $adults }}
                                                </li>
                                                <li>
                                                    <span>Trẻ em:</span> {{ $children }}
                                                </li>
                                            </ul>

                                            <div class="price">
                                                Tổng giá: {{ number_format($total_money) }} VNĐ
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>

                                <ul class="list-inline pull-right">
                                    <li><button type="button" id="btn_save" class="btn search-button btn-theme next-step" data-id="{{ $user_id }}">Lưu & Tiếp tục</button></li>
                                </ul>
                            </div>

                            <div class="tab-pane" role="tabpanel" id="step2">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-xs-12">
                                        <div class="contact-form sidebar-widget">
                                            <h3 class="booking-heading-2 black-color">Thông tin thanh toán</h3>

                                            <h3 class="booking-heading-2">Thông tin thẻ</h3>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group email">
                                                        <label>Loại thẻ</label>
                                                        <select class="selectpicker country search-fields" name="card_type" id="card_type">
                                                            <option @if ($card_type == 'Master Card') selected @endif>Master Card</option>
                                                            <option @if ($card_type == 'Visa') selected @endif>Visa</option>
                                                            <option @if ($card_type == 'American Express') selected @endif>American Express</option>
                                                            <option @if ($card_type == 'Paypal') selected @endif>Paypal</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group phone">
                                                        <label>Số thẻ</label>
                                                        <input type="text" name="card_number" id="card_number" class="input-text" value="{{ $card_number }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group Country">
                                                        <label>Thời hạn</label>
                                                        <select class="selectpicker country search-fields" name="expire" id="expire">
                                                            <option @if ($expire == 1) selected @endif>1</option>
                                                            <option @if ($expire == 2) selected @endif>2</option>
                                                            <option @if ($expire == 3) selected @endif>3</option>
                                                            <option @if ($expire == 4) selected @endif>4</option>
                                                            <option @if ($expire == 5) selected @endif>5</option>
                                                            <option @if ($expire == 6) selected @endif>6</option>
                                                            <option @if ($expire == 7) selected @endif>7</option>
                                                            <option @if ($expire == 8) selected @endif>8</option>
                                                            <option @if ($expire == 9) selected @endif>9</option>
                                                            <option @if ($expire == 10) selected @endif>10</option>
                                                            <option @if ($expire == 11) selected @endif>11</option>
                                                            <option @if ($expire == 12) selected @endif>12</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group Country">
                                                        <label>Năm</label>
                                                        <select class="selectpicker country search-fields" name="year" id="year">
                                                            <option @if ($year == 2018) selected @endif>2018</option>
                                                            <option @if ($year == 2017) selected @endif>2017</option>
                                                            <option @if ($year == 2016) selected @endif>2016</option>
                                                            <option @if ($year == 2015) selected @endif>2015</option>
                                                            <option @if ($year == 2014) selected @endif>2014</option>
                                                            <option @if ($year == 2013) selected @endif>2013</option>
                                                            <option @if ($year == 2012) selected @endif>2012</option>
                                                            <option @if ($year == 2011) selected @endif>2011</option>
                                                            <option @if ($year == 2010) selected @endif>2010</option>
                                                            <option @if ($year == 2009) selected @endif>2009</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <ul class="list-inline pull-right">
                                            <li><button type="button" class="btn btn-grey prev-step" id="prev_step2">Quay lại</button></li>
                                            <li><button type="button" class="btn search-button btn-theme next-step" id="next_step2" data-id="{{ $user_id }}">Chi tiết cuối cùng >></button></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-xs-12">
                                        <div class="booling-details-box">
                                            <h3 class="booking-heading-2">Thông tin đặt phòng</h3>

                                            <!--  Rooms detail slider start -->
                                            <div class="rooms-detail-slider simple-slider ">
                                                <div id="carousel-custom-2" class="carousel slide" data-ride="carousel">
                                                    <div class="carousel-outer">
                                                        <!-- Wrapper for slides -->
                                                        <div class="carousel-inner">
                                                            <div class="item">
                                                                <img src="{{ url('/img/img-2.jpg') }}" class="thumb-preview" alt="Chevrolet Impala">
                                                            </div>
                                                            <div class="item">
                                                                <img src="{{ url('/img/img-1.jpg') }}" class="thumb-preview" alt="Chevrolet Impala">
                                                            </div>
                                                            <div class="item">
                                                                <img src="{{ url('/img/img-5.jpg') }}" class="thumb-preview" alt="Chevrolet Impala">
                                                            </div>
                                                            <div class="item">
                                                                <img src="{{ url('/img/img-6.jpg') }}" class="thumb-preview" alt="Chevrolet Impala">
                                                            </div>
                                                            <div class="item">
                                                                <img src="{{ url('/img/img-3.jpg') }}" class="thumb-preview" alt="Chevrolet Impala">
                                                            </div>
                                                            <div class="item">
                                                                <img src="{{ url('/img/img-7.jpg') }}" class="thumb-preview" alt="Chevrolet Impala">
                                                            </div>
                                                            <div class="item active">
                                                                <img src="{{ url('/img/img-4.jpg') }}" class="thumb-preview" alt="Chevrolet Impala">
                                                            </div>
                                                        </div>
                                                        <!-- Controls -->
                                                        <a class="left carousel-control" href="#carousel-custom-2" role="button" data-slide="prev">
                                                             <span class="slider-mover-left no-bg" aria-hidden="true">
                                                                  <i class="fa fa-angle-left"></i>
                                                             </span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                        <a class="right carousel-control" href="#carousel-custom-2" role="button" data-slide="next">
                                                             <span class="slider-mover-right no-bg" aria-hidden="true">
                                                                  <i class="fa fa-angle-right"></i>
                                                             </span>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <ul>
                                                <li>
                                                    <span>Nhận phòng:</span> {{ date('d/m/Y', strtotime($start_date)) }} từ 15:00
                                                </li>
                                                <li>
                                                    <span>Trả phòng:</span> {{ date('d/m/Y', strtotime($end_date)) }} đến 12:00
                                                </li>
                                                <li>
                                                    <span>Số lượng phòng:</span> {{ $total_number_room }}
                                                </li>
                                                <li>
                                                    <span>Người lớn:</span> {{ $adults }}
                                                </li>
                                                <li>
                                                    <span>Trẻ em:</span> {{ $children }}
                                                </li>
                                            </ul>

                                            <div class="your-address">
                                                <strong>Địa chỉ:</strong>
                                                <address>
                                                    <strong id="name_step2"></strong>
                                                    <br><br>
                                                    <span id="address_step2"></span>
                                                </address>
                                            </div>

                                            <div class="price">
                                                Tổng giá: {{ number_format($total_money) }} VNĐ
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="complete">
                                <div class="booling-details-box booling-details-box-2 mrg-btm-30">
                                    <h3 class="booking-heading-2">Thông tin đặt phòng</h3>
                                    <div class="row mrg-btm-30">
                                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                            <!--  Rooms detail slider start -->
                                            <div class="rooms-detail-slider simple-slider ">
                                                <div id="carousel-custom-3" class="carousel slide" data-ride="carousel">
                                                    <div class="carousel-outer">
                                                        <!-- Wrapper for slides -->
                                                        <div class="carousel-inner">
                                                            <div class="item">
                                                                <img src="{{ url('/img/img-2.jpg') }}" class="thumb-preview" alt="Chevrolet Impala">
                                                            </div>
                                                            <div class="item">
                                                                <img src="{{ url('/img/img-1.jpg') }}" class="thumb-preview" alt="Chevrolet Impala">
                                                            </div>
                                                            <div class="item">
                                                                <img src="{{ url('/img/img-5.jpg') }}" class="thumb-preview" alt="Chevrolet Impala">
                                                            </div>
                                                            <div class="item">
                                                                <img src="{{ url('/img/img-6.jpg') }}" class="thumb-preview" alt="Chevrolet Impala">
                                                            </div>
                                                            <div class="item">
                                                                <img src="{{ url('/img/img-3.jpg') }}" class="thumb-preview" alt="Chevrolet Impala">
                                                            </div>
                                                            <div class="item active">
                                                                <img src="{{ url('/img/img-7.jpg') }}" class="thumb-preview" alt="Chevrolet Impala">
                                                            </div>
                                                            <div class="item">
                                                                <img src="{{ url('/img/img-4.jpg') }}" class="thumb-preview" alt="Chevrolet Impala">
                                                            </div>
                                                        </div>
                                                        <!-- Controls -->
                                                        <a class="left carousel-control" href="#carousel-custom-3" role="button" data-slide="prev">
                                                             <span class="slider-mover-left no-bg" aria-hidden="true">
                                                                  <i class="fa fa-angle-left"></i>
                                                             </span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                        <a class="right carousel-control" href="#carousel-custom-3" role="button" data-slide="next">
                                                             <span class="slider-mover-right no-bg" aria-hidden="true">
                                                                  <i class="fa fa-angle-right"></i>
                                                             </span>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Rooms detail slider end -->
                                            <p class="hidden-lg hidden-md">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra a. Aliquam pellentesque nibh et nibh feugiat gravida. Maecenas ultricies, diam vitae semper placerat, velit risus accumsan nisl, eget tempor lacus est vel</p>
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                            <h4>Your Payment ID: #302112295143</h4>

                                            <ul>
                                                <li>
                                                    <span>Nhận phòng:</span> {{ date('d/m/Y', strtotime($start_date)) }} từ 15:00
                                                </li>
                                                <li>
                                                    <span>Trả phòng:</span> {{ date('d/m/Y', strtotime($end_date)) }} đến 12:00
                                                </li>
                                                <li>
                                                    <span>Người lớn:</span> {{ $adults }}
                                                </li>
                                                <li>
                                                    <span>Trẻ em:</span> {{ $children }}
                                                </li>
                                            </ul>

                                            <div class="your-address">
                                                <strong>Địa chỉ của bạn:</strong>
                                                <address>
                                                    <strong id="name_complete"></strong>
                                                    <br><br>
                                                    <span id="address_complete"></span>
                                                </address>
                                            </div>

                                            <div class="price">
                                                Tổng giá: {{ number_format($total_money) }} VNĐ
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 hidden-sm hidden-xs">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra a. Aliquam pellentesque nibh et nibh feugiat gravida. Maecenas ultricies, diam vitae semper placerat, velit risus accumsan nisl, eget tempor lacus est vel</p>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <br/>
                                <ul class="list-inline pull-right">
                                    <li><button type="button" class="btn btn-grey prev-step" id="prev_complete">Quay lại</button></li>
                                    <li><a href="{{ route('user.bookings', 1) }}" type="button" class="btn search-button btn-theme next-step" id="btn_complete"><i class="fa fa-lock"></i> Hoàn tất đặt phòng</a></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
    <!-- Booking flow end -->

@endsection

@section('script')
    <script src="{{ asset('bower_components/lib_booking/lib/user/js/toastr.min.js') }}"></script>

    <script>
        $('#btn_save').on('click', function(event) {
            event.preventDefault();

            var user_id = $(this).data("id");
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: "{{ route('user.users.update_info') }}",
                data: {
                    id          :   user_id,
                    name        :   $('#name').val(),
                    email       :   $('#email').val(),
                    gender      :   document.getElementById("gender").value,
                    mobile      :   $('#mobile').val(),
                    address     :   $('#address').val()
                },
                success:function(res){
                    if (res.error == 'valid') {
                        var arr = res.message;
                        var key = Object.keys(arr);

                        $('#step1').addClass('active');
                        $('#step2').removeClass('active');
                        $('#menu_step1').addClass('active');
                        $('#menu_step2').removeClass('active');

                        for (var i = 0; i < key.length; i++) {
                            toastr.error(arr[key[i]]);
                        }
                    } else if (res.error == false){
                        $('#step1').removeClass('active');
                        $('#step2').addClass('active');
                        $('#menu_step1').removeClass('active');
                        $('#menu_step2').addClass('active');

                        $('#name_step2').html(res.name);
                        $('#address_step2').html(res.address);
                        $('#name_complete').html(res.name);
                        $('#address_complete').html(res.address);
                    } else {
                        //
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    // 
                }
            });
        });

        $('#prev_step2').on('click', function(event) {
            event.preventDefault();

            $('#step1').addClass('active');
            $('#step2').removeClass('active');
            $('#menu_step1').addClass('active');
            $('#menu_step2').removeClass('active');
        });

        $('#next_step2').on('click', function(event) {
            event.preventDefault();

            var user_id = $(this).data("id");

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: "{{ route('user.users.update_payment') }}",
                data: {
                    id          :   user_id,
                    card_type   :   document.getElementById("card_type").value,
                    card_number :   $('#card_number').val(),
                    expire      :   document.getElementById("expire").value,
                    year        :   document.getElementById("year").value
                },
                success:function(res){
                    if (res.error == 'valid') {
                        var arr = res.message;
                        var key = Object.keys(arr);

                        $('#step2').addClass('active');
                        $('#complete').removeClass('active');
                        $('#menu_step2').addClass('active');
                        $('#menu_complete').removeClass('active');

                        for (var i = 0; i < key.length; i++) {
                            toastr.error(arr[key[i]]);
                        }
                    } else if (res.error == false){
                        $('#step2').removeClass('active');
                        $('#complete').addClass('active');
                        $('#menu_step2').removeClass('active');
                        $('#menu_complete').addClass('active');
                    } else {
                        //
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    // 
                }
            });
        });

        $('#prev_complete').on('click', function(event) {
            event.preventDefault();

            $('#step2').addClass('active');
            $('#complete').removeClass('active');
            $('#menu_step2').addClass('active');
            $('#menu_complete').removeClass('active');
        });
    </script>
@endsection