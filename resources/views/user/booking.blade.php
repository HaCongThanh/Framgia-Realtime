@extends('user.layouts.master')

@section('style')
    <style type="text/css">
        .dropdown-toggle:after {
            display: none !important;
        }
    </style>

    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/admin/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/user/css/sweet-alert.css') }}">
@endsection

@section('content')

    <!-- Sub banner start -->
    <div class="sub-banner overview-bgi">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Booking System</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ route('user.home.index') }}">Home</a></li>
                    <li class="active">Booking System</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

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
                                        <input type="text" name="start_date" class="btn-default datepicker" placeholder="Ngày nhận phòng" value="{{ $start_date }}">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group">
                                        <input type="text" name="end_date" class="btn-default datepicker" placeholder="Ngày trả phòng" value="{{ $end_date }}">
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields form-control-2" name="adults">
                                            <option>Người lớn</option>
                                            @php
                                                for ($i=1; $i <= 10 ; $i++) {
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

    <div class="main-content" style="width: 65%; margin: 0 auto;">
        <div class="container-fluid">
            <div class="page-header"></div>

            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-success" id="btn-booking" style="float: right;"><i class="fa fa-plus"></i> Đặt phòng</button>

                    @php
                        session()->forget('route');
                        session()->put('route', 'user.home.check_out');
                    @endphp

                    <label class="btn btn-success" style="float: right;"><span id="number-room">Tổng giá: Chưa chọn phòng nào</span> <b id="price-total"></b></label>
                    <input type="hidden" name="number-room-hidden" id="number-room-hidden" class="btn btn-success" value="" disabled>
                    <input type="hidden" name="total-money-hidden" id="total-money-hidden" class="btn btn-success" value="" disabled>
                    <input type="hidden" name="start-date-hidden" id="start-date-hidden" class="btn btn-success" value="{{ $start_date }}" disabled>
                    <input type="hidden" name="end-date-hidden" id="end-date-hidden" class="btn btn-success" value="{{ $end_date }}" disabled>
                    <input type="hidden" name="adults-hidden" id="adults-hidden" class="btn btn-success" value="{{ $adults }}" disabled>
                    <input type="hidden" name="children-hidden" id="children-hidden" class="btn btn-success" value="{{ $children }}" disabled>
                    @php
                        for ($i=1; $i <= 10; $i++) {
                    @endphp
                        <input type="hidden" name="rt@php echo $i; @endphp" id="rt@php echo $i; @endphp" class="btn btn-success" value="" disabled>
                    @php
                        }
                    @endphp
                </div>
                <div class="card-body">
                    <div class="table-overflow">
                        <table id="dt-opt" class="table table-hover table-xl">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Loại phòng</th>
                                    <th style="text-align: center;">Phù hợp cho</th>
                                    <th style="text-align: center;">Giá 1 đêm</th>
                                    <th style="text-align: center;">Chọn phòng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($array_room_type_data))
                                    @foreach ($array_room_type_data as $data_room_type)
                                        <tr>
                                            <td style="text-align: center;">
                                                <div class="list-media">
                                                    <a href="#" class="title">{{ $data_room_type->name }}</a>
                                                </div>
                                            </td>
                                            <td style="text-align: center;">
                                                <span class="badge badge-pill badge-gradient-success">{{ $data_room_type->max_people }} người</span>
                                            </td>
                                            <td style="text-align: center;">{{ number_format($data_room_type->price) }} VNĐ</td>
                                            <td style="text-align: center;">
                                                <select class="selectpicker form-control-2" name="select-room" id="select-room-{{ $data_room_type->id }}" data-price="{{ $data_room_type->price }}" onchange="selectRooms();">
                                                    <option value="0" id="number-room-0">0</option>
                                                    @php
                                                        for ($i=1; $i <= $array_count_room_type[$data_room_type->id]; $i++) {
                                                    @endphp
                                                        <option value="@php echo $i; @endphp" id="number-room-@php echo $i; @endphp">@php
                                                            echo $i;
                                                        @endphp</option>
                                                    @php
                                                        }
                                                    @endphp
                                                </select>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{ asset('bower_components/lib_booking/lib/user/js/sweet-alert.min.js') }}"></script>
    <script src="{{ mix('js/user/booking.js') }}"></script>

    <script>
        $('#btn-booking').on('click', function(event) {
            event.preventDefault();

            swal({
                title: "Bạn có chắc muốn đặt loại phòng này?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#24d5d8",
                cancelButtonText: "Không",
                confirmButtonText: "Có",
            },
            function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: "{{ route('user.session_bookings') }}",
                    data: {
                        total_number_room   :   $('#number-room-hidden').val(),
                        total_money         :   $('#total-money-hidden').val(),
                        start_date          :   $('#start-date-hidden').val(),
                        end_date            :   $('#end-date-hidden').val(),
                        adults              :   $('#adults-hidden').val(),
                        children            :   $('#children-hidden').val(),
                        rt1                 :   $('#rt1').val(),
                        rt2                 :   $('#rt2').val(),
                        rt3                 :   $('#rt3').val(),
                        rt4                 :   $('#rt4').val(),
                        rt5                 :   $('#rt5').val(),
                        rt6                 :   $('#rt6').val(),
                        rt7                 :   $('#rt7').val(),
                        rt8                 :   $('#rt8').val(),
                        rt9                 :   $('#rt9').val(),
                        rt10                :   $('#rt10').val()
                    },
                    success:function(res){
                        // console.log(res);
                        window.location.href = "{{ route('user.home.check_out') }}";
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        // 
                    }
                });
            });
        });
    </script>
@endsection
