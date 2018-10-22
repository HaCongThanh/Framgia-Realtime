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
                <h1>{{ __('messages.diary') }}</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ route('user.home.index') }}">{{ __('messages.home') }}</a></li>
                    <li class="active">{{ __('messages.history') }}</li>
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
                                    <th style="text-align: center;">{{ __('messages.name') }}</th>
                                    <th style="text-align: center;">{{ __('messages.date_start') }}</th>
                                    <th style="text-align: center;">{{ __('messages.date_finish') }}</th>
                                    <th style="text-align: center;">{{ __('messages.total_people') }}</th>
                                    <th style="text-align: center;">{{ __('messages.total_room') }}</th>
                                    <th style="text-align: center;">{{ __('messages.total_price') }}</th>
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
                                                {{-- <a data-toggle="modal" data-target="#details" class="text-gray m-r-15">
                                                    <i class="fa fa-twitter"></i>
                                                </a> --}}
                                                <a data-toggle="modal" data-target="#bills" class="text-gray clear-bills" onclick="bills({{ $customer_booking_log->id }});" title="{{ __('messages.view') }}">
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
                            <h4>{{ __('messages.detail') }}</h4>
                        </div>
                        <div class="modal-body">
                            <p>Epic cheeseburgers come in all kinds of manifestations, but we want them in and around our mouth no matter what. Slide those smashed patties with the gently caramelized meat fat between a toasted brioche bun and pass it over. You fall in love with the cheeseburger itself but the journey ain’t half bad either.</p>
                            <p>They’re the childhood friend that knows your highest highs and lowest lows. They’ve been with you through thick and thin and they’re the best at keeping secrets. Whether it’s dressed up or informal, cheeseburgers have your back.</p>
                        </div>
                        <div class="modal-footer no-border">
                            <div class="text-right">
                                <button class="btn btn-default" data-dismiss="modal">{{ __('messages.cancel') }}</button>
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

                            <div class="row" id="print_bill">
                                <div class="col-md-12">
                                    <div class="x_panel">
                                        <div class="x_content">
                                            <section class="content invoice">
                                                <div class="row">
                                                    <div class="col-xs-12 invoice-header">
                                                        <h1>
                                                            <i class="fa fa-globe"></i> {{ __('messages.bill') }}
                                                            <small class="pull-right" id="created_at">{{ __('messages.date_found') }}: 16/08/2016</small>
                                                        </h1>
                                                    </div>
                                                </div>

                                                <div class="row invoice-info">
                                                    <div class="col-sm-4 invoice-col">{{ __('messages.to') }}
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

                                                    <div class="col-sm-4 invoice-col">{{ __('messages.from') }}
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
                                                        <span id="user_payment_date"></span>
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
                                                                    <th style="width: 25%; text-align: center;">{{ __('messages.room_type') }}</th>
                                                                    <th style="width: 25%; text-align: center;">{{ __('messages.night') }}</th>
                                                                    <th style="width: 20%; text-align: center;">{{ __('messages.room_stt') }}</th>
                                                                    <th style="width: 25%; text-align: center;">{{ __('messages.total_price') }}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="record_details">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <p class="lead">{{ __('messages.method') }}:</p>
                                                        <img src="{{ url('/img/visa.png') }}" alt="Visa">
                                                        <img src="{{ url('/img/mastercard.png') }}" alt="Mastercard">
                                                        <img src="{{ url('/img/american-express.png') }}" alt="American Express">
                                                        <img src="{{ url('/img/paypal.png') }}" alt="Paypal">
                                                        <p class="text-muted well well-sm no-shadow" id="note" style="margin-top: 10px;"></p>
                                                    </div>

                                                    <div class="col-xs-6">
                                                        <p class="lead">{{ __('messages.total_account') }}</p>
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <tbody>
                                                                    {{-- <tr>
                                                                        <th style="width:50%">Subtotal:</th>
                                                                        <td>$250.30</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Tax (9.3%)</th>
                                                                        <td>$10.34</td>
                                                                    </tr> --}}
                                                                    <tr>
                                                                        <th>{{ __('messages.total_room') }}:</th>
                                                                        <td id="total_number_room"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>{{ __('messages.total_price') }}:</th>
                                                                        <td id="total_money"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row no-print">
                                                    <div class="col-xs-12">
                                                        <button class="btn btn-default" onclick="btnPrintBill();"><i class="fa fa-print"></i> {{ __('messages.bill_text') }}</button>
                                                        <button class="btn btn-success pull-right" data-dismiss="modal">OK</button>
                                                        <button class="btn btn-primary pull-right" data-dismiss="modal" style="margin-right: 5px;">{{ __('messages.cancel') }}</button>
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
    <script src="{{ asset('bower_components/lib_booking/lib/user/js/jQuery.print.js') }}"></script>

    <script>
        $(document).ready(function(){
            $(".clear-bills").click(function(){
                $(".clear_tr").remove();
            })
        })

        function formatNumber(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
        };

        function bills(customer_booking_log_id){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('user.bookings.bill_detail') }}",
                type: "POST",
                data: {
                    customer_booking_log_id :   customer_booking_log_id
                },
                success: function(res){
                    $count = 1;

                    for (var i = 0; i < res.data.length; i++) {
                        $room_type_name = res.data[i]['name'];
                        $price = formatNumber(res.data[i]['price']);
                        $number_room = res.data[i]['number_room'];
                        $total_price = formatNumber(res.data[i]['total_price']);
                        $created_at = res.data[i]['created_at'];
                        $total_money = formatNumber(res.data[i]['total_money']);
                        $total_number_room = res.data[i]['total_number_room'];
                        $note = res.data[i]['note'];

                        $("#record_details").append("<tr class='clear_tr'><td style='width: 5%; text-align: center;'>" + $count + "</td><td style='width: 25%; text-align: center;'>" + $room_type_name + "</td><td style='width: 25%; text-align: center;'>" + $price + " VNĐ</td><td style='width: 20%; text-align: center;'>" + $number_room + "</td><td style='width: 25%; text-align: center;'>" + $total_price + " VNĐ</td></tr>");

                        $("#created_at").html("Ngày lập: " + $created_at);
                        $("#total_money").html($total_money + " VNĐ");
                        $("#total_number_room").html($total_number_room + " phòng");

                        if ($note == null) {
                            $("#note").html('Không có ghi chú');
                        } else {
                            $("#note").html($note);
                        }
                        
                        $count++;
                    }

                    $user_name = res.info['name'];
                    $user_address = res.info['address'];
                    $user_mobile = res.info['mobile'];
                    $user_email = res.info['email'];
                    $user_card_number = res.info['card_number'];
                    $user_card_type = res.info['card_type'];
                    $user_payment_date = res.info['updated_at'];
                    $customer_booking_log_id = customer_booking_log_id;

                    $("#user_name").html($user_name);
                    $("#user_address").html($user_address);
                    $("#user_mobile").html("Điện thoại: " + $user_mobile);
                    $("#user_email").html("Email: " + $user_email);
                    $("#user_card_number").html("<b>Số thẻ:</b> " + $user_card_number);
                    $("#user_payment_date").html("<b>Ngày thanh toán:</b> " + $user_payment_date);
                    $("#customer_booking_log_id").html("<b>Mã hóa đơn #</b>" + $customer_booking_log_id);
                    // $("#user_card_type").html($user_card_type);
                }
            });
        }

        function btnPrintBill(){
            jQuery('#print_bill').print();
        }
    </script>
@endsection
