@extends('user.layouts.master')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/admin/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/user/css/sweet-alert.css') }}">

    <style type="text/css">
        .dropdown-toggle:after {
            display: none !important;
        }
    </style>
@endsection

@section('content')

    <!-- Sub banner start -->
    <div class="sub-banner overview-bgi">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>{{ __('messages.system') }}</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ route('user.home.index') }}">{{ __('messages.home') }}</a></li>
                    <li class="active">{{ __('messages.system') }}</li>
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
                                <h2 class="hidden-xs hidden-sm">{{ __('messages.search') }} <span>{{ __('messages.class') }} </span></h2>
                                <h2 class="hidden-xs hidden-sm">{{ __('messages.you') }}</h2>
                                <h2 class="hidden-lg hidden-md">{{ __('messages.search') }} <span>{{ __('messages.class') }} </span>{{ __('messages.you') }}</h2>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9" style="margin-top: 3%;">
                            <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group">
                                        <input type="text" name="start_date" class="btn-default datepicker" placeholder="{{ __('messages.date_start') }}" value="{{ $start_date }}" required>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group">
                                        <input type="text" name="end_date" class="btn-default datepicker" placeholder="{{ __('messages.date_finish') }}" value="{{ $end_date }}" required>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields form-control-2" name="adults">
                                            <option>{{ __('messages.old') }}</option>
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
                                            <option>{{ __('messages.young') }}</option>
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

    <div class="main-content" style="width: 65%; margin: 0 auto;">
        <div class="container-fluid">
            <div class="page-header"></div>

            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-success" id="btn-booking" style="float: right; display: none;"><i class="fa fa-plus"></i> {{ __('messages.book_room') }}</button>

                    @php
                        session()->forget('route');
                        session()->put('route', 'user.home.check_out');
                    @endphp

                    <label class="btn btn-success" style="float: right; display: none;" id="lbl-booking"><span id="number-room">{{ __('messages.price_sum') }}: {{ __('messages.no_room') }}</span> <b id="price-total"></b></label>
                    <input type="hidden" name="number-room-hidden" id="number-room-hidden" class="btn btn-success" value="" disabled>
                    <input type="hidden" name="total-money-hidden" id="total-money-hidden" class="btn btn-success" value="" disabled>
                    <input type="hidden" name="start-date-hidden" id="start-date-hidden" class="btn btn-success" value="{{ $start_date }}" disabled>
                    <input type="hidden" name="end-date-hidden" id="end-date-hidden" class="btn btn-success" value="{{ $end_date }}" disabled>
                    <input type="hidden" name="night-count-hidden" id="night-count-hidden" class="btn btn-success" value="{{ $night_count }}" disabled>
                    <input type="hidden" name="adults-hidden" id="adults-hidden" class="btn btn-success" value="{{ $adults }}" disabled>
                    <input type="hidden" name="children-hidden" id="children-hidden" class="btn btn-success" value="{{ $children }}" disabled>
                    @php
                        for ($i=1; $i <= 20; $i++) {
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
                                    <th style="text-align: center;">{{ __('messages.room_type') }}</th>
                                    <th style="text-align: center;">{{ __('messages.fit') }}</th>
                                    <th style="text-align: center;">{{ __('Giá 1 phòng / 1 đêm') }}</th>
                                    <th style="text-align: center;">{{ __('messages.select_room') }}</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if (!empty($array_room_type_data))
                                    @foreach ($array_room_type_data as $data_room_type)
                                        @if (!empty($data_room_type))
                                        
                                        <tr>
                                            <td style="text-align: center;">
                                                <div class="list-media">
                                                    <a href="{{ route('user.rooms.show', $data_room_type->id) }}" target="blank" class="title">{{ $data_room_type->name }}</a>
                                                </div>
                                            </td>
                                            <td style="text-align: center;">
                                                <span class="badge badge-pill badge-gradient-success">{{ $data_room_type->max_people }} {{ __('messages.me') }}</span>
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

                                        @endif
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
                        rt10                :   $('#rt10').val(),
                        rt11                :   $('#rt11').val(),
                        rt12                :   $('#rt12').val(),
                        rt13                :   $('#rt13').val(),
                        rt14                :   $('#rt14').val(),
                        rt15                :   $('#rt15').val(),
                        rt16                :   $('#rt16').val(),
                        rt17                :   $('#rt17').val(),
                        rt18                :   $('#rt18').val(),
                        rt19                :   $('#rt19').val(),
                        rt20                :   $('#rt20').val()
                    },
                    success:function(res){
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
