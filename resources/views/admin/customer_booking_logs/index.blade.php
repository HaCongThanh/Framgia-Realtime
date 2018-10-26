@extends('admin.layouts.master')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/admin/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/user/css/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/user/css/sweet-alert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ mix('css/user/custom.css') }}">

    <style type="text/css">
        table>tbody>tr>td {
            text-align: center;
        }
    </style>
@endsection

@section('content')

    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">{{ __('messages.room_lists') }}</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ __('Bảng điều khiển') }}</a>
                        <span class="breadcrumb-item active">{{ __('Danh sách đặt phòng') }}</span>
                    </nav>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <table id="customer_booking_logs" class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th style="text-align: center;">{{ __('#') }}</th>
                                <th style="text-align: center;">{{ __('Họ và tên') }}</th>
                                <th style="text-align: center;">{{ __('messages.date_start') }}</th>
                                <th style="text-align: center;">{{ __('messages.date_finish') }}</th>
                                <th style="text-align: center;">{{ __('Tổng số người') }}</th>
                                <th style="text-align: center;">{{ __('messages.total_room') }}</th>
                                <th style="text-align: center;">{{ __('messages.total_price') }}</th>
                                <th style="text-align: center;">{{ __('Trạng thái') }}</th>
                                <th style="text-align: center;">#</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

            <div class="modal fade" id="bills">
                <div class="modal-dialog" role="document" style="width: 70%; color: #73879C; max-width: none;">
                    <div class="modal-content">
                        <div class="modal-body">

                            <div class="row" id="print_bill">
                                <div class="col-md-12">
                                    <div class="x_panel">
                                        <div class="x_content">
                                            <section class="content invoice">
                                                <div class="row">
                                                    <div class="col-xs-12 col-md-12 col-lg-12 invoice-header">
                                                        <h1>
                                                            <i class="fa fa-globe"></i> {{ __('messages.bill') }}
                                                            <small class="pull-right" id="created_at" style="float: right;"></small>
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
                                                                    <th style="width: 20%; text-align: center;">{{ __('Số lượng phòng') }}</th>
                                                                    <th style="width: 25%; text-align: center;">{{ __('Thành tiền') }}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="record_details">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-xs-6 col-md-6 col-lg-6">
                                                        <p class="lead">{{ __('messages.method') }}:</p>
                                                        <img src="{{ url('/img/visa.png') }}" alt="Visa">
                                                        <img src="{{ url('/img/mastercard.png') }}" alt="Mastercard">
                                                        <img src="{{ url('/img/american-express.png') }}" alt="American Express">
                                                        <img src="{{ url('/img/paypal.png') }}" alt="Paypal">
                                                        <p class="text-muted well well-sm no-shadow" id="note" style="margin-top: 10px;"></p>
                                                    </div>

                                                    <div class="col-xs-6 col-md-6 col-lg-6">
                                                        <p class="lead">{{ __('messages.total_account') }}</p>
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <tbody>
                                                                    <tr>
                                                                        <th>{{ __('messages.total_room') }}:</th>
                                                                        <td id="total_number_room"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>{{ __('Tổng số đêm') }}:</th>
                                                                        <td id="night_count"></td>
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

            <div class="modal fade" id="customerCare">
                <div class="modal-dialog" role="document" style="width: 70%; color: #73879C; max-width: none;">
                    <div class="modal-content">
                        <div class="modal-header" align="center" style="border-bottom: 1px solid #04a1f4 !important;">
                            <h4 class="modal-title uppercase" style="font-weight: bold !important; color: #04a1f4;">Chăm sóc khách hàng</h4>
                        </div>
                        <div class="modal-body">

                            <div class="row info col-md-12" style="text-align: center;">
                                <div class="col-md-6">
                                    <h4 style="font-weight: 300;">Họ và tên : <span class="customer_name" style="font-weight: bold;"></span></h4>
                                </div>
                                <div class="col-md-6">
                                    <h4 style="font-weight: 300;">Địa chỉ : <span class="customer_address" style="font-weight: bold;"></span></h4>
                                </div>
                                <div class="col-md-6">
                                    <h4 style="font-weight: 300;">Số điện thoại : <span class="customer_mobile" style="font-weight: bold;"></span></h4>
                                </div>
                                <div class="col-md-6">
                                    <h4 style="font-weight: 300;">Email : <span class="customer_email" style="font-weight: bold;"></span></h4>
                                </div>

                                <input type="hidden" name="_method" id="customer_id" value="">
                                <input type="hidden" name="_method" id="customer_booking_log_id" value="">
                                <input type="hidden" name="_method" id="classRoomId" value="">
                                <input type="hidden" name="_method" id="stdClassRoomId" value="">
                            </div>

                            <br>
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#call" class="active show"><i class="fa fa-phone-square" aria-hidden="true"></i> Gọi điện</a></li>

                                <li><a data-toggle="tab" href="#sms"><i class="fa fa-comments-o" aria-hidden="true"></i> Gửi tin nhắn</a></li>

                                <li><a data-toggle="tab" href="#email"><i class="fa fa-envelope-o" aria-hidden="true"></i> Gửi email</a></li>

                                <li><a data-toggle="tab" href="#history" class="history"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Lịch sử chăm sóc</a></li>
                            </ul>

                            <div class="tab-content">
                                <br>
                                <div id="call" class="row tab-pane fade in active show">
                                    <div class="row statusCall container-fluid">
                                        <div class="col-md-3">
                                            <h5 class="bold" style="text-align: center;">Trạng thái cuộc gọi</h5>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="" id="statusCall" class="form-control" required="required">
                                                <option value="1">Đã nghe máy</option>
                                                <option value="2">Không nghe máy</option>
                                                <option value="3">Thuê bao không liên lạc được</option>
                                            </select>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="row email container-fluid">
                                        <div class="col-md-3">
                                            <h5 class="bold" style="text-align: center;">Nội dung cuộc gọi </h5>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea name="content" id="contentCall" class="form-control" rows="3" required="required" style="height: 200px;" placeholder="Nội dung cuộc gọi . . ."></textarea>
                                        </div>
                                    </div>

                                    <div class="row statusCall container-fluid">
                                        <div class="col-md-12">
                                            <br>
                                            <center>
                                                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Hủy bỏ</button>
                                                <button type="button" class="btn btn-sm btn-info" id="btnCall">Lưu</button>
                                            </center>
                                        </div>
                                    </div>
                                </div>

                                <div id="sms" class="tab-pane fade in">
                                    <div class="row email container-fluid">
                                        <div class="col-md-3">
                                            <h5 class="bold" style="text-align: center;">Nội dung tin nhắn</h5>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea name="" id="contentMessage" class="form-control" rows="3" required="required" style="height: 200px" placeholder="Nội dung tin nhắn . . ."></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <br>
                                            <center>
                                                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Hủy bỏ</button>
                                                <button type="button" class="btn btn-sm btn-info" id="btnSMS">Gửi</button>
                                            </center>
                                        </div>
                                    </div>
                                </div>

                                <div id="email" class="tab-pane fade in">
                                    <div class="row email container-fluid">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-9">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" data-toggle="dropdown" id="btnEmailSelect" style="color: #04a1f4; cursor: pointer;">Chọn mẫu Email
                                                </a><span class="caret"></span>

                                                <a style="margin-left: 50px" data-toggle="modal" href="javascript:;" onclick="showEmailTemplate()" id="btnEmailTem"><i class="fa fa-plus-square" aria-hidden="true"></i> Quản lý mẫu email</a>

                                                <ul class="dropdown-menu">
                                                    @if (!empty($email_template))
                                                        @foreach ($email_template as $email)
                                                            <li><a class="emailTemplate" id="{{$email->id}}">{{$email->name}}</a></li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <br>
                                    <div class="row email container-fluid">
                                        <div class="col-md-3">
                                            <h5 class="bold" style="text-align: center;">Tiêu đề email</h5>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="titleEmail" id="titleEmail" class="form-control" value="" placeholder="Tiêu đề email">
                                        </div>
                                    </div>

                                    <br>
                                    <div class="row email container-fluid">
                                        <div class="col-md-3">
                                            <h5 class="bold" style="text-align: center;">Nội dung email </h5>
                                        </div>
                                        <div class="col-md-9">
                                            <div id="summernote2"><p></p></div>
                                        </div>

                                        <div class="col-md-12">
                                            <br>
                                            <center>
                                                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Hủy bỏ</button>
                                                <button type="button" class="btn btn-sm btn-info" id="btnEmail">Gửi</button>
                                                <button type="button" class="btn btn-sm btn-success" value="Reset" id="btnReset">Reset</button>
                                            </center>
                                        </div>
                                    </div>
                                </div>

                                <div id="history" class="tab-pane fade">
                                    <br>
                                    <div class="table-overflow">
                                        <table class="table table-hover table-bordered table-striped" id="customer_care_history" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center;">#</th>
                                                    <th style="text-align: center;">Tiêu đề</th>
                                                    <th style="text-align: center;">Nội dung</th>
                                                    <th style="text-align: center;">Hình thức</th>
                                                    <th style="text-align: center;">Trạng thái</th>
                                                    <th style="text-align: center;">Thời gian</th>
                                                    <th style="text-align: center;">Mã hóa đơn</th>
                                                    <th style="text-align: center;">Người thực hiện</th>
                                                </tr>
                                            </thead>
                                        </table>
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
    <script src="{{ asset('bower_components/lib_booking/lib/admin/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('bower_components/lib_booking/lib/admin/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('bower_components/lib_booking/lib/admin/js/data-table.js') }}"></script>
    <script src="{{ asset('bower_components/lib_booking/lib/user/js/toastr.min.js') }}"></script>
    <script src="{{ asset('bower_components/lib_booking/lib/user/js/sweet-alert.min.js') }}"></script>
    <script src="{{ asset('bower_components/lib_booking/lib/user/js/jQuery.print.js') }}"></script>

    @routes

    <script>
        /*DataTable*/
        $('#customer_booking_logs').DataTable({
            processing: true,
            language: {
                processing: "<div id='loader'>Đang tìm! Chờ chút. Hmm...!</div>"
            },
            ordering:   false,
            // serverSide: true,
            ajax: '{{ route('admin.customer_booking_logs.get_customer_booking_logs') }}',
            columns: [
                {data: 'DT_Row_Index', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'start_date', name: 'start_date'},
                {data: 'end_date', name: 'end_date'},
                {data: 'total_number_people', name: 'total_number_people'},
                {data: 'total_number_room', name: 'total_number_room'},
                {data: 'total_money', name: 'total_money'},
                {data: 'action2', name: 'action2'},
                {data: 'action', name: 'action'}
            ]
        });
        /*---------*/

        /*Xác nhận đặt phòng*/
        function updateStatus(customer_booking_log_id) {
            var checked = $('#checked-' + customer_booking_log_id).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('admin.customer_booking_logs.updateStatus') }}',
                data: {
                    checked: checked,
                    customer_booking_log_id: customer_booking_log_id,
                },
                success: function(res)
                {
                    if (res.message == 'deactivate') {
                        $('#action-' + customer_booking_log_id).removeClass('fa-check-circle').addClass('fa-circle-o');
                        $('#checked-' + customer_booking_log_id).val(0);
                        toastr.success('Đã hủy xác nhận!');
                    } 

                    if (res.message == 'activate') {
                        $('#action-' + customer_booking_log_id).removeClass('fa-circle-o').addClass('fa-check-circle');
                        $('#checked-' + customer_booking_log_id).val(1);
                        toastr.success('Xác nhận thành công');
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    toastr.error(thrownError);
                }
            });
        }
        /*--------------------*/

        /*Format giá tiền*/
        function formatNumber(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
        };
        /*---------------*/

        /*Lấy thông tin ra hóa đơn*/
        function bills(customer_booking_log_id){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('admin.customer_booking_logs.get_customer_booking_detail') }}',
                data: {
                    customer_booking_log_id :   customer_booking_log_id
                },
                success: function(res){
                    $count = 1;

                    $('.clear_tr').remove();

                    for (var i = 0; i < res.data.length; i++) {
                        $room_type_name = res.data[i]['name'];
                        $price = formatNumber(res.data[i]['price']);
                        $number_room = res.data[i]['number_room'];
                        $total_price = formatNumber(res.data[i]['total_price'] * res.night_count);
                        $created_at = res.data[i]['created_at'];
                        $total_money = formatNumber(res.data[i]['total_money']);
                        $total_number_room = res.data[i]['total_number_room'];
                        $note = res.data[i]['note'];

                        $('#record_details').append("<tr class='clear_tr'><td style='width: 5%; text-align: center;'>" + $count + "</td><td style='width: 25%; text-align: center;'>" + $room_type_name + "</td><td style='width: 25%; text-align: center;'>" + $price + " VNĐ</td><td style='width: 20%; text-align: center;'>" + $number_room + "</td><td style='width: 25%; text-align: center;'>" + $total_price + " VNĐ</td></tr>");

                        $('#created_at').html("Ngày lập: " + $created_at);
                        $('#total_money').html($total_money + " VNĐ");
                        $('#total_number_room').html($total_number_room + " phòng");

                        if ($note == null) {
                            $('#note').html('Không có ghi chú');
                        } else {
                            $('#note').html($note);
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
                    $night_count = res.night_count;

                    $('#user_name').html($user_name);
                    $('#user_address').html($user_address);
                    $('#user_mobile').html("Điện thoại: " + $user_mobile);
                    $('#user_email').html("Email: " + $user_email);
                    $('#user_card_number').html("<b>Số thẻ:</b> " + $user_card_number);
                    $('#user_payment_date').html("<b>Ngày thanh toán:</b> " + $user_payment_date);
                    $('#customer_booking_log_id').html("<b>Mã hóa đơn #</b>" + $customer_booking_log_id);
                    $('#night_count').html($night_count + " đêm");
                }
            });
        }
        /*------------------------*/

        /*Ấn nút In hóa đơn*/
        function btnPrintBill(){
            jQuery('#print_bill').print();
        }
        /*-----------------*/

        /*Hủy hóa đơn*/
        function cancelReservation(customer_booking_log_id){
            swal({
                title: "Bạn có chắc muốn hủy hóa đơn này của khách?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
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
                    url: '{{ route('user.profiles.cancel_reservation') }}',
                    data: {
                        customer_booking_log_id :   customer_booking_log_id
                    },
                    success:function(res){
                        $('#customer_booking_logs').DataTable().ajax.reload();
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        // 
                    }
                });
            });
        }
        /*-------------*/

        /*Gọi Modal chăm sóc khách hàng*/
        function customerCare(customer_booking_log_id){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('admin.customer_booking_logs.get_info_customer_care') }}',
                data: {
                    customer_booking_log_id : customer_booking_log_id
                },
                success: function(res){

                    $('.customer_name').text(res.customer.name);
                    $('.customer_address').text(res.customer.address);
                    $('.customer_mobile').text(res.customer.mobile);
                    $('.customer_email').text(res.customer.email);
                    $('#customer_id').val(res.customer.id);
                    $('#customer_booking_log_id').val(res.customer_booking_log_id);
                    
                    // $('#courseId').val(res[0]['course_id']);
                    // $('#classRoomId').val(res[0]['class_room_id']);
                    // $('#stdClassRoomId').val(res[0]['id']);

                    customerCareHistory();
                }, 
                error: function (xhr, ajaxOptions, thrownError) {
                    toastr.error(thrownError);
                }
                
            }); 
            
        }
        /*-----------------------------*/

        /*DataTable lịch sử chăm sóc khách hàng*/
        function customerCareHistory(){
            var table = $('#customer_care_history').DataTable();

            table.destroy();

            $('#customer_care_history').DataTable({
                processing: false,
                // serverSide: true,
                ordering: false,
                ajax: {
                    type: 'POST',
                    url: '{{ route('admin.customer_booking_logs.customer_care_history') }}',
                    data: {
                        user_id: $('#customer_id').val(),
                        customer_booking_log_id: $('#customer_booking_log_id').val()
                    }
                },
                columns: [
                    {data: 'DT_Row_Index', name: 'id'},
                    {data: 'title', name: 'title'},
                    {data: 'content', name: 'content'},
                    {data: 'type', name: 'type'},
                    {data: 'status', name: 'status'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'customer_booking_log_id', name: 'customer_booking_log_id'},
                    {data: 'carer_id', name: 'carer_id'}
                ] 
            }); 
        }
        /*-------------------------------------*/

        /*Lưu cuộc gọi*/
        $('#btnCall').on('click', function(event) {
            event.preventDefault();

            swal({
                title: "Lưu cuộc gọi?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                cancelButtonText: "Không",
                confirmButtonText: "Có",
            },
            function() {
                if ($('#contentCall').val() == '') {
                    toastr['error']('Nội dung cuộc gọi không được trống!');
                } else {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: 'POST',
                        url: '{{ route('admin.customer_booking_logs.save_customer_call') }}',
                        data: {
                            user_id: $('#customer_id').val(),
                            customer_booking_log_id: $('#customer_booking_log_id').val(),
                            content: $('#contentCall').val(),
                            status: $('#statusCall option:selected').val()
                        },
                        success: function (res) {
                            if (res.error == 'valid') {
                                var arr = res.message;
                                var key = Object.keys(arr);

                                for (var i = 0; i < key.length; i++) {
                                    toastr.error(arr[key[i]]);
                                }
                            } else if (res.error == false) {
                                toastr['success']('Thêm cuộc gọi thành công');

                                $('#contentCall').val('');

                                customerCareHistory();
                            } else {
                                // 
                            }
                        },error: function (xhr, ajaxOptions, thrownError) {
                            toastr["error"](thrownError); 
                        }
                    });
                }
            });
        });
        /*------------*/
    </script>

@endsection
