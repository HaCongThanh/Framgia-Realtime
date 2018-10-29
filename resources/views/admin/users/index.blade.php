@extends('admin.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('bower_components/lib_booking/lib/admin/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/user/css/sweet-alert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_booking/lib/user/css/toastr.min.css') }}">
@endsection

@section('content')
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <h2 class="header-title">{{ __('messages.user_list') }}</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ __('Bảng điều khiển') }}</a>
                        <span class="breadcrumb-item active">{{ __('Danh sách nhân viên') }}</span>
                    </nav>
                </div>
            </div>

            <div class="card">
                @if (Entrust::can('add-users'))
                <div class="card-header border bottom">
                    <button type="button" id="call_add_user" class="btn btn-success"><i class="ti-plus"></i> {{ __('messages.add') }}</button>
                </div>
                @endif
                <div class="card-body">
                    <div class="table-overflow">
                        <table id="dt-opt" class="table table-hover table-xl">
                            <thead>
                            <tr>
                                <th style="text-align: center;">#</th>
                                <th style="text-align: center;">{{ __('Họ và tên') }}</th>
                                <th style="text-align: center;">{{ __('messages.gender') }}</th>
                                <th style="text-align: center;">{{ __('messages.phone') }}</th>
                                <th style="text-align: center;">{{ __('messages.email') }}</th>
                                <th style="text-align: center;">{{ __('Vai trò') }}</th>
                                @if (Entrust::hasRole('super-admin'))
                                <th style="text-align: center;">{{ __('messages.action') }}</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>

                                @if (!empty($users))
                                    @foreach ($users as $key => $user)
                                        
                                        <tr>
                                            <td style="text-align: center;">{{ $key + 1 }}</td>
                                            <td style="text-align: center;">
                                                <div class="list-media">
                                                    <a href="#" class="title">{{ $user->name }}</a>
                                                </div>
                                            </td>
                                            <td style="text-align: center;">
                                                @if ($user->gender == 1)
                                                    <i class="fa fa-mars" style="font-weight:bold; color: blue"></i>
                                                @else
                                                    <i class="fa fa-venus" style="font-weight:bold; color: red"></i>
                                                @endif
                                            </td>
                                            <td style="text-align: center;">{{ $user->mobile }}</td>
                                            <td style="text-align: center;">{{ $user->email }}</td>
                                            <td style="text-align: center;">
                                                @if (!empty($user->roles))
                                                    @foreach ($user->roles as $role)
                                                        @if ($role->display_name == 'Super Admin')
                                                            <span class="badge badge-pill badge-gradient-warning">
                                                                {{ $role->display_name }}
                                                            </span>
                                                        @elseif ($role->display_name == 'Quản Lý')
                                                            <span class="badge badge-pill badge-danger">
                                                                {{ $role->display_name }}
                                                            </span>
                                                        @else
                                                            <span class="badge badge-pill badge-gradient-success">
                                                                {{ $role->display_name }}
                                                            </span>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </td>
                                            @if (Entrust::can(['select-role-users', 'edit-users', 'delete-users']))
                                            <td class="text-center font-size-18" style="text-align: center;">
                                                <a href="{{ route('users.show', $user->id) }}" class="text-gray" data-tooltip="tooltip" title="{{ __('Vai trò') }}"><i class="ti-lock"></i></a>
                                                <a id="call_edit_user" data-id="{{ $user->id }}" class="text-gray" data-tooltip="tooltip" title="{{ __('messages.edit') }}"><i class="ti-pencil"></i></a>
                                                <a id="delete_user" data-id="{{ $user->id }}" class="text-gray" data-tooltip="tooltip" title="{{ __('messages.delete') }}"><i class="ti-trash"></i></a>
                                            </td>
                                            @endif
                                        </tr>

                                    @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="add_user_modal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Thêm mới nhân viên</h4>
                        </div>
                        <div class="modal-body">
                            {{ Form::open(['route' => 'users.store', 'method' => 'POST', 'id' => 'add_user_form', 'name' => 'add_user_form']) }}
                                <div id="add-group" class="form-group form-md-line-input form-md-floating-label">
                                    {{ Form::text('name', '', ['class' => 'form-control', 'id' => 'name', 'placeholder' => "Nhập tên"]) }}
                                </div>

                                <div id="add-group" class="form-group form-md-line-input form-md-floating-label">
                                    {{ Form::text('email', '', ['class' => 'form-control', 'id' => 'email', 'placeholder' => "Nhập Email"]) }}
                                </div>

                                <div id="add-group" class="form-group form-md-line-input form-md-floating-label">
                                    {{ Form::text('address', '', ['class' => 'form-control', 'id' => 'address', 'placeholder' => "Địa chỉ"]) }}
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div id="add-group" class="form-group form-md-line-input form-md-floating-label">
                                            {{ Form::text('mobile', '', ['class' => 'form-control', 'id' => 'mobile', 'placeholder' => "Số điện thoại"]) }}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div id="add-group" class="form-group form-md-line-input form-md-floating-label">
                                            {{ Form::select('gender', ['0' => 'Nữ', '1' => 'Nam'], '', ['class' => 'form-control', 'id' => 'gender', 'placeholder' => "Giới tính"]) }}
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer no-border">
                                    {{ Form::button("Hủy", ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) }}
                                    {{ Form::submit("Tạo", ['class' => 'btn btn-success', 'id' => 'add_user']) }}
                                </div>
                            {{ Form::close() }}
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="modal fade" id="edit_user_modal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Sửa nhân viên</h4>
                        </div>
                        <div class="modal-body">
                            {{ Form::open(['method' => 'POST', 'id' => 'edit_user_form', 'name' => 'edit_user_form']) }}

                            {{ Form::hidden('user_id', '', ['class' => 'form-control', 'id' => 'user_id']) }}

                            <div id="add-group" class="form-group form-md-line-input form-md-floating-label">
                                {{ Form::text('name', '', ['class' => 'form-control', 'id' => 'edit_name']) }}
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div id="add-group" class="form-group form-md-line-input form-md-floating-label">
                                        {{ Form::text('email', '', ['class' => 'form-control', 'id' => 'edit_email', 'readonly']) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div id="add-group" class="form-group form-md-line-input form-md-floating-label">
                                        {{ Form::select('type', ['0' => 'Deactivate', '1' => 'Activate'], '', ['class' => 'form-control', 'id' => 'edit_type']) }}
                                    </div>
                                </div>
                            </div>

                            <div id="add-group" class="form-group form-md-line-input form-md-floating-label">
                                {{ Form::text('address', '', ['class' => 'form-control', 'id' => 'edit_address']) }}
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div id="add-group" class="form-group form-md-line-input form-md-floating-label">
                                        {{ Form::text('mobile', '', ['class' => 'form-control', 'id' => 'edit_mobile']) }}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div id="add-group" class="form-group form-md-line-input form-md-floating-label">
                                        {{ Form::select('gender', ['0' => 'Nữ', '1' => 'Nam'], '', ['class' => 'form-control', 'id' => 'edit_gender']) }}
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer no-border">
                                {{ Form::button("Hủy", ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) }}
                                {{ Form::submit("Sửa", ['class' => 'btn btn-success', 'id' => 'edit_user']) }}
                            </div>
                            {{ Form::close() }}
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Content Wrapper END -->
@endsection

@section('script')
    <script src="{{ asset('bower_components/lib_booking/lib/admin/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('bower_components/lib_booking/lib/admin/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('bower_components/lib_booking/lib/admin/js/data-table.js') }}"></script>
    <script src="{{ asset('bower_components/lib_booking/lib/user/js/sweet-alert.min.js') }}"></script>
    <script src="{{ asset('bower_components/lib_booking/lib/user/js/toastr.min.js') }}"></script>

    <script>
        /*Gọi Modal thêm mới nhân viên*/
        $(document).on('click', '#call_add_user', function() {
            $('#add_user_modal').modal('show');
            $('#name').val('');
            $('#email').val('');
            $('#password').val('');
            $('#mobile').val('');
            $('#address').val('');
            $('#gender').val('');
        });
        /*--------------------------*/

        //add user
        $('#add_user').on('click', function (event) {
            event.preventDefault();

            var form = $('#add_user_form');
            var formData = form.serialize();

            $.ajaxSetup({
                header: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('users.store') }}',
                data: formData,

                success: function (res) {
                    //console.log(res);
                    if (res.error == 'valid') {
                        var arr = res.message;
                        var key = Object.keys(arr);

                        for (var i = 0; i < key.length; i++) {
                            toastr.error(arr[key[i]]);
                        }
                    } else  if (res.error == false) {
                        toastr.success("Thành công");

                        $('#add_user_modal').modal('hide');

                        setTimeout(function(){
                            window.location.reload();
                        }, 1000);
                    } else {
                        //
                    }
                },

                error: function (res) {
                    //
                }
            });
        });

        /*Gọi Modal Cập nhật user*/
        $(document).on('click', '#call_edit_user', function() {
            $('#edit_user_modal').modal('show');

            var user_id =  $(this).data('id');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'GET',
                url: '/admin/users/' + user_id + '/edit',
                success: function(res)
                {
                    $('#edit_name').val(res.user['name']);
                    $('#edit_email').val(res.user['email']);
                    $('#edit_address').val(res.user['address']);
                    $('#edit_mobile').val(res.user['mobile']);
                    $('#edit_gender').val(res.user['gender']);
                    $('#edit_type').val(res.user['type']);
                    $('#user_id').val(res.user['id']);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    toastr.error(thrownError);
                }
            });
        });
        /*--------------------------*/

        /*Ấn nút Cập nhật vai trò*/
        $('#edit_user').on('click', function(event) {
            event.preventDefault();

            var user_id = $('#user_id').val();
            var form = $('#edit_user_form');
            var formData= form.serialize();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'PUT',
                url: '/admin/users/' + user_id,
                data: formData,
                success:function(res){
                    if (res.error == 'valid') {
                        var arr = res.message;
                        var key = Object.keys(arr);

                        for (var i = 0; i < key.length; i++) {
                            toastr.error(arr[key[i]]);
                        }
                    } else if (res.error == false){
                        toastr.success("Cập nhật người dùng thành công!");

                        $('#edit_user_modal').modal('hide');
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

        /*Xóa vai trò*/
        $(document).on('click', '#delete_user', function (event) {
            event.preventDefault();
            var user_id = $(this).data('id');

            swal({
                title: "Bạn có chắc muốn xóa?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                cancelButtonText: "Không",
                confirmButtonText: "Có"
            }, function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'DELETE',
                    url: '/admin/users/' + user_id,
                    success: function(res) {
                        toastr.success('Xóa người dùng thành công !');
                        setTimeout(function(){
                            window.location.reload();
                        }, 1000);
                    },
                    error: function error(xhr, ajaxOptions, thrownError) {
                        toastr.error(thrownError);
                    }
                });
            });
        });
        /*------------*/
    </script>
@endsection