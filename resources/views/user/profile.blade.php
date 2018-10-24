@extends('user.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('bower_components/lib_booking/lib/admin/css/bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/admin/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/admin/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/user/css/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/user/css/sweet-alert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ mix('css/user/custom.css') }}">

    <style type="text/css">
        .navbar {
            flex-wrap: nowrap;
            align-items: normal;
        }

        .navbar-nav {
            flex-direction: unset;
        }

        table>tbody>tr>td {
            text-align: center;
        }
    </style>
@endsection

@section('content')

    <br>

    <div class="main-content" style="width: 70%; margin: 0 auto;">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row m-v-30">
                        <div class="col-sm-3" id="get_profile_avatar"></div>
                        <div class="col-sm-4 text-center text-sm-left">
                            <h2 class="m-b-5" id="get_profile_name"></h2>
                            <p class="text-opacity m-b-20 font-size-13" id="get_profile_email"></p>
                            <p class="text-dark" id="get_profile_address"></p>
                            <div class="d-flex flex-row justify-content-center justify-content-sm-start">
                                <div class="p-v-20 p-r-15 text-center">
                                    <span class="font-size-18 text-info text-semibold">2</span>
                                    <small class="d-block">Lần đặt</small>
                                </div>
                                <div class="p-v-20 p-h-15 text-center">
                                    <span class="font-size-18 text-info text-semibold">3</span>
                                    <small class="d-block">Bình luận</small>
                                </div>
                                <div class="p-v-20 p-h-15 text-center">
                                    <span class="font-size-18 text-info text-semibold">5*</span>
                                    <small class="d-block">Đánh giá</small>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-success" id="edit_profile" data-id="{{ Auth::user()->id }}" style="float: right;"><i class="fa fa-edit"></i> {{ __('Cập nhật') }}</button>
                            <p class="text-dark" id="get_profile_mobile"></p>
                            <p class="text-dark" id="get_profile_birthday"></p>
                            <div class="row">
                                <div class="col-lg-9">
                                    <p class="m-t-30 lh-2-2" id="get_profile_review"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="edit_profile_modal" style="z-index: 99999999;">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4>Cập nhật thông tin</h4>
                                </div>
                                <div class="modal-body">

                                    <form id="edit_profile_form" name="edit_profile_form" action="" method="POST">
                                        <input type="hidden" value="PUT" name="_method">
                                        <input type="hidden" id="user_id" name="user_id">
                                        {{ csrf_field() }}
                                        
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div id="add-group" class="form-group form-md-line-input form-md-floating-label">
                                                    <input type="text" class="form-control" id="profile_name" name="name" placeholder="Họ và tên">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div id="add-group" class="form-group form-md-line-input form-md-floating-label">
                                                    <input type="text" class="form-control" id="profile_email" name="email" placeholder="Email" readonly>
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div id="add-group" class="form-group form-md-line-input form-md-floating-label">
                                                    <input type="text" class="form-control" id="profile_address" name="address" placeholder="Địa chỉ">
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div id="add-group" class="form-group form-md-line-input form-md-floating-label">
                                                    <input type="text" class="form-control" id="profile_mobile" name="mobile" placeholder="Số điện thoại">
                                                </div>
                                            </div>

                                            <div id="add-group" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div id="add-group" class="form-group form-md-line-input form-md-floating-label">
                                                    <select class="form-control" id="profile_gender" name="gender" style="height: 34px;">
                                                    </select>
                                                </div>
                                            </div>
    
                                            <div id="add-group" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div id="add-group" class="form-group form-md-line-input form-md-floating-label">
                                                    <input type="text" class="form-control datepicker" id="profile_birthday" name="birthday" placeholder="Ngày sinh" style="padding: 0px 8px; border-radius: 6px;">
                                                </div>
                                            </div>

                                            <div id="add-group" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div id="add-group" class="form-group form-md-line-input form-md-floating-label">
                                                    <textarea class="form-control" id="profile_review" name="review" placeholder="Đánh giá của bạn"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer no-border">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                                            <button type="submit" id="update_profile" class="btn btn-success">Cập nhật</button>
                                        </div>
                                    </form>

                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-body">
                            <div class="table-overflow">
                                <table id="customer_booking_logs" class="table table-hover table-xl">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">{{ __('#') }}</th>
                                            <th style="text-align: center;">{{ __('messages.date_start') }}</th>
                                            <th style="text-align: center;">{{ __('messages.date_finish') }}</th>
                                            <th style="text-align: center;">{{ __('Tổng số người') }}</th>
                                            <th style="text-align: center;">{{ __('messages.total_room') }}</th>
                                            <th style="text-align: center;">{{ __('messages.total_price') }}</th>
                                            <th style="text-align: center;">#</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="bills" style="z-index: 99999999;">
                        <div class="modal-dialog" role="document" style="width: 70%; color: #73879C; max-width: none;">
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
                                                                    <small class="pull-right" id="created_at"></small>
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
            ajax: '{{ route('user.profiles.get_customer_booking_log') }}',
            columns: [
                {data: 'DT_Row_Index', name: 'id'},
                {data: 'start_date', name: 'start_date'},
                {data: 'end_date', name: 'end_date'},
                {data: 'total_number_people', name: 'total_number_people'},
                {data: 'total_number_room', name: 'total_number_room'},
                {data: 'total_money', name: 'total_money'},
                {data: 'action', name: 'action'}
            ]
        });
        /*---------*/

        /*Tự động gọi hàm thông tin người dùng*/
        setTimeout(function(){
            getProfile();
        }, 500);
        /*------------------------------------*/

        /*Lấy thông tin người dùng*/
        function getProfile(){
            $.ajax({
                type: 'GET',
                url: '{{ route('user.profiles.get_profile') }}',
                success: function(res){
                    $('#get_profile_name').html(res.profile.name);
                    $('#get_profile_email').html(res.profile.email);
                    $('#get_profile_address').html(res.profile.address);
                    $('#get_profile_mobile').html('Số điện thoại: ' + res.profile.mobile);
                    $('#get_profile_birthday').html('Ngày sinh: ' + res.profile.birthday);

                    if (res.profile.review == null) {
                        $('#get_profile_review').html('Đánh giá: Chưa đánh giá');
                    } else {
                        if (res.profile.review.length >= 155) {
                            $('#get_profile_review').html('Đánh giá: ' + res.profile.review.substr(0, 155) + ' . . .');
                        } else {
                            $('#get_profile_review').html('Đánh giá: ' + res.profile.review);
                        }
                    }

                    if (res.profile.avatar == null) {
                        $('#img_profile_avatar').remove();
                        $('#get_profile_avatar').append('<img class="img-fluid rounded-circle d-block mx-auto m-b-30" src="/img/avatar-2.jpg" style="width: 200px; height: 200px;" alt="" id="img_profile_avatar">');
                    } else {
                        $('#img_profile_avatar').remove();
                        $('#get_profile_avatar').append('<img class="img-fluid rounded-circle d-block mx-auto m-b-30" src="/images/avatar/'+ res.profile.avatar +'" style="width: 200px; height: 200px;" alt="" id="img_profile_avatar">');
                    }
                    
                }
            });
        }
        /*----------------------------*/

        /*Gọi Modal Cập nhật thông tin*/
        $('#edit_profile').on('click', function(event) {
            $('#edit_profile_modal').modal('show');

            var user_id =  $(this).data('id');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'GET',
                url: '/dev/profiles/' + user_id + '/edit',
                success: function(res)
                {
                    $('#user_id').val(res.profile.id);

                    $('#profile_name').val('');
                    $('#profile_name').val(res.profile.name);

                    $('#profile_email').val('');
                    $('#profile_email').val(res.profile.email);

                    $('#profile_address').val('');
                    $('#profile_address').val(res.profile.address);

                    $('#profile_mobile').val('');
                    $('#profile_mobile').val(res.profile.mobile);

                    $('#profile_review').val('');
                    $('#profile_review').val(res.profile.review);

                    if (res.profile.gender == 0) {
                        $('#profile_gender_mr').remove();
                        $('#profile_gender_ms').remove();
                        $('#profile_gender').append('<option id="profile_gender_mr" value="1">{{ __('messages.mr') }}</option><option id="profile_gender_ms" value="0" selected>{{ __('messages.miss') }}</option>');
                    } else {
                        $('#profile_gender_mr').remove();
                        $('#profile_gender_ms').remove();
                        $('#profile_gender').append('<option id="profile_gender_mr" value="1" selected>{{ __('messages.mr') }}</option><option id="profile_gender_ms" value="0">{{ __('messages.miss') }}</option>');
                    }

                    $('#profile_birthday').val('');
                    $('#profile_birthday').val(res.birthday);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    toastr.error(thrownError);
                }
            });
        });
        /*--------------------------*/

        /*Ấn nút Cập nhật thông tin*/
        $('#update_profile').on('click', function(event) {
            event.preventDefault();

            var user_id = $('#user_id').val();
            var form = $('#edit_profile_form');
            var formData= form.serialize();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'PUT',
                url: '/dev/profiles/' + user_id,
                data: formData,
                success:function(res){
                    if (res.error == 'valid') {
                        var arr = res.message;
                        var key = Object.keys(arr);

                        for (var i = 0; i < key.length; i++) {
                            toastr.error(arr[key[i]]);
                        }
                    } else if (res.error == false){
                        toastr.success("Cập nhật thông tin cá nhân thành công!");

                        $('#edit_profile_modal').modal('hide');

                        getProfile();
                    } else {
                        //
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    // 
                }
            });
        });
        /*------------------------*/

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
                url: '{{ route('user.profiles.get_customer_booking_detail') }}',
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
                        $total_price = formatNumber(res.data[i]['total_price']);
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

        /*Hủy đặt phòng*/
        function cancelReservation(customer_booking_log_id){
            swal({
                title: "Bạn có chắc muốn hủy đặt phòng?",
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
                        $("#customer_booking_logs").DataTable().ajax.reload();
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        // 
                    }
                });
            });
        }
        /*-------------*/
    </script>
@endsection
