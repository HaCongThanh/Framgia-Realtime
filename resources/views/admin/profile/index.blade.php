@extends('admin.layouts.master')

@section('style')
    {{--<link rel="stylesheet" href="{{ asset('bower_components/lib_booking/lib/admin/css/selectize.default.css') }}" />--}}
    <link rel="stylesheet" href="{{ asset('bower_components/lib_booking/lib/admin/css/jasny-bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/user/css/toastr.min.css') }}">
@endsection

@section('content')
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">Thông tin người dùng</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ __('messages.dashboard') }}</a>
                        <span class="breadcrumb-item active">Profile</span>
                    </nav>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="row m-v-30">
                        <div class="col-sm-3">
                            @if ($users->avatar == null)
                                <img class="img-fluid rounded-circle d-block mx-auto m-b-30" src="{{ url('img/avatar-5.png') }}" alt="" width="100%">
                            @else
                                <img class="img-fluid rounded-circle d-block mx-auto m-b-30" src="{{ url('images/avatar/'.$users->avatar) }}" alt="" width="100%">
                            @endif
                        </div>
                        <div class="col-sm-4 text-center text-sm-left">
                            <h2 class="m-b-5">{{ $users->name }}</h2>
                            <p class="text-opacity m-b-20 font-size-13">
                                <i class="fa fa-user-circle-o m-r-5" aria-hidden="true"></i>
                                @if (!empty($users->roles))
                                    @foreach ($users->roles as $role)
                                        {{ $role->display_name }}
                                    @endforeach
                                @endif
                            </p>
                            <p class="text-dark"><i class="fa fa-envelope m-r-10" aria-hidden="true"></i> {{ $users->email }}</p>
                            <p class="text-dark"><i class="fa fa-phone m-r-10" aria-hidden="true"></i> {{ $users->mobile }}</p>
                            <p class="text-dark"><i class="fa fa-address-card m-r-10" aria-hidden="true"></i> {{ $users->address }}</p>
                            <p class="text-dark"><i class="fa fa-birthday-cake m-r-10" aria-hidden="true"></i> {{ $users->birthday }}</p>
                            @if ($users->gender == 1)
                                <p class="text-dark"><i class="fa fa-mars m-r-10" aria-hidden="true"></i> Nam</p>
                            @else
                                <p class="text-dark"><i class="fa fa-venus m-r-10" aria-hidden="true"></i> Nữ</p>
                            @endif
                        </div>
                        <div class="col">
                            <p class="text-dark font-size-13"><b>Contact:</b></p>
                            <ul class="list-inline">
                                <li class="m-r-15">
                                    <a class="text-gray" href="#">
                                        <i class="mdi mdi-instagram font-size-25"></i>
                                    </a>
                                </li>
                                <li class="m-r-15">
                                    <a class="text-gray" href="#">
                                        <i class="mdi mdi-facebook font-size-25"></i>
                                    </a>
                                </li>
                                <li class="m-r-15">
                                    <a class="text-gray" href="#">
                                        <i class="mdi mdi-twitter font-size-25"></i>
                                    </a>
                                </li>
                            </ul>
                            <br>
                            <div class="row">
                                <div class="col-lg-9">
                                    <p>Giới thiệu bản thân</p>
                                    <p class="m-t-30 lh-2-2">{{ $users->review }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    {{ Form::button('Cập nhật thông tin', ['id' => 'call-update', 'class' => 'btn btn-success btn-rounded btn-float', 'data-id' => $users->id]) }}
                    {{ Form::button('Đổi mật khẩu', ['class' => 'btn btn-info btn-rounded btn-float', 'data-toggle' => 'modal', 'data-target' => '#side-modal-r-1']) }}
                </div>
            </div>
            <div class="modal fade" id="modal-lg">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="p-h-15">
                                <h4>Cập nhật thông tin</h4>
                                {{ Form::open(['method' => 'POST', 'id' => 'form-user-id', 'name' => 'form-user-id']) }}
                                {{ Form::hidden('user_id', $users->id, ['id' => $users->id]) }}
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        {{ Form::text('name', '', ['id' => 'name', 'class' => 'form-control', 'placeholder' => 'Nhập tên của bạn']) }}
                                    </div>
                                    <div class="col-md-6 form-group">
                                        {{ Form::text('birthday', '', ['id' => 'birthday', 'class' => 'form-control', 'placeholder' => 'Nhập ngày sinh']) }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{ Form::text('email', '', ['id' => 'email', 'class' => 'form-control', 'readonly']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::text('mobile', '', ['id' => 'mobile', 'class' => 'form-control', 'placeholder' => 'Nhập số điện thoại']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::select('gender', ['0' => 'Nữ', '1' => 'Nam'], '', ['class' => 'form-control', 'id' => 'edit_gender']) }}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('avatar', __('messages.image'), ['class' => 'control-label']) !!}
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <span class="btn btn-default btn-file">
                                                    <span class="fileinput-new">{{ __('messages.file') }}</span>
                                                    <span class="fileinput-exists">{{ __('messages.change') }}</span>
                                                    {!! Form::file('avatar', ['id' => 'fileUpload']) !!}
                                                </span>
                                                <span class="fileinput-filename"></span>
                                                <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">×</a>
                                            </div>
                                            <div id="image-holder"></div>
                                            <img src="{{ asset('/images/avatar/'.$users->avatar) }}" width="100">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{ Form::text('address', '', ['id' => 'address', 'class' => 'form-control', 'placeholder' => 'Nhập địa chỉ']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::textarea('review', '', ['id' => 'review', 'class' => 'form-control', 'placeholder' => 'Giới thiệu đôi nét bản thân', 'rows' => '3']) }}
                                </div>
                                {{ Form::button('Cập nhật', ['id' => 'btn-update', 'class' => 'btn btn-success']) }}
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal modal-right fade " id="side-modal-r-1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="side-modal-wrapper">
                            <div class="vertical-align">
                                <div class="table-cell">
                                    <div class="modal-body">
                                        <div class="p-h-15">
                                            <h4>Password</h4>
                                            <p class="m-b-15 font-size-13">Please enter your password and enter your new password</p>
                                            {{ Form::open(['method' => 'POST', 'name' => 'password-update', 'id' => 'password-update']) }}
                                                <div class="form-group">
                                                    {{ Form::password('password', ['id' => 'password', 'class' => 'form-control', 'placeholder' => 'Enter your password']) }}
                                                </div>
                                                <div class="form-group">
                                                    {{ Form::password('password1', ['id' => 'password1', 'class' => 'form-control', 'placeholder' => 'Enter your new password']) }}
                                                </div>
                                                <div class="form-group">
                                                    {{ Form::password('password2', ['id' => 'password2', 'class' => 'form-control', 'placeholder' => 'Enter your new password, again!']) }}
                                                </div>
                                                <input type="checkbox" onclick="myFunction()">Show Password
                                                <br>
                                                {{ Form::button('Update', ['id' => 'btn-update-password', 'class' => 'btn btn-success']) }}
                                            {{ Form::close() }}
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
    <!-- Content Wrapper END -->
@endsection

@section('script')
    {{--<script src="{{ asset('bower_components/lib_booking/lib/admin/js/selectize.min.js') }}"></script>--}}
    <script src="{{ asset('bower_components/lib_booking/lib/admin/js/jasny-bootstrap.min.js') }}"></script>
    <script src="{{ asset('bower_components/lib_booking/lib/user/js/toastr.min.js') }}"></script>
    <script>
        /* show password */
        function myFunction() {
            var x = document.getElementById("password1");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        /* image preview */
        $("#fileUpload").on('change', function () {

            if (typeof (FileReader) != "undefined") {

                var image_holder = $("#image-holder");
                image_holder.empty();

                var reader = new FileReader();
                reader.onload = function (e) {
                    $("<img />", {
                        "src": e.target.result,
                        "class": "thumb-image",
                        "width": 200
                    }).appendTo(image_holder);

                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[0]);
            } else {
                alert("Select image, please.");
            }
        });

        $(document).on('click', '#call-update', function (event) {
            $('#modal-lg').modal('show');
            event.preventDefault();

            var user_id = $(this).data('id');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'GET',
                url: '/admin/profiles/' + user_id + '/edit',
                success: function (res) {
                    console.log(res);
                    $('#name').val(res.user['name']);
                    $('#email').val(res.user['email']);
                    $('#mobile').val(res.user['mobile']);
                    $('#address').val(res.user['address']);
                    $('#birthday').val(res.user['birthday']);
                    $('#gender').val(res.user['gender']);
                    $('#review').val(res.user['review']);
                    $('#avatar').val(res.user['avatar']);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    toastr.error(thrownError);
                }
            });
        });

        /*Ấn nút Cập nhật người dùng*/
        $('#btn-update').on('click', function(event) {
            event.preventDefault();

            var user_id = $('#user_id').val();
            var form = $('#form-user-id');
            var formData= form.serialize();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'PUT',
                url: '/admin/profiles/' + user_id,
                data: formData,
                success:function(res){
                    //console.log(res);
                    if (res.error == 'valid') {
                        var arr = res.message;
                        var key = Object.keys(arr);

                        for (var i = 0; i < key.length; i++) {
                            toastr.error(arr[key[i]]);
                        }
                    } else if (res.error == false){
                        toastr.success("Cập nhật người dùng thành công!");

                        $('#side-modal-r').modal('hide');

                        setTimeout(function(){
                            window.location.reload();
                        }, 1000);
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
    </script>
@endsection