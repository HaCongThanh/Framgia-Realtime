@extends('user.layouts.master')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/admin/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/user/css/sweet-alert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ mix('css/user/custom.css') }}">
@endsection

@section('content')

    <!-- Sub banner start -->
    <div class="sub-banner overview-bgi">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Nhật ký đặt phòng</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ route('user.home.index') }}">Trang chủ</a></li>
                    <li class="active">Nhật ký</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->
    
    <div class="main-content" style="width: 65%; margin: 0 auto;">
        <div class="container-fluid">
            <div class="page-header"></div>

            <div class="card">
                <div class="card-body">
                    <div class="table-overflow">
                        <table id="dt-opt" class="table table-hover table-xl">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Tên người đặt</th>
                                    <th style="text-align: center;">Ngày nhận phòng</th>
                                    <th style="text-align: center;">Ngày trả phòng</th>
                                    <th style="text-align: center;">Tổng số người</th>
                                    <th style="text-align: center;">Tổng số phòng</th>
                                    <th style="text-align: center;">Tổng tiền</th>
                                    <th style="text-align: center;">#</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if (!empty($customer_booking_logs))
                                    @foreach ($customer_booking_logs as $customer_booking_log)

                                        <tr>
                                            <td style="text-align: center;">
                                                <div class="list-media">
                                                    <span class="title">{{ $user_name }}</span>
                                                </div>
                                            </td>
                                            <td style="text-align: center;">
                                                <span>{{ date('d-m-Y', strtotime($customer_booking_log->start_date)) }}</span>
                                            </td>
                                            <td style="text-align: center;">{{ date('d-m-Y', strtotime($customer_booking_log->end_date)) }}</td>
                                            <td style="text-align: center;">{{ $customer_booking_log->total_number_people }}</td>
                                            <td style="text-align: center;">{{ $customer_booking_log->total_number_room }}</td>
                                            <td style="text-align: center;">{{ number_format($customer_booking_log->total_money) }} VNĐ</td>
                                            <td class="text-center font-size-18" style="text-align: center;">
                                                <a data-toggle="modal" data-target="#details" class="text-gray m-r-15">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                                <a data-toggle="modal" data-target="#bills" class="text-gray" onclick="bills({{ $customer_booking_log->id }})">
                                                    <i class="fa fa-credit-card"></i>
                                                </a>
                                            </td>
                                        </tr>

                                    @endforeach
                                @endif
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="details" style="margin-top: 200px;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Details</h4>
                        </div>
                        <div class="modal-body">
                            <p>Epic cheeseburgers come in all kinds of manifestations, but we want them in and around our mouth no matter what. Slide those smashed patties with the gently caramelized meat fat between a toasted brioche bun and pass it over. You fall in love with the cheeseburger itself but the journey ain’t half bad either.</p>
                            <p>They’re the childhood friend that knows your highest highs and lowest lows. They’ve been with you through thick and thin and they’re the best at keeping secrets. Whether it’s dressed up or informal, cheeseburgers have your back.</p>
                        </div>
                        <div class="modal-footer no-border">
                            <div class="text-right">
                                <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button class="btn btn-success" data-dismiss="modal">OK</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="bills" style="z-index: 99999999;">
                <div class="modal-dialog" role="document" style="width: 70%; color: #73879C;">
                    <div class="modal-content">
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="x_panel">
                                        <div class="x_content">
                                            <section class="content invoice">
                                                <div class="row">
                                                    <div class="col-xs-12 invoice-header">
                                                        <h1>
                                                            <i class="fa fa-globe"></i> Hóa đơn.
                                                            <small class="pull-right" id="created_at">Ngày lập: 16/08/2016</small>
                                                        </h1>
                                                    </div>
                                                </div>

                                                <div class="row invoice-info">
                                                    <div class="col-sm-4 invoice-col">Từ
                                                        <address>
                                                            <strong id="user_name"></strong>
                                                            <br>
                                                            <span id="user_address"></span>
                                                            <br>
                                                            <span id="user_mobile"></span>
                                                            <br>
                                                            <span id="user_email"></span>
                                                        </address>
                                                    </div>

                                                    <div class="col-sm-4 invoice-col">Đến
                                                        <address>
                                                            <strong>Framgia Hotel</strong>
                                                            <br>Hà Nội
                                                            <br>Điện thoại: 0999999999
                                                            <br>Email: payment@framgia.com
                                                        </address>
                                                    </div>

                                                    <div class="col-sm-4 invoice-col">
                                                        <span id="customer_booking_log_id"></span>
                                                        <br>
                                                        <br>
                                                        <b>Ngày thanh toán:</b> 16/10/2018
                                                        <br>
                                                        <span id="user_card_number"></span>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-xs-12 table">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 5%; text-align: center;">#</th>
                                                                    <th style="width: 25%; text-align: center;">Loại phòng</th>
                                                                    <th style="width: 25%; text-align: center;">Giá phòng / 1 đêm</th>
                                                                    <th style="width: 20%; text-align: center;">Số phòng</th>
                                                                    <th style="width: 25%; text-align: center;">Thành tiền</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="record_details">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <p class="lead">Phương thức thanh toán:</p>
                                                        <img src="{{ url('/img/visa.png') }}" alt="Visa">
                                                        <img src="{{ url('/img/mastercard.png') }}" alt="Mastercard">
                                                        <img src="{{ url('/img/american-express.png') }}" alt="American Express">
                                                        <img src="{{ url('/img/paypal.png') }}" alt="Paypal">
                                                        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                                                        </p>
                                                    </div>

                                                    <div class="col-xs-6">
                                                        <p class="lead">Amount Due 2/22/2014</p>
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <tbody>
                                                                    <tr>
                                                                        <th style="width:50%">Subtotal:</th>
                                                                        <td>$250.30</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Tax (9.3%)</th>
                                                                        <td>$10.34</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Shipping:</th>
                                                                        <td>$5.80</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Total:</th>
                                                                        <td>$265.24</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row no-print">
                                                    <div class="col-xs-12">
                                                        <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> In hóa đơn</button>
                                                        <button class="btn btn-success pull-right" data-dismiss="modal">OK</button>
                                                        <button class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right: 5px;">Cancel</button>
                                                    </div>
                                                </div>
                                            </section>
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

@endsection

@section('script')
    <script>
        function bills(customer_booking_log_id){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('user.bookings.bills') }}",
                type: "POST",
                data: {
                    customer_booking_log_id :   customer_booking_log_id
                },
                success: function(res){
                    for (var i = 0; i < res.data.length; i++) {
                        $room_type_name = res.data[i]['name'];
                        $price = res.data[i]['price'];
                        $number_room = res.data[i]['number_room'];
                        $total_price = res.data[i]['total_price'];
                        $created_at = res.data[i]['created_at'];

                        // moment.locale('vi');
                        // $created_at = moment(res.data[i]['created_at']).format('LL');

                        $("#record_details").append("<tr><td style='width: 5%; text-align: center;'>1</td><td style='width: 25%; text-align: center;'>" + $room_type_name + "</td><td style='width: 25%; text-align: center;'>" + $price + " VNĐ</td><td style='width: 20%; text-align: center;'>" + $number_room + "</td><td style='width: 25%; text-align: center;'>" + $total_price + " VNĐ</td></tr>");

                        $("#created_at").html("Ngày lập: " + $created_at);
                    }

                    $user_name = res.info['name'];
                    $user_address = res.info['address'];
                    $user_mobile = res.info['mobile'];
                    $user_email = res.info['email'];
                    $user_card_number = res.info['card_number'];
                    $user_card_type = res.info['card_type'];
                    $customer_booking_log_id = customer_booking_log_id;

                    $("#user_name").html($user_name);
                    $("#user_address").html($user_address);
                    $("#user_mobile").html("Điện thoại: " + $user_mobile);
                    $("#user_email").html("Email: " + $user_email);
                    $("#user_card_number").html("<b>Số thẻ:</b> " + $user_card_number);
                    $("#customer_booking_log_id").html("<b>Mã hóa đơn #</b>" + $customer_booking_log_id);
                    // $("#user_card_type").html($user_card_type);
                }
            });
        }
    </script>
@endsection
